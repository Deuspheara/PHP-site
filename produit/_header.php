<?php
require 'db.class.php';
require 'panier.class.php';
$panier = new panier($con);
$products = $con->query('SELECT * FROM `products_site`');
?>