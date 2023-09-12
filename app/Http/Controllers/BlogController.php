<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderByDesc('name','desc')->search()->paginate(5);
        return view('backend.blogs.list', compact('blog'));
    }
    public function trashed()
    {
        $blog = Blog::onlyTrashed()->orderByDesc('name','desc')->search()->paginate(5);
        return view('backend.blogs.trash', compact('blog'));
    }

    public function restore($id){
        $blog = Blog::withTrashed()->find($id);
        if ($blog) {
            $blog->restore();
            return redirect()->route('admin.banner.index')->with('success', 'Classify restored successfully.');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Classify not found.');
        }
    }

    public function deleteforce($id){
        $blog = Blog::withTrashed()->find($id);
        if ($blog) {
            $blog->forceDelete();
            return redirect()->route('admin.banner.index')->with('success', 'Classify restored successfully.');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Classify not found.');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|max:50|min:3',
            'image' =>'required',
        ];
        $messages = [
            'name.required' => 'Name blog not empty',
            'name.max' => 'Name blog cannot be longer than 50 characters',
            'name.min' => 'Name blog cannot be short than 3 characters',
            'image.required' => 'Image not empty'
        ];

        $request->validate($rules,$messages);

        $file_name= time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'), $file_name);

        Blog::create([
            'name'=> $request->name,
            'image'=> $file_name,
            'title'=> $request->title,
            'content'=> $request->content,
            'status' => $request->status
        ]);
        return redirect()->route('admin.blog.index');
    }

    public function contact(){
        return view('fontend.pages.contact');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function about(){
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        return view('fontend.pages.about',compact('blogs'));
    }

    public function show($id)
    {
        $blogs = Blog::find($id);
        $data = Blog::inRandomOrder()->limit(3)->where('status',1)->get();
        return view('fontend.pages.blogs', compact('blogs','data'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('backend.blogs.edit',compact('blog'));
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
        $blog = Blog::find($id);
        $rules = [
            'name'=>'required|max:50|min:3',
            'image' =>'required',
        ];
        $messages = [
            'name.required' => 'Name blog not empty',
            'name.max' => 'Name blog cannot be longer than 50 characters',
            'name.min' => 'Name blog cannot be short than 3 characters',
            'image.required' => 'Image not empty'
        ];

        $file_name = $blog->image;

        if($request->has('image')){
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'),$file_name);

        }
        $blog->update([
            'name'=> $request->name,
            'image'=> $file_name,
            'title'=> $request->title,
            'content'=> $request->content,
            'status' => $request->status
        ]);
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return redirect()->route('admin.blog.index');
    }
}
