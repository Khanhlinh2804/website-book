<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Author;
use App\Models\Classify;
use App\Models\Banner;
use App\Models\Blog;
use app\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClassifyController;


class PagesController extends Controller
{
    public function index(){
        $banners = Banner::all()->where('status',1);
        $newproducts = Product::orderBy('id','DESC')->limit(8)->get();
        $RandomProducts = Product::inRandomOrder()->limit(1)->get();
        $RandomProduct = Product::inRandomOrder()->limit(1)->get();
        $clas = Classify::inRandomOrder()->limit(4)->get();
        $saleProducts = Product::orderBy('sale_price', 'ASC')->where('sale_price', '>', 0)->limit(8)->get();
       return view('fontend.pages.home', compact('clas','newproducts','banners','RandomProducts','RandomProduct','saleProducts'));
    }
    // public function about(){
    //     $blogs = Blog::inRandomOrder()->limit(3)->get();
    //     return view('fontend.pages.about',compact('blogs'));
    // }

    public function contact(){
        return view('fontend.pages.contact');
    }
    
 
    public function footer(){
        $footer = Product::with('author')->inRandomOrder()->limit(1);
        return view('fontend.app',compact('footer'));
    }
    public function shop(Request $request){
        
        // dd($banners);
        $product_count = Product::count();
        $allproduct = Product::with('author')->where('status', 1)->search()->paginate(6);
        $randomShop = Product::inRandomOrder()->limit(2)->get();
        $classify = Classify::all()->where('status',1);
        $author = Author::all()->where('status',1);
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
        $pro = Product::with('author','dataClassify')->find($id);
        return view('fontend.pages.detail', compact('randomcard','pro'));
    }



    
    
}
