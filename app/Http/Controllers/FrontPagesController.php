<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function register(Request $request) {
        // Auth::logout(); // To logout user from front_end
        // if ($request->session()->get('front_customer')) {
        //     return redirect('front/service_ticket');
        // }
        return view('frontend_layout.login');
    }

    public function frontLogout(Request $request) {

        Auth::logout();
        return redirect('front/login');

    }
}
