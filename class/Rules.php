<?php
namespace App;

interface Rules
{
    public function get();

    public  function save();

    public  function all();

    public function delete();

    public function update();

}