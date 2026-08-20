<?php
// A. Singleton Pattern

declare(strict_types=1);

// class Database

// {
//     private static ?Database $instance = null;

//     // Private constructor: 'new Database()' ko class ke bahar block karta hai
//     private function __construct() {}

//     public static function getInstance(): Database
//     {
//         if (self::$instance === null) {
//             self::$instance = new Database();
//             echo "Databse instance created!";
//         }
//         return self::$instance;
//     }
// }

// // Both variables pinting to same location

// $db1 = Database::getInstance();
// $db2 = Database::getInstance();

// // Always True
// $referenceCheck = $db1 === $db2; 

// if ($referenceCheck) {
//     echo "True" ;
// }else{
//     echo "False";
// }


// Factory Pattern

// instead of writing direct new ClassName() , object creation duty is assigned to a dedicated "Factory" class.

interface GatewayInterface { public function pay(float $amount): void; }

class StripeGateway implements GatewayInterface {
    public function pay(float $amount): void { echo "Paid $amount via Stripe"; }
}

class PaypalGateway implements GatewayInterface {
    public function pay(float $amount): void { echo "Paid $amount via PayPal"; }
}

class PaymentFactory
{
    public static function create(string $type): GatewayInterface

    {
        return match($type) {
            'stripe' => new StripeGateway(),
            'paypal' => new PaypalGateway(),
            default  => throw new InvalidArgumentException("Invalid gateway"),
        };
    }

}

// Dynamic object on runtime.

$gateway = PaymentFactory::create('stripe');
$gateway->pay(500.0);