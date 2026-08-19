<?php

declare(strict_types=1);

class Listing {

   public function __construct(
    
    public string $title,
    public float $price,
    public bool $isFeatured = false
   ) {}

   public function applyDiscount(float $percentage) : void {
     $this->price -= $this->price * ($percentage / 100);
   }
   
   public function markAsSold() : void {
     $this->isFeatured = true;
   }

   

}

$carAd = new Listing(title: "Toyota Civic 2024", price: 8500000.0);

// 2. Call Methods
$carAd->applyDiscount(10.0); // 10% discount lagao
$carAd->markAsSold();        // Sold mark karo

// 3. Print Results
echo "Ad Title: " . $carAd->title . "\n";
echo "Discounted Price: PKR " . number_format($carAd->price) . "\n";
echo "Status: " . ($carAd->isFeatured ? "SOLD" : "AVAILABLE") . "\n";