<?php

include 'Product.php';

$product = new Product(1, "T-Shirt", ["https://picsum.photos/200/306"], 1000, "A beautiful T-Shirt", 10, new DateTime(), new DateTime());

var_dump($product);

// Test des getters
echo "Nom du produit : " . $product->getName() . "\n";
echo "Prix du produit : " . $product->getPrice() . "\n";

// Test des setters
$product->setName("T-Shirt 2");
$product->setPrice(200);

echo "Nouveau nom du produit : " . $product->getName() . "\n";
echo "Nouveau prix du produit : " . $product->getPrice() . "\n";

?>
