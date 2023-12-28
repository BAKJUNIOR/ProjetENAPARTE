<?php

namespace App\Models;

    class Cart{

        public $items = null; // contient tous les items possible(prix du produit , qte)
        public $totalQty = 0; // contient la qte de produit
        public $totalPrice = 0; // le total des prix selectionner


        public function __construct($oldCart){
            
            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }

        }

        public function add($item){ // ajouter panier fonction

            $storedItem = ['qty' => 0, 'product_id' => 0, 'product_name' => $item->product_name,
            'product_price' => $item->product_price, 'product_image' => $item->product_image, 'item' =>$item];
           

            if($this->items){
                if(array_key_exists($item->id, $this->items)){
                    $storedItem = $this->items[$item->id];
                }
            }

            $storedItem['qty']++;
            $storedItem['product_id'] = $item->id;
            $storedItem['product_name'] = $item->product_name;
            $storedItem['product_price'] = $item->product_price;
            $storedItem['product_image'] = $item->product_image;
            $this->totalQty++;
            $this->totalPrice += $item->product_price;
            $this->totalPrice = $this->totalPrice; 
            $this->items[$item->id] = $storedItem;

        }

        public function updateQty($id, $qty){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQty += $qty;
           $this->totalPrice += $this->items[$id]['product_price'] * $qty;
           $this->totalPrice = number_format($this->totalPrice, 2, '.', '');

        }

        public function removeItem($id){
          $this->totalQty -= $this->items[$id]['qty'];
           $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }


    }

?>