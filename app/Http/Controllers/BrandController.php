<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Brand::query();

        // if (@$_GET['search_title'] && @$_GET['search_title'] !="")
        // {
        //     $query->where('title','LIKE','%'.$_GET['search_title'].'%');
        // }

        // if (@$_GET['sortbyTitle'] && @$_GET['sortbyTitle'] !="")
        // {
        //     $query->orderBy('title', @$_GET['sortbyTitle']);
        // }
        
        // $brands = $query->orderBy('display_order')->simplepaginate(5);   
    
        // return view('brands.index', compact('brands'));
        return view('brands.index');
    }

    function brand_table_data(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            
            if($query != '')
            {
                $data = Brand::where('title','LIKE', '%'.$query.'%')->where('is_vehicle', true)->orderBy('display_order')->get();   
            }
            else
            {
                $data = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
            }

            $total_row = $data->count();

            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    if ($row->products->count() > 0)
                    {
                        $btnClass="btn-info";
                    }
                    else
                    {
                        $btnClass="btn-danger";
                    }
                    
                    $output .= '
                    <tr>
                        <td>'.$row->title.'</td>
                        <td>'.$row->description.'</td>
                        <td>'.$row->rate.' <strong class="text-success">Stars</strong> </td>
                        <td><button class="btn btn-sm '.$btnClass.' rounded">'.$row->products->count().'</button></td>
                        <td>'.$row->display_order.'</td>
                        <td>
                            <img src='.asset('storage').'/brands_logos/'.@$row->logo.' width="70%" />
                        </td>
                        <td>
                            <i class="fa fa-trash zoom" onclick="delete_brand('.$row->id.',`'.$row->title.'`)" aria-hidden="true" style="color: #bf1616"></i>
                            <a href="'.url('admin/brands/'.$row->id.'/edit').'" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
                        </td>
                    </tr>';
                }
            }
            else
            {
                $output = '
                <tr>
                    <td class="text-danger" align="center" colspan="5">Searched brand not Found!</td>
                </tr>';
            }
            
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $card_title = 'Create Brand';
        $card_bg = 'bg-success';
        $form_action= url('admin/brands');
        $form_method= "POST";
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('brands.create', compact(
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
        if($request->file('filename')) //Upload Image
        {
            $image = $request->file('filename');
            $given_name = null;
            $name = is_null($given_name) ? uniqid() : $given_name . '-' . rand(1, 6000);
            $name = $name . '.' . $image->extension();
            \Storage::disk('public')->putFileAs('brands_logos', $image, $name);                
            $request->merge([ 'logo' => $name]);
        }

        $brand = Brand::updateOrCreate(['id'=>$request->brand_id],$request->except('_token', 'brand_id', 'filename'));

        if ($request->brand == null)
        {
            //Create
            return response([
                'redirect_url' => url('admin/brands'),
                'status' => 'New brand created successfully!'
            ],200);
        }
        else
        {
            //Update
            return response([
                'redirect_url' => url('admin/brands'),
                'status' => 'Brand Updated successfully!'
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
        $card_title = 'Update Brand';
        $card_bg = 'bg-warning';
        $form_action= url('admin/brands');
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-warning';

        $brand = Brand::get()->where('id', $id)->first();

        return view('brands.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_btn_class',
            'form_btn_icon',
            'form_btn',
            'brand'
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
        $brand = Brand::where('id', $id)->first();
        
        if (@$brand->products)
        {    
            //Also delete all products related to this brand
            foreach ($brand->products as $product)
            {
                Product::find($product->id)->delete();
            }
        }

        Brand::find($id)->delete();
    }

}
