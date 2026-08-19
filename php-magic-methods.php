<?php 

declare(strict_types=1);

// class PaymentProcessor {

//       public function __construct(
//         public string $gatewayName,
//         public float  $transactionFee,
//         private string $apiKey 
//       ){
       
//        if ($this->transactionFee < 0) {
//            throw new InvalidArgumentException("Transaction fee cannot be negative.");
//        }

//        echo "PaymentProcessor for {$this->gatewayName} initialized with fee: {$this->transactionFee}%\n";
       
//       }

//       public function calculateTotalAmount(float $amount) : float {

//           return $amount + ($amount * $this->transactionFee/100);
    
//       }

//     }

// $stripe = new PaymentProcessor(
//     gatewayName: "Stripe",
//     transactionFee: 2.5,
//     apiKey: "sk_test_1234567890"
// );

// $total = $stripe->calculateTotalAmount(50.0);
// echo "Total amount to be cahrged including fee: {$total}\n";


// class AuditLogger

//  {

//     private $fileStream;

//     public function __construct(

//         public string $logFile
//     ){

//       $this->fileStream = fopen($this->logFile, 'a');
//       echo "1. [CONSTRUCT] Log file stream opened for writing: {$this->logFile}\n";
//     }

//     public function writeLog(string $event) : void {

//          if($this->fileStream) {
//             fwrite($this->fileStream, date('Y-m-d H:i:s') . " - {$event}\n");
//          } else {
//             throw new RuntimeException("File stream is not available.");
//          }
//     }

//     // object memory se remove hote hi autorun hoga

//     public function __destruct()
//     {
//         if (is_resource($this->fileStream)) {
//             fclose($this->fileStream);
//             echo "3. [DESTRUCT] File stream closed safely. Zero resource leaks!\n";
//         }
//     }


// }

// function executeLoggingProcess(): void
// {
//     $logger = new AuditLogger('system_audit.log');
//     $logger->writeLog("User #102 changed password");
//     echo "--- End of function scope ---\n";
// }

// executeLoggingProcess();

// echo "4. Script execution completely finished.\n";