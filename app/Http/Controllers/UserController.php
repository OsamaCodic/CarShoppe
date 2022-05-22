<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        if (@$_GET['role'])
        {
            $users = User::where('role', @$_GET['role'])->simplepaginate(5);
        }
        else
        {
            $users = User::all();    
        }
        

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card_title = 'Create user';
        $card_bg = 'bg-success';
        $form_action= url('admin/users');
        $form_method="POST";
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('users.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hash_password = \Hash::make($request->password);
	    $request->merge([ 'password' => $hash_password]);

        User::create($request->except('_token'));

        return response([
            'redirect_url' => url('admin/users'),
            'status' => 'User Created successfully!'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card_title = 'Edit user';
        $card_bg = 'bg-warning';
        $form_action= url('admin/users/'.$id);
        $form_method="PUT";
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-redo';
        $form_btn_class = 'btn-warning';

        $user = user::get()->where('id', $id)->first();

        return view('users.create', compact(
            'user',
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = user::find($id);
        
        if ($request->password == null)
        {
            //Old Password
            $request->merge([ 'password' => $user->password]);
        }
        else
        {
            //New Password
            $hash_password = \Hash::make($request->password);
	        $request->merge([ 'password' => $hash_password]);
        }

        $user->update($request->except('_token'));
        return response([
            'redirect_url' => url('admin/users'),
            'status' => 'User Updated successfully!'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::find($id)->delete();
    }
}
