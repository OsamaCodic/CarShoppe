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

        // if (@$_GET['status'] && @$_GET['status'] !="")
        // {
        //     $query->where('status', @$_GET['status']);
        // }

        // if (@$_GET['name'] && @$_GET['name'] !="")
        // {
        //     $query->where('name','LIKE','%'.$_GET['name'].'%');
        // }
        
        // if (@$_GET['low_price'] && @$_GET['high_price'] && @$_GET['low_price'] !="" && @$_GET['high_price'] !="")
        // {
        //     $query->whereBetween('price', [$_GET['low_price'], $_GET['high_price']]);
        // }
        
        // if (@$_GET['brand_id'] && @$_GET['brand_id'] !="")
        // {
        //     $query->where('brand_id',$_GET['brand_id']);
        // }
        
        // if (@$_GET['type_id'] && @$_GET['type_id'] !="")
        // {
        //     $query->where('type_id',$_GET['type_id']);
        // }

        // if (@$_GET['engine_cc'] && @$_GET['engine_cc'] !="")
        // {
        //     $query->where('type_id',$_GET['type_id']);
        // }

        // if (@$_GET['gears'] && @$_GET['gears'] !="")
        // {
        //     $query->where('gears',$_GET['gears']);
        // }
        
        // if (@$_GET['colours'] && @$_GET['colours'] !="")
        // {
        //     $query->where('colours',$_GET['colours']);
        // }
        
        // if (@$_GET['model'] && @$_GET['model'] !="")
        // {
        //     $query->where('colours',$_GET['colours']);
        // }
        
        if (@$_GET['sortbyName'] && @$_GET['sortbyName'] !="")
        {
            $query->orderBy('name', @$_GET['sortbyName']);
        }
        
        $accessories = $query->orderBy('display_order')->simplepaginate(5);
        
        
        $brands = Brand::orderBy('display_order')->get();
        $types = Type::orderBy('display_order')->get();

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

        $brands = Brand::orderBy('display_order')->get();
        $types = Type::orderBy('display_order')->get();

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
        dd("Go to Controller");

        $dimensionsStr = implode (" x ", $request->dimensions);
        $request->merge([ 'dimensions' => $dimensionsStr]);
        $vehicle_serial_number = random_int(100000000, 999999999);
        $request->merge([ 'serial_nunber' => $vehicle_serial_number]);

        $product = Product::updateOrCreate(['id'=>$request->product_id],$request->except('_token', 'product_id', 'filename'));
       
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

        if ($request->product_id == null)
        {
            //Create
            return response([
                'redirect_url' => url('admin/product/'.$product->id.'/features'),
                'status' => 'New Product created successfully!'
            ],200);
        }
        else
        {
            //Update
            return response([
                'redirect_url' => url('admin/products'),
                'status' => 'Product Updated successfully!'
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
        //
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
        //
    }
}
