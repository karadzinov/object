<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$category = new Category();
$categories = $category->all();


foreach($categories as $category)
{
    echo $category->getName() . "<br />";
}





