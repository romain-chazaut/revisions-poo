<?php

include 'Product.php';
include 'Category.php';

// Création d'une catégorie
$category = new Category(1, "Vêtements", "Description de la catégorie", new DateTime(), new DateTime());

// Création d'un produit avec l'ID de la catégorie
$product = new Product(1, "T-Shirt", ["https://picsum.photos/200/306"], 1000, "A beautiful T-Shirt", 10, new DateTime(), new DateTime(), $category->getId());

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
