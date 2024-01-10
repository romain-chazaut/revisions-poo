<?php

include 'Database.php';
include 'Product.php';
include 'Category.php';

$db = new Database();
$pdo = $db->connect();

$query = "SELECT * FROM product WHERE id = 23";
$stmt = $pdo->query($query);

if ($productData = $stmt->fetch()) {
    $photos = json_decode($productData['photos'], true) ?: []; // Assurez-vous que cela correspond à la structure de votre base de données
    $product = new Product(
        $productData['id'],
        $productData['name'],
        $photos,
        $productData['price'],
        $productData['description'],
        $productData['quantity'],
        new DateTime($productData['created_at']),
        new DateTime($productData['updated_at']),
        $productData['category_id']
    );

    $category = $product->getCategory($pdo);
    echo "<h1>Produit : " . $product->getName() . "</h1>";
    echo "<p>Description : " . $product->getDescription() . "</p>";
    echo "<p>Prix : " . $product->getPrice() . "</p>";
    echo "<p>Catégorie : " . ($category ? $category->getName() : "Non trouvée") . "</p>";
} else {
    echo "Produit non trouvé.";
}
