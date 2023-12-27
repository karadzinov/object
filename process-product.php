<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});




$product = new Product();
$image = $product->saveImage($_FILES, 'image');
$product->setImage($image);
$product->setName("Test Product");
$product->setPrice("1500");
$product->setUserId(74);
$product->setType("new");
$product->setDescription("<p>This is our product</p>");
$product->setCategory(13);
$product->setQuantity(3);
$product->save();
