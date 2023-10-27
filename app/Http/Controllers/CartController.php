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
        // dd($cart);
        $cart->add($product);
        return redirect()->back();
    
    }
    public function remove(CartHelper $cart,$id){
        
        $cart->remove($id);
        return redirect()->back();
    
    }
    public function clear(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    
    }
    public function update(Request $request, CartHelper $cart, $id){
        $quantity = request()->quantity ? request()->quantity : 1;
        $product = Product::find($id);
        $cart->update($id,$quantity);
        return redirect()->back();
    }
    

    public function show(CartHelper $cart)
    {
        $carts_view = $cart->getCart();
        $totalPrice = $cart->totalPrice();
        return view('fontend.cart.cart', compact('carts_view'));
    }
    
    

}
 