<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
