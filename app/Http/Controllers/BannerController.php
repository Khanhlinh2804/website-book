<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;
use App\Http\Requests\banner\BannerRequest;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderByDesc('name','desc')->search()->paginate(5);
        return view('backend.banner.list' ,compact('banners'));
    }
    public function trashed()
    {
        $banners = Banner::onlyTrashed()->orderByDesc('name','desc')->search()->paginate(5);
        return view('backend.banner.trash' ,compact('banners'));
    }
    public function restore($id){
        $banners = Banner::withTrashed()->find($id);

        if ($banners) {
            $banners->restore();
            return redirect()->route('admin.banner.index')->with('success', 'Classify restored successfully.');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Classify not found.');
        }
    }
    public function deleteforce($id){
        $banners = Banner::withTrashed()->find($id);

        if ($banners) {
            $banners->forceDelete();
            return redirect()->route('admin.banner.trashed')->with('success', 'Classify restored successfully.');
        } else {
            return redirect()->route('no_delete')->with('error', 'Classify not found.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.add');
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
            'name.required' => 'Name banner not empty',
            'name.max' => 'Name banner cannot be longer than 50 characters',
            'name.min' => 'Name banner cannot be short than 3 characters',
            'image.required' => 'Image not empty'
        ];
        
        $request->validate($rules,$messages);

        $file_name = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'),$file_name);

        Banner::create([
            'name'=> $request->name,
            'image'=> $file_name,
            'status'=> $request->status,
            'link'=> $request->link
        ]);
        return redirect()->route('admin.banner.index')->with('success', 'add banner Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('backend.banner.edit',compact('banners'));
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
        $banners = Banner::find($id);
        $rules = [
            'name'=>'required|max:50|min:3',
            'image' =>'required',
        ];
        $messages = [
            'name.required' => 'Name banner not empty',
            'name.max' => 'Name banner cannot be longer than 50 characters',
            'name.min' => 'Name banner cannot be short than 3 characters',
            'image.required' => 'Image not empty'
        ];
        $request->validate( $rules,$messages);

        $file_name = $banners->image;
        // dd($file_name);
        if($request->has('image')){
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name);
        }
        $banners->update([
            'name' =>$request->name,
            'status' => $request->status,
            'image' =>$file_name,
            'link' => $request->link
        ]);
        return redirect()->route('admin.banner.index')->with('success', 'Update banner successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect()->route('admin.banner.index')->with('success', 'delete successfully');
    }
}
