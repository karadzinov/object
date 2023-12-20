<?php

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$id = $_GET['id'];

$c = new Category();
$c->setid($id);
$category = $c->get();

echo  "<h1>".$category->getName(). "</h1>";

$db = new DB("products");
$results = $db->selectWhere("category_id", $category->getId());

foreach($results as $object)
{
    $product = new Product();
    $product->setId($object->id);
    $product->get();
    echo $product->getName(). "<br  />";

}







