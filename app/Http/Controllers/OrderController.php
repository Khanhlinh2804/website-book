<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests\Order\CheckOut;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Helper\CartHelper;
use App\Models\District;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $orders = Order::with('cityData','districtData')->orderByDesc('id','desc')->search()->paginate(8);
        return view('backend.order.list', compact('orders','user'));
    }
    public function trashed()
    {
        $user = User::all();
        $orders = Order::onlyTrashed()->with('cityData','districtData')->orderByDesc('id','desc')->search()->paginate(8);
        return view('backend.order.trash', compact('orders','user'));
    }
    public function restore($id){
        $orders = Order::withTrashed()->find($id);

        if ($orders) {
            $orders->restore();
            return redirect()->route('admin.order.index')->with('success', 'Order restored successfully.');
        } else {
            return redirect()->route('admin.order.index')->with('error', 'Order not found.');
        }
    }
    public function deleteforce($id){
        $orders = Order::withTrashed()->find($id);

        if ($orders) {
            $orders->forceDelete();
            return redirect()->route('admin.order.index')->with('success', 'Order restored successfully.');
        } else {
            return redirect()->route('no_delete')->with('error', 'Order not found.');
        }
    }


    public function post_checkout(Request $req, CartHelper $cart){
        
        if(isset($_POST['payment'])){
            // $order = Order::all();
            $orders = $req->only('name', 'user_id','address', 'city', 'districts', 'phone', 'email', 'note', 'status');
            // dd($orders);
            // Lưu thông tin order vào bảng "order"
            if ($order = Order::create($orders)) {
                foreach($cart->items as $item) { 
                    $orderDetail = [
                        'order_id' =>  $order->id,
                        'price' => $item['sale_price'] ? $item['sale_price'] : $item['price'],
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                    ];
                    // dd($orderDetail);
                    OrderDetail::create($orderDetail);
                }
                // đưa giỏ hàng về rỗng 
                $cart->clear();
                return view('fontend.pages.order_success'); 
            }

        }
        return view('fontend.pages.successfuly');
    } 
    
    
    public function order_success()
    {
        return view('fontend.pages.order_success');
    }

    
    
    public function checkout(CartHelper $cart)
    {
        if(auth()->user()){
            $city = City::all();
            $districts = District::all();
            return view('fontend.cart.checkout', compact('city','districts', 'cart'));
        }else{
            return view('fontend.account.request');
        }
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
        // note luôn ra  nhưng đợi lâu ( eager loading) 
        $orders = Order::with('order_detail','cityData','districtData')->find($id);
        // note từ từ (lazy loading) trong từng trường hợp cái này sẽ thông dụng hơn
        // $orders = Order::find($id);
        return view('backend.order.edit', compact('orders'));
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
        $orders = Order::find($id);
        // dd($orders);
        if (!$orders) {
            return redirect()->back()->with('error', 'Order not found.');
        }else {
            $orders->update([
                'status' =>$request->status
            ]);
        }
        return redirect()->route('admin.order.index')->with('success', 'update status successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        try {
            $order->delete();
            return redirect()->route('admin.order.index');    
        } catch (\Throwable $th) {
            return redirect()->route('no_delete');
        }
    }
}
