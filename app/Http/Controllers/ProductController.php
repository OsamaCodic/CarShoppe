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
        $query = Product::query();

        if (@$_GET['status'] && @$_GET['status'] !="")
        {
            $query->where('status', @$_GET['status']);
        }

        if (@$_GET['name'] && @$_GET['name'] !="")
        {
            $query->orwhere('name','LIKE','%'.$_GET['name'].'%');
        }
        
        if (@$_GET['low_price'] && @$_GET['high_price'] && @$_GET['low_price'] !="" && @$_GET['high_price'] !="")
        {
            $query->orWhereBetween('price', [$_GET['low_price'], $_GET['high_price']]);
        }
        
        if (@$_GET['brand_id'] && @$_GET['brand_id'] !="")
        {
            $query->orwhere('brand_id',$_GET['brand_id']);
        }
        
        if (@$_GET['type_id'] && @$_GET['type_id'] !="")
        {
            $query->orwhere('type_id',$_GET['type_id']);
        }

        if (@$_GET['engine_cc'] && @$_GET['engine_cc'] !="")
        {
            $query->orwhere('type_id',$_GET['type_id']);
        }

        if (@$_GET['gears'] && @$_GET['gears'] !="")
        {
            $query->where('gears',$_GET['gears']);
        }
        
        if (@$_GET['colours'] && @$_GET['colours'] !="")
        {
            $query->where('colours',$_GET['colours']);
        }
        
        if (@$_GET['model'] && @$_GET['model'] !="")
        {
            $query->where('colours',$_GET['colours']);
        }

        if (@$_GET['no_of_doors'] && @$_GET['no_of_doors'] !="")
        {
            $query->where('no_of_doors',$_GET['no_of_doors']);
        }
        
        if (@$_GET['sortbyName'] && @$_GET['sortbyName'] !="")
        {
            $query->orderBy('name', @$_GET['sortbyName']);
        }
        
        $products = $query->orderBy('display_order')->simplepaginate(5);
        
        
        $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();

        return view('products.index', compact('products', 'brands', 'types'));
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

        $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();

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
        
        $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
        $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();


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
        $toggleColor = '#36b9cc';

        return view('products.features', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'features_list',
            'product',
            'toggleColor'
        ));
    }


    public function edit_features($id)
    {
        $features_list = Features::all();
        $product = Product::where('id', $id)->first();
        
        $card_title = 'Edit Features';
        $card_bg = 'bg-warning';
        $form_action= url('admin/product_features');
        $form_method="POST";
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-redo';
        $form_btn_class = 'btn-outline-warning';
        $toggleColor = '#f6c23e';

        return view('products.features', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'features_list',
            'product',
            'toggleColor'
        ));
    }

    public function store_features(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        
        if ($product->productFeatures->count() > 0)
        {
            # Delete old features update new features
            ProductFeature::where('product_id', $request->product_id)->delete();
        }

        foreach ($request->feature as $id) {
            $product_features[] = ProductFeature::create([
                'product_id' => $request->product_id,
                'feature_id' => $id
            ]);
        }

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
            ProductFeature::where('product_id', $del_row_id)->delete();
        }
    }
}
