<?php

declare(Strict_types=1);

$globalFee = 100;

// Static scope example.

function TrackRequestCount() : int {
    static $requestCount = 0;
    $requestCount++;
    return $requestCount;

}

// 2. Closure Lexical Scope

$tax = 1.15;
        
$calculateTax = function(float $amount) use ($tax) : float {
    return $amount * $tax;
};

function BadFeeCalculator(float $price) : float {
    global $globalFee; // Accessing global variable
    return $price + $globalFee; // In Production code breaks testability & encapsulation
}