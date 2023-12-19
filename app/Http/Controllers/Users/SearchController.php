<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Facade\FlareClient\View;
use Vinkla\Hashids\Facades\Hashids;

class SearchController extends Controller
{

    public function __invoke(Request $request, $id=null)
    {  
       
        $products = [];
        $data = [];
        if(isset($request->q)){
            $products = Product::where('name', 'LIKE', "%$request->q%")->simplePaginate(18);
            $data['searchterm'] = "Showing Results for ".$request->q;
            addHashId($products);
        }elseif(isset($id)){
            $cat = Category::where('id', decodeHashid($id))->first();
            $products = Product::where('category_id', decodeHashid($id))->get();
            $data['searchterm'] = "Showing Resuls for ".ucfirst(strtolower($cat->name));
            addHashId($products);
        }else{
            $products = Product::latest()->take(20)->get();
            addHashId($products);
        }
        $categories = Category::latest()->get();
        foreach($categories as $cat){
            addHashId($cat->products);
        }
        addHashId($categories);
        return view('users.pages.products',$data, [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
