<?php

require "vendor/autoload.php";


$data = [
    'nom' => "Produit 1000",
    'prix' => 50000
];

$produit = App\Produit::find(1);


echo $produit;