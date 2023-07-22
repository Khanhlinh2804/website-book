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
        $saleProducts = Product::orderBy('sale_price', 'ASC')->where('sale_price', '>', 0)->limit(8)->get();
       return view('fontend.pages.home', compact('newproducts','RandomProducts','RandomProduct','saleProducts'));
    }
    public function about(){
        return view('fontend.pages.about');
    }
    public function contact(){
        return view('fontend.pages.contact');
    }
    
    public function sortByShop($sortBy){
        if($sortBy == 'price-ASC'){
            return $product = Product::orderBy('sale_price', 'ASC')->paginate(9);
        }
        else if($sortBy == 'price-DESC'){
            return $product = Product::orderBy('sale_price', 'DESC')->paginate(9);
        }
        else if($sortBy == 'name-ASC'){
            return $product = Product::orderBy('name', 'ASC')->paginate(9);
        }
        else {
            return $product = Product::orderBy('name', 'DESC')->paginate(9);
        }
    }
    public function shop(){
        $product_count = Product::count();
        $allproduct = Product::paginate(12);
        $randomShop = Product::inRandomOrder()->limit(2)->get();
        $classify = Classify::all();
        $author = Author::all();
        return view('fontend.pages.shop', compact('product_count','allproduct','randomShop','classify', 'author'));
    }
    public function shop_classify($id){
        $randomShop = Product::inRandomOrder()->limit(2)->get();
        // $classifies = Classify::all();
        $author = Author::all();
        $classify = Classify::where('id',$id)->first();
        $product = Product::where('classify_id', $classify->id)->get();
        return view('fontend.pages.shop_detail', compact('classify','product','randomShop'));
    }
    public function detail($id){
        $randomcard = Product::inRandomOrder()->limit(4)->get();
        $pro = Product::find($id);
        $author = Author::all();
        $classify = Classify::all();
        return view('fontend.pages.detail', compact('randomcard','pro','classify','author'));
    }
    
    
}
