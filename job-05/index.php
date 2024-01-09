<?php

include 'Database.php';
include 'Product.php';
include 'Category.php';

$db = new Database();
$pdo = $db->connect();

$query = "SELECT * FROM product WHERE id = 7";
$stmt = $pdo->query($query);

if ($productData = $stmt->fetch()) {
    // Fournir un tableau vide si 'photos' est NULL ou non défini
    $photos = !empty($productData['photos']) ? json_decode($productData['photos'], true) : [];

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

    var_dump($product);
} else {
    echo "Produit non trouvé.";
}


// Test des setters
$product->setName("T-Shirt 2");
$product->setPrice(200);

echo "Nouveau nom du produit : " . $product->getName() . "\n";
echo "Nouveau prix du produit : " . $product->getPrice() . "\n";

?>
