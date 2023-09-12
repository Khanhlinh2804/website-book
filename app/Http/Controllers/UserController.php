<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function profile( Order $orders, OrderDetail $orderDetail )
    {
        $customer = Auth::user();
        // dd($orders);
        return view('fontend.account.profile', compact('customer','orderDetail'));
    }
    public function detail(Order $orders,$id,OrderDetail $orderDetail)
    {
        $detail = Order::with('order_detail')->find($id);
        return view('fontend.account.detail', compact('detail','orders'));
    }
    public function history()
    {
        return view('fontend.pages.order_history');
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(UserRegisterRequest $req)
    {
        $password = Hash::make($req->password);
        User::create([
            "name" => $req->name,
            "email" => $req->email,
            "address" => $req->address,
            "phone" => $req->phone,
            "password" => $password,
        ]);

        // return redirect()->route('user.sign-in')->with('alert', 'Sign Up Successfully !');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
