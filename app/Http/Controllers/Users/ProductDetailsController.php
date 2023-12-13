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
      $product = Product::findorfail($ss[0]);
      session()->push('products.recently_viewed', $product->getKey());
      $data['latest'] = Product::where('category_id', $product->category->id)->get();
      $data['product'] = $product;
      $products = session()->get('products.recently_viewed');
      $datas = array_slice(array_unique($products), -5, 5, true);
      $data['recent'] = Product::whereIn('id', $datas)->take(5)->get();
     
      foreach($data['latest']  as $prod){
        $prod->hashid = Hashids::connection('products')->encode($prod->id);
        $prod->productUrl =  trimInput($data['product'] ->name);
      }
      return view('users.carts.products', $data);

    }
}
