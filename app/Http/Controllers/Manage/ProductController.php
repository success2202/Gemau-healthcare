<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\imageUpload;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
use imageUpload;
public $category;
public $product;
     public function __construct()
     {

        $this->product = new Product;
        $this->category = new Category;
         
     }
    public function index()
    {
        $product = Product::latest()->get();
        addHashId($product);
        return view('manage.products.index')
             ->with('products', $product)
             ->with('bheading', 'Product')
             ->with('breadcrumb', 'Product');
    }

  
    public function delete(Request $request, $id){
        $id = Product::where('id', decodeHashid($id))->first();
        $id->delete();
        Session::flash('alert', 'error');
        Session::flash('message','Product deleted Successfully');
        return back();
    }
    
    public function status(Request $request, $id){
        if($request->status == 1){
         DB::table('products')->where('id', decodeHashid($id))
                    ->update(['status' => 1]);
            Session::flash('alert', 'error');
            Session::flash('message', 'Product Disabled successfully');
            return redirect()->back();
        }
        elseif($request->status == 0){    
            DB::table('products')->where('id', decodeHashid($id))
                    ->update(['status' => 0]);
            Session::flash('alert', 'success');
            Session::flash('message', 'Product Enabled successfully');
            return redirect()->back();
        }else{
             Session::flash('alert', 'error');
            Session::flash('message', 'An errror occured, No changes made');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.products.create') 
                    ->with('bheading', 'Products')
                    ->with('breadcrumb', 'Create Product')
                    ->with('category', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
            'images' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
        ]);
        if ($valid->fails()) {
            Session::flash('alert', 'error');
            Session::flash('message', $valid->errors()->first());
            return redirect()->back()->withErrors($valid)->withInput($request->all())
                ->with('bheading', 'Product')
                ->with('breadcrumb', 'Index');
        }
    
        DB::beginTransaction();
        try {
            $prod = new Product;
            $prod->name = $request->name;
            $prod->category_id = $request->category_id;
            $prod->description = $request->description;
            $prod->discount = (($request->price - $request->sale_price) / $request->price) * 100;
            $prod->price = $request->price;
            $prod->sale_price = $request->sale_price;
            $prod->qty = $request->qty;

            if ($request->file('image')) {
             $image =  $this->UploadImage($request, 'images/products/');
            $prod->image_path = $image;
            }
            if ($request->file('images')) {
                $images = $this->UploadImages($request, 'images/products/');
                $prod->gallery = json_encode($images);
            }
             $prod->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('alert', 'error');
            Session::flash('message', $e);
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }
    
        Session::flash('alert', 'success');
        Session::flash('message', 'Product Added Successfully');
        return redirect()->back();
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
        $prod = Product::where('id', decodeHashid($id))->first();
        $prod->hashid = $id;

        return view('manage.products.edit')
            ->with('product', $prod)
            ->with('category', Category::all())
            ->with('breadcrumb', 'Product Edit')
            ->with('bheading', 'Products');

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
        $id = decodeHashid($id);
        $valid = Validator::make($request->all(), [
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'image' => 'mimes:png,jpg,jpeg,gif'
        ]);

        if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('message', 'The fields with * are required');
            return redirect()->back()->withErrors($valid)->withInput($request->all())
            ->with('bheading', 'Product')
            ->with('breadcrumb', 'Index');
        }
        DB::beginTransaction();
        try{
          $prod = Product::where('id', $id)->first();
          $prod->name= $request->name;
          $prod->category_id = $request->category_id;
          $prod->description = $request->description;
          $prod->discount = (($request->price - $request->sale_price) / $request->price) * 100;
          $prod->price = $request->price;
          $prod->sale_price = $request->sale_price;
          if ($request->file('image')) {
            $image =  $this->UploadImage($request, 'images/products/');
           $prod->image_path = $image;
           }
           if ($request->file('images')) {
               $images = $this->UploadImages($request, 'images/products/');
               $prod->gallery = json_encode($images);
           }
          if($prod->save()){
            DB::commit();
            Session::flash('alert', 'success');
            Session::flash('message', 'Product Updated Successfully');  
            return redirect()->back();
          }
      }catch(\Exception $e){
          DB::rollBack();
          throw $e;
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
