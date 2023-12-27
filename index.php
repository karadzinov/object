<?php

require 'vendor/autoload.php';
use App\Category;
use App\Product;

$category = new Category();


$category->getTree($category->all());

$category->getOptions($category->all());

$product = new Product();
$product->setId(3);
$product->get();

dd($product->getCreatedAt());

dump("Prodolzuva");
dd("here");




/*

echo '<select>
    <option>Laptops</option>
    <option>- Mac</option>
    <option>- Pc</option>
    <option>Books</option>
    <option>- Comedy</option>
    <option>-- Tragic Comedy</option>
    <option>--- Tazno</option>
</select>';*/




