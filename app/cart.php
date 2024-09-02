<?php
    namespace App;

    class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){
            
            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }

        }

        public function add($item, $product_id){

            $storedItem = ['qty' => 0, 'product_id' => 0, 'nom_produit' => $item->nom_produit,
        'prix_produit' => $item->prix_produit, 'image_produit' => $item->produit_image, 'item' =>$item];

        if($this->items){
            if(array_key_exists($product_id, $this->items)){
                $storedItem = $this->items[$product_id];
            }
        }

        $storedItem['qty']++;
        $storedItem['product_id'] = $product_id;
        $storedItem['nom_produit'] = $item->nom_produit;
        $storedItem['prix_produit'] = $item->prix_produit;
        $storedItem['image_produit'] = $item->produit_image;
        $this->totalQty++;
        $this->totalPrice += $item->prix_produit;
        $this->items[$product_id] = $storedItem;

        }

        public function updateQty($id, $qty){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['prix_produit'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQty += $qty;
            $this->totalPrice += $this->items[$id]['prix_produit'] * $qty;

        }

        public function removeItem($id){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['prix_produit'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }


    }
?>