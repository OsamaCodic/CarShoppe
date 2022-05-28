<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

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
                    $output .= '
                    <tr>
                        <td>'.$row->title.'</td>
                        <td>'.$row->description.'</td>
                        <td>'.$row->display_order.'</td>
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
        Brand::create($request->except('_token'));

        return response([
            'redirect_url' => url('admin/brands'),
            'status' => 'New Brand Created successfully!'
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
        $card_title = 'Update Brand';
        $card_bg = 'bg-warning';
        $form_action= url('admin/brands/'.$id);
        $form_method= "PUT";
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-warning';

        $brand = Brand::get()->where('id', $id)->first();

        return view('brands.create', compact(
            'card_bg',
            'card_title',
            'form_action',
            'form_method',
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
        $brand = Brand::find($id);
        $brand->update($request->except('_token'));
        return response([
            'redirect_url' => url('admin/brands'),
            'status' => 'Brand Updated successfully!'
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
        Brand::find($id)->delete();
    }

}
