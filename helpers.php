<?php

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function urlIs($url){
    return $_SERVER['REQUEST_URI'] === $url;
}