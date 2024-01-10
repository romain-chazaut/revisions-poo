<?php

class Product {
    private int $id;
    private string $name;
    private array $photos;
    private int $price;
    private string $description;
    private int $quantity;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private int $category_id;

    public function __construct(
        int $id = 0, 
        string $name = "", 
        ?array $photos = [], 
        int $price = 0, 
        string $description = "", 
        int $quantity = 0, 
        DateTime $createdAt = null, 
        DateTime $updatedAt = null, 
        int $category_id = 0
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos ?? [];
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt ?? new DateTime();
        $this->category_id = $category_id;
    }

    public function getCategory(PDO $pdo): ?Category {
        $query = "SELECT * FROM category WHERE id = :category_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['category_id' => $this->category_id]);

        $categoryData = $stmt->fetch();
        if ($categoryData) {
            return new Category(
                $categoryData['id'],
                $categoryData['name'],
                $categoryData['description'],
                new DateTime($categoryData['created_at']),
                new DateTime($categoryData['updated_at'])
            );
        } else {
            return null;
        }
    }

    public static function findOneById(PDO $pdo, int $id): ?Product {
        $query = "SELECT * FROM product WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        $productData = $stmt->fetch();
        if ($productData) {
            return new Product(
                $productData['id'],
                $productData['name'],
                json_decode($productData['photos'], true) ?: [],
                $productData['price'],
                $productData['description'],
                $productData['quantity'],
                new DateTime($productData['created_at']),
                new DateTime($productData['updated_at']),
                $productData['category_id']
            );
        } else {
            return null;
        }
    }

    public static function findAll(PDO $pdo): array {
        $query = "SELECT * FROM product";
        $stmt = $pdo->query($query);

        $products = [];
        while ($productData = $stmt->fetch()) {
            $products[] = new Product(
                $productData['id'],
                $productData['name'],
                json_decode($productData['photos'], true) ?: [],
                $productData['price'],
                $productData['description'],
                $productData['quantity'],
                new DateTime($productData['created_at']),
                new DateTime($productData['updated_at']),
                $productData['category_id']
            );
        }

        return $products;
    }

    public function create(PDO $pdo) {
        $query = "INSERT INTO product (name, photos, price, description, quantity, created_at, updated_at, category_id) VALUES (:name, :photos, :price, :description, :quantity, :created_at, :updated_at, :category_id)";
        $stmt = $pdo->prepare($query);

        $photosJson = json_encode($this->photos);
        $created_at = $this->createdAt->format('Y-m-d H:i:s');
        $updated_at = $this->updatedAt->format('Y-m-d H:i:s');

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':photos', $photosJson);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':category_id', $this->category_id);

        $success = $stmt->execute();

        if ($success) {
            $this->id = $pdo->lastInsertId();
            return $this;
        } else {
            return false;
        }
    }

    

    

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPhotos(): array {
        return $this->photos;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime {
        return $this->updatedAt;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setPhotos(array $photos): void {
        $this->photos = $photos;
    }

    public function setPrice(int $price): void {
        $this->price = $price;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function setCreatedAt(DateTime $createdAt): void {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void {
        $this->updatedAt = $updatedAt;
    }

    public function setCategoryId(int $category_id): void {
        $this->category_id = $category_id;
    }
}
