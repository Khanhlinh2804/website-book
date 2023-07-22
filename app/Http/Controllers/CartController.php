<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Model\Order;
use App\Models\Product;

class CartController extends Controller
{
    public function add(CartHelper $cart,$id){
        $product = Product::find($id);
        $cart->add($product);
        // dd(session('cart'));
        return redirect()->back();
    
    }
    public function remove(CartHelper $cart,$id){
        $cart->remove($id);
        return redirect()->back();
    
    }
    public function clear(CartHelpe $cart){
        $cart->remuve($id);
        return redirect()->back();
    
    }
    public function update(CartHelper $cart,$id){
        $quantity = request()->quantity ? request()->quantity : 1;
        $product = Product::find($id);
        $cart->add($product, $quantity);
        return redirect()->back();
    
    }
    public function show()
    {
        return view('fontend.cart.cart');
    }
    
    

}
