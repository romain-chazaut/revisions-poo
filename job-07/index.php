<?php

include 'Database.php';
include 'Product.php';
include 'Category.php';

$db = new Database();
$pdo = $db->connect();

// Récupération d'un produit spécifique en utilisant findOneById
$product = Product::findOneById($pdo, 22);

if ($product) {
    // Affichage des informations du produit
    echo "<h1>Produit : " . $product->getName() . "</h1>";
    echo "<p>Description : " . $product->getDescription() . "</p>";
    echo "<p>Prix : " . $product->getPrice() . "</p>";

    // Récupération et affichage de la catégorie du produit
    $category = $product->getCategory($pdo);
    echo "<p>Catégorie : " . ($category ? $category->getName() : "Non trouvée") . "</p>";

    // Récupération et affichage des autres produits de la même catégorie
    if ($category) {
        $products = $category->getProducts($pdo);
        echo "<h2>Autres produits dans la catégorie '" . $category->getName() . "':</h2>";
        foreach ($products as $prod) {
            echo "<p>" . $prod->getName() . "</p>";
        }
    }
} else {
    echo "Produit non trouvé.";
}
