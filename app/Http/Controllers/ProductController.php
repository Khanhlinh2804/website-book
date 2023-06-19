<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductEdit;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id','desc')->paginate(10);
        return view('backend.product.list', compact('products'));

        Product::with('categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        
        $request->validated();
        $file_name = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads'),$file_name);
        Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'sale_price' =>$request->sale_price,
            'image' => $file_name,
            'status' => $request->status,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('product.index')->with('success', 'insert data successfully');
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
        $cat = Category::all();
        $pro = Product::find($id);
        return view('backend.product.edit', compact('cat','pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $pro = Product::find($id);
        $request->validated();
        $file_name = $pro->image;
        if($request->has('image')){
            $file_name = time() . $request->image->getClientOriginalName();
            // unlink('upload/'. $pro->image);
            $request->image->move(public_path('uploads'), $file_name);
            // $request->image->move(public_path('/uploads',$file_name)); 
        }
        Product::find($id)->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'sale_price' =>$request->sale_price,
            'image' => $file_name,
            'status' => $request->status,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('product.index')->with('success','Update Product SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Delete Product Successfully');
    }
}
