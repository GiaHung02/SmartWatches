<?php
namespace App\Models;

class cartItem {
    public $product;
    public $quantity;

    public function _construct($product, $quantity) {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function incrementQuantity($quantity) {
        $this->quantity += $quantity;
    }
}