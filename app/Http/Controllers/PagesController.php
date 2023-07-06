<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Classify;
use app\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
    public function shop(){
        
        return view('fontend.page.home');
    }
}
