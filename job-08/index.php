<?php

include 'Database.php';
include 'Product.php';
include 'Category.php';

$db = new Database();
$pdo = $db->connect();

// Récupération de tous les produits
$allProducts = Product::findAll($pdo);

echo "<h1>Tous les Produits</h1>";
foreach ($allProducts as $product) {
    echo "<h2>" . $product->getName() . "</h2>";
    echo "<p>Description : " . $product->getDescription() . "</p>";
    echo "<p>Prix : " . $product->getPrice() . "</p>";
    echo "<p>Quantité : " . $product->getQuantity() . "</p>";
    echo "<p>Créé le : " . $product->getCreatedAt()->format('d/m/Y H:i:s') . "</p>";

}

// Récupération d'un produit spécifique en utilisant findOneById
$product = Product::findOneById($pdo, 7);

if ($product) {
    echo "<h1>Produit Spécifique : " . $product->getName() . "</h1>";
    echo "<p>Description : " . $product->getDescription() . "</p>";
    echo "<p>Prix : " . $product->getPrice() . "</p>";
    echo "<p>Quantité : " . $product->getQuantity() . "</p>";
    echo "<p>Créé le : " . $product->getCreatedAt()->format('d/m/Y H:i:s') . "</p>";

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
    echo "Produit avec l'ID 22 non trouvé.";
}
