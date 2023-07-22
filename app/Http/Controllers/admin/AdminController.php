<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Author;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $order_count = 52;
        $custome_count = 0;

        return view('backend.pages.home',compact('product_count','order_count','custome_count'));
    }
}
