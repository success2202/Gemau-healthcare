<?php

namespace App\Http\Controllers\Users;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ProductDetailsController extends Controller
{
    //

    public function __invoke($id, $url)
    {
      $ss =   Hashids::connection('products')->decode($id);
      $data['product'] = Product::findorfail($ss[0]);
      $data['latest'] = Product::where('category_id', $data['product']->category->id)->get();
      foreach($data['latest']  as $prod){
        $prod->hashid = $id;
        $prod->productUrl =  urlencode(trimInput($data['product'] ->name));
      }
      return view('users.carts.products', $data);

    }
}
