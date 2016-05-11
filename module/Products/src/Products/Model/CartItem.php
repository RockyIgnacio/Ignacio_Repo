<?php
/**
 * Created by PhpStorm.
 * User: ignacio.i
 * Date: 5/3/2016
 * Time: 7:27 PM
 */

namespace Products\Model;


class CartItem
{
    public $cart_item_id;
    public $cart_id;
    public $product_id;
    public $qty;
    public $unit_price;
    public $price;
    public $weight;

    public $product_name;
    public $product_desc;
    public $product_thumbnail;
    //public $productprice;
    

    public function exchangeArray($data)
    {
        $this->cart_item_id       = (!empty($data['cart_item_id'])) ? $data['cart_item_id'] : null;
        $this->cart_id            = (!empty($data['cart_id'])) ? $data['cart_id'] : null;
        $this->product_id         = (!empty($data['product_id'])) ? $data['product_id'] : null;
        $this->qty                = (!empty($data['qty'])) ? $data['qty'] : null;
        $this->unit_price         = (!empty($data['unit_price'])) ? $data['unit_price'] : null;
        $this->price              = (!empty($data['price'])) ? $data['price'] : null;
        $this->weight             = (!empty($data['weight'])) ? $data['weight'] : null;

        $this->product_name       = (!empty($data['product_name'])) ? $data['product_name'] : null;
        $this->product_desc       = (!empty($data['product_desc'])) ? $data['product_desc'] : null;
        $this->product_thumbnail  = (!empty($data['product_thumbnail'])) ? $data['product_thumbnail'] : null;



    }


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}