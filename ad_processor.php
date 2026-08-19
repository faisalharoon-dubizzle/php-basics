<?php

declare(strict_types=1);

// Global Scope variable
$vatPercentage = 0.05;

$rawPrice = "1250.50";
$rawIsFeatured = "1";

// 1. Explicit Type Casting 
$price = (float) $rawPrice;          
$isFeatured = (bool) $rawIsFeatured; 

// 2. Closure Lexical Scope via 'use' 
$applyVat = function (float $amount) use ($vatPercentage): float {
    return $amount + ($amount * $vatPercentage);
};

function processAd(float $finalPrice, bool $isFeatured): void 
{
    // $adsCount ka state symbol table wipes se bach kar execution end hone tak persist karega
    static $adsCount = 0;
    $adsCount++;

    $badge = $isFeatured ? "[FEATURED]" : "[STANDARD]";
    
    echo "Processing Ad #{$adsCount} {$badge} | Total Amount (Inc. VAT): {$finalPrice}\n";
}

$totalPrice = $applyVat($price);

processAd($totalPrice, $isFeatured); 
processAd($totalPrice, $isFeatured);
processAd($totalPrice, $isFeatured); 
