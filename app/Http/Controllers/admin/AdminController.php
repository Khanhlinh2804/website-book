<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Author;
use App\Models\User;
use App\Models\Classify;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $order_count = Order::count();
        $custome_count = User::count();
        $classify_count = Classify::count();
        return view('backend.pages.home',compact('classify_count','product_count','order_count','custome_count'));
    }

    
    public function admin(){
        return view('backend.admin');
    }

    public function post_admin()
    {    
            $login = request()->only(['email', 'password']);
            $token = auth()->attempt($login);
            if ($token) {
                return redirect('/admin/dashboard');
            // }
            } else {
            return redirect('/admin');
            };
    }

    public function no_delete(){
        return view('backend.pages.foreign_key');
    }

    public function error(){
        $code = request()->code;
        $error = config('error.'.$code);
        return view('backend.error', $error);
    }

    public function logon(){
        $logout = Auth::logout();
        if($logout){
            return redirect()->route('admin.admin')->with('success', 'logout success');
        }else{
            return redirect()->back();
        }
    }
    

}
