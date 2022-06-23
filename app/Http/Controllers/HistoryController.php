<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{PurchasedPartHistory, PurchasedProductHistory};

class HistoryController extends Controller
{
    public function index()
    {
        // $query = Product::query();

        // if (@$_GET['status'] && @$_GET['status'] !="")
        // {
        //     $query->where('status', @$_GET['status']);
        // }

        
        // $products = $query->orderBy('display_order')->simplepaginate(5);
        
        
        // $brands = Brand::where('is_vehicle', true)->orderBy('display_order')->get();
        // $types = Type::where('is_vehicle', true)->orderBy('display_order')->get();

        return view('history.index');
    }
    
    public function partsHistory()
    {
        $parts_ids = PurchasedPartHistory::get();
        return view('history.parts_index', compact('parts_ids'));
    }

    public function productsHistory()
    {
        $products_ids = PurchasedProductHistory::get();
        return view('history.products_index', compact('products_ids'));
    }
    
    public function clearPartsHistory()
    {
        PurchasedPartsHistory::delete();
        $parts_ids = PurchasedPartsHistory::get();

        return view('history.products_index', compact('products_ids'));
    }
}
