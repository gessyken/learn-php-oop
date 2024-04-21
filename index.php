<?php

require "vendor/autoload.php";


$data = [
    'nom' => "Produit 1000",
    'prix' => 50000
];

$produits = App\Produit::all(1);


dd($produits);