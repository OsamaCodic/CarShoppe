<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Hash;
use App\Mail\userRegistedMail;

class FrontPagesController extends Controller
{
    public function getLogin(Request $request) {
        // Auth::logout(); // To logout user from front_end
        // if ($request->session()->get('front_customer')) {
        //     return redirect('front/service_ticket');
        // }
        return view('frontend_layout.login');
    }

    public function postLogin(Request $request) {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();


        if(!$user)
        {
            return response([
                'message' => 'Register Your Account'
            ], 401);
        }
        // Check password
        if( !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong Password'
            ], 401);
        }
        
        $response = [
            'user' => $user
        ];

        return response($response, 201);
        
        
    }

    public function Register(Request $request) {
        return view('frontend_layout.registerForm');
    }
    
    //Pages
    public function home(Request $request) {

        
        $brands = Brand::orderBy('display_order')->get();
        $types = Type::orderBy('display_order')->get();
        $latest_products = Product::where('model', now()->year)->get();

        return view('frontend_layout.dashboard', compact('types', 'brands', 'latest_products'));
    
    }
  
    
    public function postRegister(Request $request) {
        
        $hash_password = \Hash::make($request->password);
	    $request->merge([ 'password' => $hash_password]);
        
        $register_user = User::create($request->except('_token'));

        $data = array(
            'fname'      =>  $register_user->first_name,
            'lname'   =>   $register_user->last_name
        );

        

        \Mail::to($register_user->email)->send(new userRegistedMail($data));

		
        return response([
            'redirect_url' => url('front/login'),
            'status' => "Register successfully, You'll recevied email soon!"
        ],200);
    }

    public function frontLogout(Request $request) {

        Auth::logout();
        return redirect('front/login');

    }

    //----------------------------------------------------------------//

    public function listPage() {
        
        $brands = Brand::orderBy('display_order')->take(5)->get();
        $types = Type::orderBy('display_order')->get();
        $products = Product::orderBy('display_order')->paginate(5);
        
        // dd($brands->products->count());

        return view('frontend_layout.list', compact(
            'products',
            'brands'
        ));
    
    }
    
    public function sell_product() {

        $brands = Brand::orderBy('display_order')->get();
        $types = Type::orderBy('display_order')->get();
        return view('frontend_layout.sell_product_form', compact('brands', 'types'));
    
    }
    
    public function store_sellproduct(Request $request)
    {
        $validatedData = $request->validate([
            'brand_id' => ['required'],
            'type_id' => ['required'],
            'name' => ['required'],
            'model' => ['required'],
            'engine_cc' => ['required'],
            'no_of_doors' => ['required'],
            'transmission' => ['required'],
            'price' => ['required'],
            'varients' => ['required'],
        ]);

           
            $vehicle_serial_number = random_int(100000000, 999999999);
            $request->merge([ 'serial_nunber' => $vehicle_serial_number]);

            $product = Product::create($request->except('_token', 'product_id', 'filename'));
        
            if($request->file('filename'))
            {
                //Remove prevous images
                ProductImage::where('product_id', $request->product_id)->delete();

                foreach ($request->file('filename') as $image)
                {
                    $ProductImage = new ProductImage;
                    $given_name = null;
                    $name = is_null($given_name) ? uniqid() : $given_name . '-' . rand(1, 6000);
                    $name = $name . '.' . $image->extension();
                    \Storage::disk('public')->putFileAs('images', $image, $name);                
                    $ProductImage->image_name = $name;
                    $ProductImage->product_id = $product->id;
                    $ProductImage->save();
                }
            }

            return redirect('front/seller_personal_information/'.$product->id)->with('message','type message here');
    }

    public function seller_detailForm($id) {

        $product = product::where('id', $id)->first();

        return view('frontend_layout.seller_form', compact('product'));
    
    }

    public function store_ownerDetails(Request $request) {

        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
        ]);
        
        $request->merge(['password' => 'n/a']);
        
        $user= User::create($request->only('first_name', 'last_name', 'email', 'role', 'password'));
        $request->merge(['user_id' => $user->id]);
        UserDetail::create($request->except('_Token'));
        
        return redirect('front/home');
    
    }
}
