<?php 

declare(strict_types=1);
// __contruct

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



  // __destruct // 

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


    // __get() //

// class User 
// {
//     private array $data = [
//         'name' => 'Ali',
//         'age' => 25
//     ];


//     public function __get(string $key): mixed 
//     {
//         return $this->data[$key] ?? "Key '$key' does not exist!";
//     }
// }                                     

// $user = new User();

// //  'name', class ki property nahi hai lekin __get isko $data array se read karsakta hai

// echo $user->name . "\n";
// echo $user->city . "\n";

  // __set() //

// class User {

// private array $data = [];

// public function __set(string $key, mixed $value): void 
//     {
//         if ($key === 'age' && $value < 18) {
//             echo "❌ Error: Age must be 18 or above!\n";
//             return;
//         }
//     echo "✅ Storing '$key' = '$value'\n";
//         $this->data[$key] = $value;
// }

// public function getData(): array 
//     {
//         return $this->data;
//     }
// }

// $user = new User();

// $user->role = 'Admin';
// $user->age = 15;
// $user->age = 25;

// echo "\nFinal Stored Data:\n";
// print_r($user->getData());


  // __call() for the functions and methods //  

// class UserDatabase 
// {
//     private array $users = [
//         ['id' => 1, 'name' => 'Ali', 'city' => 'Lahore'],
//         ['id' => 2, 'name' => 'Sara', 'city' => 'Karachi']
//     ];

//     public function __call(string $methodName, array $arguments): mixed
//     {
//         if (str_starts_with($methodName, 'findBy')) {

//             $field = strtolower(substr($methodName, 6)); 
//             $searchValue = $arguments[0] ?? null;

//             echo "Searching field '$field' for value '$searchValue'...\n";

//             foreach ($this->users as $user) {
//                 if (isset($user[$field]) && $user[$field] === $searchValue) {
//                     return $user;
//                 }
//             }

//             return "User not found!";
//         }

//         return "Method '$methodName()' does not exist on this class!";
//     }

// }

// $db = new UserDatabase();

// $user1 = $db->findByCity('Lahore');
// print_r($user1);

// $user2 = $db->findByName('Sara');
// print_r($user2);

// echo $db->sendEmailNotification("Test");

  // __toString() //

class UserProfile

{
    public function __construct(
        public string $username,
        public string $role,
        public bool $isActive = true
    ) {}

    public function __toString(): string
    {
        return json_encode([
            'username' => $this->username,
            'role'     => $this->role,
            'status'   => $this->isActive ? 'Active' : 'Inactive'
        ]);
    }
    // cannot give object as string php will throw fatal error.
    // public function getFormattedName(): string 
    // {
    //     return "User: " . $this->username;
    // }
}

$user = new UserProfile("ali_developer", "Backend Engineer");

echo "1. Direct Object Echo:\n";
echo $user . "\n\n";

echo "2. Concatenated String:\n";
$logMessage = "Current Logged User: " . $user;
echo $logMessage . "\n";