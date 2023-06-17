<?php

namespace App\Http\Controllers;
use App\Models\Classify;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Request\category\CategoryUpdate;
use App\Request\category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('id','desc')->paginate(5);
        // dd($category);
        return view('backend.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classify = Classify::all();
        return view('backend.category.add', compact('classify'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Category::create($request->all());
        return redirect()->route('backend.category.index');
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

        $categories = Category::find($id);
        $classify = Classify::all();
        return view('backend.category.edit', compact('classify', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $categories)
    {
        $form_data = $request->all('name','status');
        try {
            $categories->update($form_data);
            return redirect()->route('category.index')->with('success','update category successful');
            // Category::find($id)->update($request->all());
            //code...
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('success','update category unsuccessful');
        }
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index');
    }
}
