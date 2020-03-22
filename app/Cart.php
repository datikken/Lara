<?php
/**
 * Created by IntelliJ IDEA.
 * User: tikken
 * Date: 3/22/20
 * Time: 11:28 AM
 */

namespace App;

class Cart
{
    public $items;
    public $totalQuantity;
    public $totalPrice;

    public function __construct($prevCart)
    {
        if($prevCart != null)
        {
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function addItem($id, $product)
    {
        $price = (int) str_replace('$', '', $product->price);
        //check if item already in cart
        if(array_key_exists($id, $this->items))
        {
            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
            $productToAdd['totalprice'] =  $productToAdd['quantity'] * $productToAdd['price'];
        } else {
            $productToAdd = ['quantity' => 1,'price' => $price, 'totalprice' => $price,'data'=> $product];

        }

        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;
    }
}
