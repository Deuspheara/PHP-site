<?php
require '_header.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(empty($id)){
        die("ce produit n'existe pas");
        
    }
    $panier->add($id);
    header('Location: ./index.php');
    die("Le produit a bien été ajouté à votre panier");
    
    exit();
}else{
    die("Vous n'avez pas sélectionné de produit à ajouter au panier");    
}



?>