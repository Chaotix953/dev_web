<?php
session_start();

function extractProduct(array $products){
    $preparedProduct=[];
    foreach($products as $category){
        foreach($category as $product){
            $preparedProduct[]=$product;
        }
    }
    return $preparedProduct;
}

$_SESSION['products'] = $products;


