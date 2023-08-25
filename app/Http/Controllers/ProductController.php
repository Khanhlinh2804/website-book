<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\product\ProductUpdateRequest;
use App\Http\Requests\ProductEdit;
use App\Models\Author;
use App\Models\Classify;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Product::with('authors','classifies');
        // cach 1: search 
        // $products = Product::orderByDesc('id','desc')->paginate(10);
        // dd(request()->key);
        // if($key = request()->key){
            //     $products = Product::orderByDesc('id','desc')->where('name','like', '%'.$key.'%')->paginate(10);
            
            // }
            // cách 2: search 
        $products = Product::orderByDesc('id','desc')->search()->paginate(5);
        return view('backend.product.list', compact('products'));
    }
    public function trashed(){
        Product::with('authors','classifies');
        $products = Product::onlyTrashed()->orderByDesc('id','desc')->search()->paginate(10);
        return view('backend.product.trash', compact('products'));
    }


    public function restore($id){
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->restore();
            return redirect()->route('admin.product.index')->with('success', 'Product restored successfully.');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Product not found.');
        }
    }
    public function deleteforce($id){
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->forceDelete();
            return redirect()->route('admin.product.index')->with('success', 'Product restored successfully.');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Product not found.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Classify::all(); 
        $author = Author::all();
        return view('backend.product.add', compact('author','class'));
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
            'quantity'=> $request->quantity,
            'image' => $file_name,
            'status' => $request->status,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'classify_id' => $request->classify_id
        ]);
        return redirect()->route('admin.product.index')->with('success', 'insert data successfully');
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
        $author = Author::all();
        $cala = Classify::all();
        $pro = Product::with('author','classifies')->find($id);
        return view('backend.product.edit', compact('pro', 'author', 'cala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $pro = Product::find($id);
        // dd($pro);
        $request->validated();
        $file_name = $pro->image;
        if($request->has('image')){
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name); 
        }
        $pro->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'sale_price' =>$request->sale_price,
            'quantity' => $request ->quantity,
            'image' => $file_name,
            'status' => $request->status,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'classify_id' => $request->classify_id
        ]);
        return redirect()->route('admin.product.index')->with('success','Update Product SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();
            return redirect()->route('admin.product.index')->with('success','Delete Product Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('no_delete');
        }
        
    }
}
