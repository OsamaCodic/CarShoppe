<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Type::query();

        if (@$_GET['search_title'] && @$_GET['search_title'] !="")
        {
            $query->where('title','LIKE','%'.$_GET['search_title'].'%');
        }
        
        $types = $query->orderBy('display_order')->simplepaginate(5);   
    
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card_title = 'Create Type';
        $card_bg = 'bg-success';
        $form_action= url('admin/types');
        $form_method= "POST";
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('types.create', compact(
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
        Type::create($request->except('_token'));
        return response([
            'redirect_url' => url('admin/types'),
            'status' => 'New Type Created successfully!'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card_title = 'Update Type';
        $card_bg = 'bg-warning';
        $form_action= url('admin/types/'.$id);
        $form_method= "PUT";
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-warning';

        $type = Type::get()->where('id', $id)->first();

        return view('types.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'type'
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
        $type = Type::find($id);
        $type->update($request->except('_token'));
        return response([
            'redirect_url' => url('admin/types'),
            'status' => 'Type Updated successfully!'
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
        Type::find($id)->delete();
    }
}
