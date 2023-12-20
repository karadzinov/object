<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$category = new Category();


$category->getTree($category->all());








