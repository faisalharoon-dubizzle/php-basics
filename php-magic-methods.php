<?php 

declare(strict_types=1);

class PaymentProcessor {

      public function __construct(
        public string $gatewayName,
        public float  $transactionFee,
        private string $apiKey 
      ){
       
       if ($this->transactionFee < 0) {
           throw new InvalidArgumentException("Transaction fee cannot be negative.");
       }

       echo "PaymentProcessor for {$this->gatewayName} initialized with fee: {$this->transactionFee}%\n";
       
      }

      public function calculateTotalAmount(float $amount) : float {

          return $amount + ($amount * $this->transactionFee/100);
    
      }

    }

$stripe = new PaymentProcessor(
    gatewayName: "Stripe",
    transactionFee: 2.5,
    apiKey: "sk_test_1234567890"
);

$total = $stripe->calculateTotalAmount(50.0);
echo "Total amount to be cahrged including fee: {$total}\n";