<?php

class Electronic extends Product {
    private string $brand;
    private int $warranty_fee;

    public function __construct(
        int $id,
        string $name,
        array $photos,
        int $price,
        string $description,
        int $quantity,
        DateTime $createdAt,
        DateTime $updatedAt,
        int $category_id,
        string $brand,
        int $warranty_fee
    ) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $createdAt, $updatedAt, $category_id);
        $this->brand = $brand;
        $this->warranty_fee = $warranty_fee;
    }

    // Getters
    public function getBrand(): string {
        return $this->brand;
    }

    public function getWarrantyFee(): int {
        return $this->warranty_fee;
    }

    // Setters
    public function setBrand(string $brand): void {
        $this->brand = $brand;
    }

    public function setWarrantyFee(int $warranty_fee): void {
        $this->warranty_fee = $warranty_fee;
    }
}
?>
