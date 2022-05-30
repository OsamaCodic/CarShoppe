<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;
use App\Models\Brand;
use App\Models\Type;


class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Accessory::query();

        if (@$_GET['title'] && @$_GET['title'] !="")
        {
            $query->andwhere('title','LIKE','%'.$_GET['title'].'%');
        }

        if (@$_GET['brand_id'] && @$_GET['brand_id'] !="")
        {
            $query->orwhere('brand_id',$_GET['brand_id']);
        }

        if (@$_GET['type_id'] && @$_GET['type_id'] !="")
        {
            $query->orwhere('category_id',$_GET['type_id']);
        }
        
        if (@$_GET['low_price'] && @$_GET['high_price'] && @$_GET['low_price'] !="" && @$_GET['high_price'] !="")
        {
            $query->orWhereBetween('price', [$_GET['low_price'], $_GET['high_price']]);
        }
        
        if (@$_GET['discount'] && @$_GET['discount'] !="")
        {
            $query->orwhere('discount',$_GET['discount']);
        }
        
        if (@$_GET['colours'] && @$_GET['colours'] !="")
        {
            $query->orwhere('colours',$_GET['colours']);
        }
        
        if (@$_GET['sortbyTitle'] && @$_GET['sortbyTitle'] !="")
        {
            $query->orderBy('title', @$_GET['sortbyTitle']);
        }
        
        $accessories = $query->orderBy('display_order')->simplepaginate(5);
        $brands = Brand::where('is_vehicle', false)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', false)->orderBy('display_order')->get();

        return view('accessories.index', compact('accessories', 'brands', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card_title = 'New Accessory';
        $card_bg = 'bg-success';
        $form_action= url('admin/accessories');
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        $brands = Brand::where('is_vehicle', false)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', false)->orderBy('display_order')->get();

        return view('accessories.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'brands',
            'types'
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
        $dimensionsStr = implode (" x ", $request->dimensions);
        $request->merge([ 'dimensions' => $dimensionsStr]);

        if($request->file('filename')) //Upload Image
        {
            if ($request->accessory_id != null)
            {
                $image = $request->file('filename');
                $given_name = null;
                $name = is_null($given_name) ? uniqid() : $given_name . '-' . rand(1, 6000);
                $name = $name . '.' . $image->extension();
                \Storage::disk('public')->putFileAs('accessories_Images', $image, $name);                
                $request->merge([ 'image_name' => $name]);
            }   
        }

        $accessory = Accessory::updateOrCreate(['id'=>$request->accessory_id],$request->except('_token', 'accessory_id', 'filename'));

        if ($request->accessory_id == null)
        {
            //Create
            return response([
                'redirect_url' => url('admin/accessories'),
                'status' => 'New Accessory added successfully!'
            ],200);
        }
        else
        {
            //Update
            return response([
                'redirect_url' => url('admin/accessories'),
                'status' => 'Accessory Updated successfully!'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accessory = Accessory::get()->where('id', $id)->first();
        return view('accessories.accessory_details', compact('accessory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card_title = 'Edit Accessory';
        $card_bg = 'bg-warning';
        $form_action= url('admin/accessories');
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-redo';
        $form_btn_class = 'btn-warning';

        $accessory = Accessory::get()->where('id', $id)->first();
        $brands = Brand::where('is_vehicle', false)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', false)->orderBy('display_order')->get();


        return view('accessories.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'accessory',
            'brands',
            'types'
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accessory::find($id)->delete();
    }

    public function delete_selected_rows(Request $request)
    {
        foreach ($request->delete_rows_arr as $del_row_id)
        {
            Accessory::find($del_row_id)->delete();
        }
    }
}
