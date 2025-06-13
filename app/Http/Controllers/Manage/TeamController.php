<?php

namespace App\Http\Controllers\Manage;
use App\Models\Team;

use App\Traits\imageUpload;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use imageUpload;
     public $team;

    public function __construct()
    {
        $this->team = new Team;
    }
    public function index()
    {
        $team = Team::latest()->get();
        addHashId($team);
        return view('manage.team.index')
            ->with('team', $team)
            ->with('bheading', 'Team')
            ->with('breadcrumb', 'Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.team.create')
            ->with('bheading', 'Team')
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
                'description' => 'required'
        ]);
        if ($validate->fails()) {
            Session::flash('alert', 'error'); 
            Session::flash('message', $validate->errors()->first());

            return redirect()->back()->withErrors($validate)->withInput($request->all())
                ->with('bheading', 'Team')
                ->with('breadcrumb', 'Index');
        }

       
 $data = $request->only('name', 'title', 'description');

    if ($request->hasFile('image')) {
        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/team'), $fileName);
        $data['image'] = 'uploads/team/' . $fileName;
    }
        
        $team = Team::create($data);

        
        if ($team) {
            Session::flash('alert', 'success');
            Session::flash('message', 'Team Added Successfully');
            return redirect()->back()
                ->with('bheading', 'Team')
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
        $team = Team::where('id', $id[0])->first();
        $team->hashid = Hashids::connection('products')->encode($id);
        return view('manage.team.edit')
            ->with('bheading', 'Team')
            ->with('team',   $team)
            ->with('breadcrumb', 'Edit Team');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $id = Hashids::connection('products')->decode($id);
        $team =  Team::where('id', $id)->first();
        $team->name = $request->name;
        $team->title = $request->title;
        $team->description = $request->description;
        if($request->file('image')){
            //$image =  $this->UploadImage($request, 'images/blogs/', 400,300);
            $uploadedFile = $request->file('image');
            $destinationPath = public_path('images/team');
             $fileName = time() . '-' . $uploadedFile->getClientOriginalName(); 
            $uploadedFile->move($destinationPath, $fileName); 
            
             $team->image =  $fileName;
           }
        if($team->save()){
        Session::flash('alert', 'success');
        Session::flash('message','Team Updated Successfully');
        return back();
     }
        Session::flash('alert', 'error');
        Session::flash('message','Request Failed, something went wrong');
        return back();
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
