<?php

    spl_autoload_register(function($name){
        require_once $name.'.php';
    });

    use Models\Producto;
    $data = array(
        'price' => 12.5,
        'name' => 'ACE',
        'stock' => 20);
    $p = new Producto();
    var_dump($p->create($data));
    
    