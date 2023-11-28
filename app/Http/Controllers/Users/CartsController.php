<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;

class CartsController extends Controller
{
    //

    public function add(Request $request, $id)
     {   
         $product = Product::find($id);
         $response = \Cart::add([
             'id' => $product->id,
             'name' => $product->name,
             'price' => $product->sale_price,
             'options' => [
                'size' => $request->size,
              ],
             'qty' => $request->qty,
             'image' => $product->image, 
             'weight'=>1, 
         ])->associate(Product::class);
     
         if($response){
          //   dd($res);
          return response()->json($response);

         }
     }



    public function Index()
    { 
      $prod = Product::latest()->take(6)->get();
      foreach($prod as $pp){
        $pp->productUrl = trimInput($pp->name);
        $pp->hashid = Hashids::connection('products')->encode($pp->id);
      }
        return view('users.carts.carts') 
        ->with('carts', \Cart::content())
        ->with('latest', $prod)
        ->with('cartSession', Hashids::connection('products')->encode(rand(11,99)))
        ->with('breadcrumb', 'Shopping Cart');
    }




    public function destroy( $id)
    {
      //dd($id.' '.$request->rowId);
        \Cart::remove($id);
        Session::flash('alert', 'error');
        Session::flash('msg', 'Cart Successfully removed');
        return back();
    }

    public function update(Request $request){
        $cartItemId = $request->cartId;
        $quantity = $request->qty;

        // Update the cart item quantity
        \Cart::update($cartItemId, $quantity);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Cart item quantity updated successfully');
        return back();
    }
}
