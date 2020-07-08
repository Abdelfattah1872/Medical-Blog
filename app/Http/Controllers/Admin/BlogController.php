<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categeory;
use App\Blog;
class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        return view('admin.blog.view',compact('data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categeory::select('id','name')->get();
        return view('admin.blog.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Validate the inputs
        $request->validate([
            'title'=>"required|string|min:1|max:25",
            'brief'=>"required|string|min:1|max:30",
            'cont'=>"required|string|min:10"
        ]);
        //        upload image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        //        Add  data to database
        $data = new Blog;
        $data->title        = $request->title;
        $data->brief        = $request->brief;
        $data->category_id  = $request->category_id;
        $data->image        = $imageName;
        $data->cont         = $request->cont;
        $data->save();
        session()->flash('success',"Thank You:)");
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Blog::findOrfail($id);
        return view('admin.blog.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = Blog::findOrfail($id);
        return view('admin.blog.edit',compact('data'));
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
        $request->validate([
            'title'=>"required|string|min:1|max:25",
            'brief'=>"required|string|min:1|max:30",
            'cont'=>"required|string|min:10"
        ]);
//        dd($request->all());
        $data = Blog::findOrfail($id);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        $data->title        = $request->title;
        $data->brief        = $request->brief;
        $data->category_id  = $request->category_id;
        $data->image        = $imageName;
        $data->cont         = $request->cont;
        session()->flash('success',"Thank You :) -updated");
        $data->save();
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
        Blog::findOrFail($id)->delete();
        session()->flash('success',"Deleted:)");
        return view('admin.blog.Deleted');
    }
}
