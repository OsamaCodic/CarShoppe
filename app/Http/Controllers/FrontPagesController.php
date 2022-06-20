<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Type;
use App\Models\Brand;
use App\Models\{Product, Accessory, PurchasedPartHistory, PurchasedProductHistory};
use App\Models\ProductImage;
use Illuminate\Support\Facades\Hash;
use App\Mail\userRegistedMail;
use App\Mail\purchasedMail;

use Auth;

class FrontPagesController extends Controller
{
    public function getLogin(Request $request) {
        // Auth::logout(); // To logout user from front_end
        // if ($request->session()->get('front_customer')) {
        //     return redirect('front/service_ticket');
        // }
        return view('frontend_layout.login');
    }

    public function checkLogin(Request $request) {


        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        // Check email
        $user = User::where('email', $fields['email'])->first();

        
        if(!$user)
        {
            return \Redirect::back()->withErrors(['msg' => 'PLease register first!']);
        }
        else{

            // dd($user->password);

            // Check password
            if( !Hash::check($request->password, $user->password)) {
                
                return \Redirect::back()->withErrors(['msg' => 'Sorry, Wrong password!']);
            }
            else{

                \Auth::login($user);

                return redirect('front/home')->withToastSuccess('Task Created Successfully!');

            }
            
            // $response = [
            //     'user' => $user
            // ];
            
            // return response($response, 201);
            
        }
        
    }

    public function Register(Request $request) {
        return view('frontend_layout.registerForm');
    }
    
    //Pages
    public function home(Request $request) {

        
        $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();
        // $latest_products = Product::where('model', now()->year)->get();

        return view('frontend_layout.dashboard', compact('types', 'brands'));
    
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
        
        $query = Product::query();

        if (@$_GET['searchbyLogo'] && @$_GET['searchbyLogo'] !="")
        {
            $query->where('brand_id',$_GET['searchbyLogo']);
        }
        
        if (@$_GET['status'] && @$_GET['status'] !="")
        {
            $query->where('status',$_GET['status']);
        }
        
        if (@$_GET['brand_id'] && @$_GET['brand_id'] !="")
        {
            $query->where('brand_id',$_GET['brand_id']);
        }

        if (@$_GET['type_id'] && @$_GET['type_id'] !="")
        {
            $query->where('type_id',$_GET['type_id']);
        }
        
        if (@$_GET['name'] && @$_GET['name'] !="" && !empty(@$_GET['name']))
        {
            $query->where('name','LIKE','%'.$_GET['name'].'%');
        }

        if (@$_GET['engine_cc'] && @$_GET['engine_cc'] !="")
        {
            $query->where('type_id',$_GET['type_id']);
        }

        if (@$_GET['transmission'] && @$_GET['transmission'] !="")
        {
            $query->where('transmission',$_GET['transmission']);
        }

        if (@$_GET['gears'] && @$_GET['gears'] !="")
        {
            $query->where('gears',$_GET['gears']);
        }
        
        if (@$_GET['no_of_doors'] && @$_GET['no_of_doors'] !="")
        {
            $query->where('no_of_doors',$_GET['no_of_doors']);
        }
        
        if (@$_GET['model'] && @$_GET['model'] !="")
        {
            $query->where('model',$_GET['model']);
        }
        
        if (@$_GET['less_than_price'] && @$_GET['less_than_price'] !="")
        {
            $query->where('price', '<' , $_GET['less_than_price']);
        }

        if (@$_GET['low_price'] && @$_GET['high_price'] && @$_GET['low_price'] !="" && @$_GET['high_price'] !="")
        {
            $query->orWhereBetween('price', [$_GET['low_price'], $_GET['high_price']]);
        }

        if (@$_GET['sortByModel'] && @$_GET['sortByModel'] !="")
        {
          $query->orderBy('model', @$_GET['sortByModel']);
        }
        
        if (@$_GET['sortByprice'] && @$_GET['sortByprice'] !="")
        {
            $query->orderBy('price', @$_GET['sortByprice']);
        }

        $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->take(5)->get();
        $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();
        // $products = Product::where('status', @$_GET['status'])->orderBy('display_order')->paginate(5);

        $products = $query->orderBy('display_order')->paginate(5);

        return view('frontend_layout.list'  , compact(
            'products',
            'brands',
            'types'
        ));
    
    }
    public function partslistPage() {

        $query = Accessory::query();

        if (@$_GET['brand_id'] && @$_GET['brand_id'] !="")
        {
            $query->where('brand_id',$_GET['brand_id']);
        }

        if (@$_GET['category_id'] && @$_GET['category_id'] !="")
        {
            $query->where('category_id',$_GET['category_id']);
        }

        if (@$_GET['titile'] && @$_GET['titile'] !="")
        {
            $query->where('titile',$_GET['titile']);
        }

        $brands = Brand::where('is_vehicle', false)->orderBy('display_order')->take(5)->get();
        $categories = Type::where('is_vehicle', false)->orderBy('display_order')->get();
        // $products = Product::where('status', @$_GET['status'])->orderBy('display_order')->paginate(5);

        $accessories = $query->orderBy('display_order')->paginate(5);

        return view('frontend_layout.parts_list', compact(
            'accessories',
            'brands',
            'categories'
        ));
    
    }
    
    public function productDetails($id) {
        
        
        
        $product = Product::get()->where('id', $id)->first();
        
        return view('frontend_layout.product_details', compact('product'));
    
    }
    
    public function accessoryDetails($id) {
        
        $accessory = Accessory::get()->where('id', $id)->first(); 
        return view('frontend_layout.part_details', compact('accessory'));
    
    }
    
    public function purchase_part($id) {
        
        $accessory = Accessory::get()->where('id', $id)->first();
        $accessory->purchased = true;
        $accessory->save();

        $loggedUser = Auth::user();
        

        return view('frontend_layout.buyer_form', compact('accessory', 'loggedUser'));
    
    }
    
    public function purchase_product($id) {

        $product = Product::get()->where('id', $id)->first();
        $product->purchased = true;
        $product->save();

        $loggedUser = Auth::user();
        
        return view('frontend_layout.product_buyer_form', compact('product', 'loggedUser'));    
    }

    public function part_buyer_details(Request $request) {
        
        $validatedData = $request->validate([
            'phone_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
        ]);

        PurchasedPartHistory::create($request->only('user_id', 'part_id')); 
        UserDetail::create($request->except('_Token'));

        $data = array(
            'fname'      =>  $request->first_name,
            'lname'   =>   $request->last_name
        );

        \Mail::to($request->email)->send(new purchasedMail($data));
        return redirect('front/parts')->with('success', 'Thank you for purchasing1!');
    }
    public function product_buyer_details(Request $request) {
        
        $validatedData = $request->validate([
            'phone_number' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
        ]);

        PurchasedProductHistory::create($request->only('user_id', 'product_id')); 
        UserDetail::create($request->except('_Token'));

        $data = array(
            'fname'      =>  $request->first_name,
            'lname'   =>   $request->last_name
        );

        \Mail::to($request->email)->send(new purchasedMail($data));
        return redirect('front/products')->with('success', 'Thank you for purchasing1!');
    }
    
    public function sell_product() {

        $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();
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

            return redirect('front/seller_personal_information/'.$product->id)->with('success', 'form submit successfully!');
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
