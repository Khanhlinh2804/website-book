<?php
    namespace App\Helper;

    class CartHelper
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;
    
    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->totalPrice();
        $this->total_quantity = $this->get_total_quantity();
    }
    public function totalPrice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['quantity'] * $item['sale_price'];
        }
        return $total; 
    }

    public function get_total_quantity()
    {
        $quantity = 0;
        foreach ($this->items as $item) {
            $quantity += $item['quantity'];
        }
        return $quantity;

    }

    public function add($product, $quantity = 1){
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'sale_price' => $product->sale_price ? $product->sale_price : $product->price ,
            'image' => $product->image,
            'quantity' => $quantity,

        ];
        if(isset($this->items[$product->id])){
            $this->items[$product->id]['quantity'] += $quantity;
        }else {
            $this->items[$product->id] = $item;
        }
    
        session(['cart'=>$this->items]);
    }
    public function remove($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart'=>$this->items]);

    }
    public function uptate($id, $quantity = 1){
        if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }
    public function clear(){
        session(['cart' => '']); 
    }

}
?>