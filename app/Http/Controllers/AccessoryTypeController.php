<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Accessory;

class AccessoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accessory_categories.index');
    }

    function accessory_type_table_data(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            
            if($query != '')
            {
                $data = Type::where('title','LIKE', '%'.$query.'%')->where('is_vehicle', false)->orderBy('display_order')->get();   
            }
            else
            {
                $data = Type::where('is_vehicle', false)->orderBy('display_order')->get();
            }

            $total_row = $data->count();
            
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    if ($row->accessories->count() > 0)
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
                        <td><button class="btn btn-sm '.$btnClass.' rounded">'.$row->accessories->count().'</button></td>
                        <td>'.$row->display_order.'</td>
                        <td>
                            <i class="fa fa-trash zoom" onclick="delete_type('.$row->id.',`'.$row->title.'`)" aria-hidden="true" style="color: #bf1616"></i>
                            <a href="'.url('admin/accessory_categories/'.$row->id.'/edit').'" ><i class="fa fa-pencil ml-2 zoom" aria-hidden="true" style="color: #fbb706"></i></a>
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
        $form_action= url('admin/accessory_categories');
        $form_method= "POST";
        $form_btn = 'Save';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-success';

        return view('accessory_categories.create', compact(
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
            'redirect_url' => url('admin/accessory_categories'),
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
        $form_action= url('admin/accessory_categories/'.$id);
        $form_method= "PUT";
        $form_btn = 'Update';
        $form_btn_icon = 'fa fa-plus';
        $form_btn_class = 'btn-warning';

        $type = Type::get()->where('id', $id)->first();

        return view('accessory_categories.create', compact(
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
            'redirect_url' => url('admin/accessory_categories'),
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
        
        if (@$type->accessories)
        {    
            //Also delete all products related to this type
            foreach ($type->accessories as $accessory)
            {
                Accessory::find($accessory->id)->delete();
            }
        }

        Type::find($id)->delete();
    }
}
