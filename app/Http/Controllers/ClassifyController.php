<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\classily\ClassilyStoreRequest;
use App\Models\Classify;

class ClassifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classify = Classify::orderByDesc('id','desc')->paginate(5);
        // dd($classify);
        return view('backend.classify.list', compact('classify'));
    }

    public function trashed(){
        $classify = Classify::onlyTrashed()->orderByDesc('id','desc')->search()->paginate(5);
        return view('backend.classify.trash', compact('classify'));
    }


    public function restore($id){
        $classify = Classify::withTrashed()->find($id);

        if ($classify) {
            $classify->restore();
            return redirect()->route('admin.classify.index')->with('success', 'Classify restored successfully.');
        } else {
            return redirect()->route('admin.classify.index')->with('error', 'Classify not found.');
        }
    }
    public function deleteforce($id){
        $classify = Classify::withTrashed()->find($id);

        if ($classify) {
            $classify->forceDelete();
            return redirect()->route('admin.classify.index')->with('success', 'Classify restored successfully.');
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
        return view('backend.classify.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // c1 
        // if($request->has('image')){
        //     $file = $request->image;
        //     $file_name = $file->getClientOriginalName();
        //     $file->move(public_path('uploads'),$file_name);
    
        // }
        // // dd($request->all());
        $rules = [
            'name'=>'required|max:50|min:3',
            'image' =>'required',
        ];
        $messages = [
            'name.required' => 'Name classify not empty',
            'name.max' => 'Name classify cannot be longer than 50 characters',
            'name.min' => 'Name classify cannot be short than 3 characters',
            'image.required' => 'Image not empty'
        ];

        
        $request->validate($rules,$messages);
        // c2 
        $file_name = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'),$file_name);

            Classify::create([
                'name'=> $request->name,
                'image'=> $file_name,
                'status'=> $request->status
            ]);
        return redirect()->route('admin.classify.index')->with('success','Insert Classify Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classify = Classify::find($id);
        return view('backend.classify.edit', compact('classify'));
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
        $classify = Classify::find($id);
        $rules = [
            'name'=>'required|max:50|min:3',
            'image' =>'required'
        ];
        $messages = [
            'name.required' => 'Name classify not empty',
            'name.max' => 'Name classify cannot be longer than 50 characters',
            'name.min' => 'Name classify cannot be short than 3 characters',
            'image.required' => 'Image not empty'
        ];
        $request->validate($rules,$messages);
        // dd($classify);
        $file_name = $classify->image;
        if($request->has('image')){
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name); 
        }
        $classify->update([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $file_name
        ]);
        return redirect()->route('admin.classify.index')->with('success','Update Classify Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classify= Classify::find($id);
        
        try {
            $classify->delete();
            return redirect()->route('admin.classify.index')->with('success', 'Delete Product Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('no_delete');
        }
        
    }
}
