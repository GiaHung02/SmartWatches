<?php
namespace App\Models;

class cartItem {
    public $products;
    public $quantity;

    public function __construct($products, $quantity) {
        $this->products = $products;
        $this->quantity = $quantity;
    }

    public function incrementQuantity($quantity) {
        $this->quantity += $quantity;
    }

    public function decrementQuantity($quantity) {
        $this->quantity -= $quantity;
    }
}