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
        if(isset($request->q)){
            $products = Product::where('name', 'LIKE', "%$request->search%")->simplePaginate(18);
            addHashId($products);
        }elseif(isset($id)){
            $products = Product::where('category_id', Hashids::connection('products')->decode($id)[0])->get();
        }
        $categories = Category::latest()->get();
        foreach($categories as $cat){
            addHashId($cat->products);
        }
        return view('users.pages.products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
