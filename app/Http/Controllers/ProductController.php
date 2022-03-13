<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Features;
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
        $products = Product::orderBy('id', 'DESC')->get();
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
        $form_method="POST";
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('products.create', compact(
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
        $dimensionsStr = implode (" x ", $request->dimensions);
        $request->merge([ 'dimensions' => $dimensionsStr]);
        $vehicle_serial_number = random_int(100000000, 999999999);
        $request->merge([ 'serial_nunber' => $vehicle_serial_number]);
        $product = Product::create($request->except('_token'));
        
        return response([
            'redirect_url' => url('admin/product/'.$product->id.'/features'),
            'status' => 'New Product created successfully!'
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
        return "Im Show";
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
        $form_action= url('admin/products/'.$id);
        $form_method="put";
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-redo';
        $form_btn_class = 'btn-warning';

        $product = Product::get()->where('id', $id)->first();

        return view('products.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'product'
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
        $product = Product::find($id);
        $product->update($request->except('_token'));
        return response([
            'redirect_url' => url('admin/products'),
            'status' => 'Product Updated successfully!'
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
        product::find($id)->delete();
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
}
