<?php

namespace App\Http\Controllers;

use App\Models\FlowerType;
use App\Models\Occasion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\View;


class SearchController extends Controller
{
    public function index()
    {
        $products = ['products' =>  Products::All()];
        $occasions = Occasion::All();
        $flowertypes = FlowerType::All();
        return view('home.search', $products, compact('occasions', 'flowertypes'));
    }

    public function search(Request $req)
    {
        $searchResult = $req->input('search');
        $products = ['products' =>  Products::where('product_name', 'LIKE', "%$searchResult%")->get()];
        $occasions = Occasion::All();
        $flowertypes = FlowerType::All();
        return view('home.search', $products, compact('searchResult', 'occasions', 'flowertypes'));
    }

    public function filter(Request $req)
    {
        if(isset($req->flowertype))
        {
            $flowertype = $req->flowertype;
            $products = Products::whereIn('flowertype_id', explode(",",$flowertype))->get();
            return response()->json([
                'status'=>200,
                'view' => (String)View::make('home.product')->with(compact('products'))
            ]);
        }
        elseif(isset($req->occasion)){
            $occasion = $req->occasion;
            $products = Products::whereIn('flowertype_id', explode(",",$occasion))->get();
            return response()->json([
                'status'=>200,
                'view' => (String)View::make('home.product')->with(compact('products'))
            ]);
        }
        else{
            return response()->json([
                'status'=>200,
                'view' => '
                <div class="page-cat">
                <h2>No filter results </h2>
                </div>
            '
            ]);
        }
        
    }
    public function FilterBy($id, $type)
    {
        if ($type == "occasion") {
            $occasions = Occasion::All();
            $flowertypes = FlowerType::All();
            $products = Products::where('occasion_id', $id)->get();
        }
        if ($type == "type") {
            $occasions = Occasion::All();
            $flowertypes = FlowerType::All();
            $products = Products::where('flowertype_id', $id)->get();
        }
        return view('home.search', compact('products', 'occasions', 'flowertypes'));
    }
}
