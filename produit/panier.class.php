<?php
class panier{
    public function __construct($con){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
        $this->con = $con;
        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']);
        }
    }

    public function count(){
        return array_sum($_SESSION['panier']);
    }

     public function total()
    {
        
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)){
            $products = array();
        }else{
            $products = $this->current($con->query("SELECT * FROM `products_site` WHERE id IN ('.implode(',',$ids).')")->fetch_object());
        }
        foreach($products as $product_id => $product ){
            $total += $products->price * $_SESSION['panier'][$products->id];
        }
    }

    public function add($product_id){
        if( isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++;
        }else{
            $_SESSION['panier'][$product_id] = 1;
        }
        
    }

    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }
}
