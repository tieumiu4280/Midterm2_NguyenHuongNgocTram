<?php

namespace App;

class cart 
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }

    }
    public function add($item,$id,$qty=1){
        if($item->promotion_price==0){
            $cart=['qty'=>0,'price'=>$item->unit_price,'item'=>$item];
            if($this->items){
                if(array_key_exists($id,$this->items)){
                    $cart=$this->items[$id];
                }
            }
            $cart['qty']=$cart['qty']+$qty;
            $cart['price']=$item->unit_price*$cart['qty'];
            $this->items[$id]=$cart;
            $this->totalQty=$this->totalQty+$qty;
            $this->totalPrice += $item->unit_price*$cart['qty'];
        }
        else{
            $cart=['qty'=>0,'price'=>$item->promotion_price,'item'=>$item];
            if($this->items){
                if(array_key_exists($id,$this->items)){
                    $cart=$this->items[$id];
                }
            }
            $cart['qty']=$cart['qty']+$qty;
            $cart['price']=$item->promotion_price*$cart['qty'];
            $this->items[$id]=$cart;
            $this->totalQty=$this->totalQty+$qty;
            $this->totalPrice += $item->promotion_price*$cart['qty'];
        }
    }
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }

    }
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
