<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$category = new Category();


$category->getTree($category->all());




echo '
  <ul>
        <li>Laptops</li>
        <ul>
            <li>Mac</li>
            <li>PC</li>
        </ul>
        <li>Books</li>
        <ul>
            <li>Comedy</li>
            <li>Drama</li>
            <li>Trailer</li>
        </ul>
</ul>
';




