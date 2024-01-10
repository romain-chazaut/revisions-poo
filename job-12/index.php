<?php

include 'Database.php';
include 'Product.php';
include 'Category.php';
include 'Clothing.php'; 

$db = new Database();
$pdo = $db->connect();

// Création d'une nouvelle instance de Product
$newProduct = new Product(
    0, // ID sera défini après insertion
    "Nouveau Produit",
    ["url_photo1.jpg", "url_photo2.jpg"],
    100,
    "Description du nouveau produit",
    10,
    new DateTime(),
    new DateTime(),
    1 // ID de la catégorie
);

// Insertion du produit dans la base de données
$createdProduct = $newProduct->create($pdo);

if ($createdProduct) {
    echo "Produit créé avec succès. ID: " . $createdProduct->getId() . "<br><br>";
} else {
    echo "Échec de la création du produit.<br><br>";
}

// Création d'une nouvelle instance de Clothing
$newClothingItem = new Clothing(
    0, // ID sera défini après insertion dans `product`
    "T-Shirt Cool",
    ["url_photo_tshirt.jpg"],
    19.99,
    "Un T-shirt très cool",
    100,
    new DateTime(),
    new DateTime(),
    1, // ID de la catégorie Vêtements
    "M", 
    "Blue", 
    "T-Shirt", 
    5 // Frais de matériau
);

// Insertion du vêtement dans la base de données
$createdClothingItem = $newClothingItem->create($pdo);

if ($createdClothingItem) {
    echo "Vêtement créé avec succès. ID: " . $createdClothingItem->getId() . "<br><br>";
} else {
    echo "Échec de la création du vêtement.<br><br>";
}

// Mise à jour d'un produit spécifique
$productToUpdate = Product::findOneById($pdo, 7);

if ($productToUpdate) {
    // Modification de certaines propriétés
    $productToUpdate->setName("Nom Modifié");
    $productToUpdate->setPrice(200);

    // Mise à jour du produit dans la base de données
    $updatedProduct = $productToUpdate->update($pdo);

    if ($updatedProduct) {
        echo "Produit mis à jour avec succès. ID: " . $updatedProduct->getId() . "<br><br>";
    } else {
        echo "Échec de la mise à jour du produit.<br><br>";
    }
} else {
    echo "Produit avec l'ID 7 non trouvé pour mise à jour.<br><br>";
}

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
    echo "Produit avec l'ID 7 non trouvé.";
}
?>
