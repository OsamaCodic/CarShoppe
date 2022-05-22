<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Features;
use App\Models\ProductImage;
use App\Models\ProductFeature;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@$_GET['status'])
        {
            $products = Product::where('status', @$_GET['status'])->orderBy('display_order')->simplepaginate(5);
        }
        else
        {
            $products = Product::orderBy('display_order')->simplepaginate(5);    
        }
        
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card_title = 'Create Product';
        $card_bg = 'bg-success';
        $form_action= url('admin/products');
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        $brands = Brand::orderBy('display_order')->get();
        $types = Type::orderBy('display_order')->get();

        return view('products.create', compact(
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
        $product = Product::get()->where('id', $id)->first();
        return view('products.product_details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card_title = 'Edit Product';
        $card_bg = 'bg-warning';
        $form_action= url('admin/products');
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-redo';
        $form_btn_class = 'btn-warning';

        $product = Product::get()->where('id', $id)->first();
        
        $brands = Brand::orderBy('display_order')->get();
        $types = Type::orderBy('display_order')->get();


        return view('products.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'product',
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
        product::find($id)->delete();
        ProductFeature::where('product_id', $id)->delete();
    }

    public function product_features($id)
    {
        $features_list = Features::all();
        $product = Product::where('id', $id)->first();
    
        $card_title = 'Select Features';
        $card_bg = 'bg-info';
        $form_action= url('admin/product_features');
        $form_method="POST";
        $form_btn = 'DONE';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-outline-info';

        return view('products.features', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'features_list',
            'product'
        ));
    }

    public function store_features(Request $request)
    {
        foreach ($request->feature as $id) {
            $product_features[] = ProductFeature::create([
                'product_id' => $request->product_id,
                'feature_id' => $id
            ]);
        }
        $product = Product::where('id', $request->product_id)->first();

        return response([
            'redirect_url' => url('admin/products'),
            'status' => $product->name.' features added successfully!'
        ],200);
    }

    public function delete_selected_rows(Request $request)
    {
        foreach ($request->delete_rows_arr as $del_row_id)
        {
            Product::find($del_row_id)->delete();
        }
    }
}
