<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Product;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $query = Type::query();

        // if (@$_GET['search_title'] && @$_GET['search_title'] !="")
        // {
        //     $query->where('title','LIKE','%'.$_GET['search_title'].'%');
        // }
        
        // if (@$_GET['sortbyTitle'] && @$_GET['sortbyTitle'] !="")
        // {
        //     $query->orderBy('title', @$_GET['sortbyTitle']);
        // }
        
        // $types = $query->orderBy('display_order')->simplepaginate(5);   
    
        // return view('types.index', compact('types'));
        return view('types.index');
    }

    function type_table_data(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            
            if($query != '')
            {
                $data = Type::where('title','LIKE', '%'.$query.'%')->where('is_vehicle', true)->orderBy('display_order')->get();   
            }
            else
            {
                $data = Type::where('is_vehicle', true)->orderBy('display_order')->get();
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
                        <td><button class="btn btn-sm '.$btnClass.' rounded">'.$row->products->count().'</button></td>
                        <td>'.$row->display_order.'</td>
                        <td>
                            <i class="fa fa-trash zoom" onclick="delete_type('.$row->id.',`'.$row->title.'`)" aria-hidden="true" style="color: #bf1616"></i>
                            <a href="'.url('admin/types/'.$row->id.'/edit').'" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
                        </td>
                    </tr>';
                }
            }
            else
            {
                $output = '
                <tr>
                    <td class="text-danger" align="center" colspan="5">Searched type not Found!</td>
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
        $type = Type::where('id', $id)->first();
        
        if (@$type->products)
        {    
            //Also delete all products related to this type
            foreach ($type->products as $product)
            {
                Product::find($product->id)->delete();
            }
        }

        Type::find($id)->delete();
    }
}
