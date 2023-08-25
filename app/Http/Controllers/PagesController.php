<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Author;
use App\Models\Classify;
use app\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClassifyController;


class PagesController extends Controller
{
    public function index(){
        $newproducts = Product::orderBy('id','DESC')->limit(8)->get();
        $RandomProducts = Product::inRandomOrder()->limit(1)->get();
        $RandomProduct = Product::inRandomOrder()->limit(1)->get();
        $clas = Classify::inRandomOrder()->limit(4)->get();
        $saleProducts = Product::orderBy('sale_price', 'ASC')->where('sale_price', '>', 0)->limit(8)->get();
       return view('fontend.pages.home', compact('clas','newproducts','RandomProducts','RandomProduct','saleProducts'));
    }
    public function about(){
        return view('fontend.pages.about');
    }
    public function contact(){
        return view('fontend.pages.contact');
    }
    
    // public function sortProducts(Request $request){
    //     $sort = $request->input('sort', 'name-ASC');

    //     list($sortField, $sortDirection) = explode('-', $sort);

    //     $products = Product::orderBy($sortField, $sortDirection);

    //     return view('fontend.pages.shop',['products' => $products]);
    // }
 
    public function footer(){
        $footer = Product::with('author')->inRandomOrder()->limit(1);
        return view('fontend.app',compact('footer'));
    }
    public function shop(Request $request){
        $product_count = Product::count();
        $allproduct = Product::with('author')->search()->paginate(6);
        $randomShop = Product::inRandomOrder()->limit(2)->get();
        $classify = Classify::all();
        $author = Author::all();
        return view('fontend.pages.shop', compact('classify','product_count','allproduct','randomShop','author'));
    }
    public function shop_classify($id){
        $author = Author::all();
        $randomShop = Product::inRandomOrder()->limit(2)->get();
        $classify = Classify::where('id',$id)->first();
        $product = Product::where('classify_id', $classify->id)->search()->paginate(6);
        return view('fontend.pages.shop_detail', compact('classify','product','randomShop'));
    }
    public function shop_author($id){
        
        $classify = Classify::all();
        $author = Author::where('id',$id)->first();
        $randomShop = Product::inRandomOrder()->limit(2)->get();
        $allproduct = Product::where('author_id', $author->id)->search()->paginate(6);
        return view('fontend.pages.shop_author',compact('allproduct','author','randomShop'));

    }
    public function detail($id){
        $randomcard = Product::inRandomOrder()->limit(4)->get();
        $pro = Product::with('author','classifies')->find($id);
        return view('fontend.pages.detail', compact('randomcard','pro'));
    }

    
    
}
