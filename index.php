<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$category = new Category();


$category->getTree($category->all());

$category->getOptions($category->all());
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




