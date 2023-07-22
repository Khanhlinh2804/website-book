<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\classily\ClassilyRequest;
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
        $cation = Classify::orderByDesc('id','desc')->paginate(5)->withQueryString();
        // dd($cation);
        return view('backend.classify.list', compact('cation'));
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
        // dd($request);
        $form_data = $request->all('name','status');
        try {
            Classify::create($form_data);
            return redirect()->route('classify.index')->with('success','Insert Classify Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('classify.index')->with('success','Insert Classify Unsuccessfully');
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
    public function update(ClassilyRequest $request, Classify $cation)
    {
        $form_data = $request->all('name', 'status');
        $request->validated();
        $cation->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('classify.index')->with('success','Update Classify Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classify::find($id)->delete();
        return redirect()->route('classify.index')->with('success','Delete Product Successfully');
    }
}
