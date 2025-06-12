<?php
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageUpload;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Testimonials;

class TestimonialsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use imageUpload;
     public $testimonial;

    public function __construct()
    {
        $this->testimonial = new Testimonials;
    }
    public function index()
    {
        $testimonial = Testimonials::latest()->get();
        addHashId($testimonial);
        return view('manage.testimonials.index')
            ->with('testimonial', $testimonial)
            ->with('bheading', 'testimonial')
            ->with('breadcrumb', 'Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.testimonials.create')
            ->with('bheading', 'Testimonial')
            ->with('breadcrumb', 'Index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'title' => 'required',
                'content' => 'required'
        ]);
        if ($validate->fails()) {
            Session::flash('alert', 'error'); 
            Session::flash('message', $validate->errors()->first());

            return redirect()->back()->withErrors($validate)->withInput($request->all())
                ->with('bheading', 'Testimonial')
                ->with('breadcrumb', 'Index');
        }

       if ($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $image = Image::make($file)->resize(300, 300);
    $image->save(public_path('images/testimonial/' . $filename));
    $filen= $image;
}

        //  dd($fileName);
        $data = [
            'name' => $request->name,
            'image' => $filen,
            'title' => $request->title,
            'content' => $request->content,
        ];
        $testimonial =  $this->testimonial->create($data);
        if ($testimonial) {
            Session::flash('alert', 'success');
            Session::flash('message', 'Testimonial Added Successfully');
            return redirect()->back()
                ->with('bheading', 'Testimonial')
                ->with('breadcrumb', 'Index');
        }
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
        $id =  Hashids::connection('products')->decode($id);
        $cat = Category::where('id', $id[0])->first();
        $cat->hashid = Hashids::connection('products')->encode($id);
        return view('manage.category.edit')
            ->with('bheading', 'Category')
            ->with('category',   $cat)
            ->with('breadcrumb', 'Edit Catogry');
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
        $valid = Validator::make($request->all(),[
                'markup' => 'required|numeric',
                'inflated' => 'required|numeric'
        ]);
        if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('message', $valid->errors()->first());  
        }
        $id = Hashids::connection('products')->decode($id);
        $category = category::where('id', $id)->first();
        $category->name = $request->name;

        $category->markup = $request->markup;
        $category->inflated = $request->inflated;
        if($request->file('image')){
            $category->image_path = $this->UploadImage($request, 'images/category/',400, 400);
        }else{
            $category->image_path =  $category->image;  
        }
        if($category->save()){
            Session::flash('alert', 'success');
            Session::flash('message', 'Category Added Successfully');
            return redirect()->back()
                ->with('bheading', 'Category')
                ->with('breadcrumb', 'Index');
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
