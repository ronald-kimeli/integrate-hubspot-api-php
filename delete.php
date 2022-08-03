<?php
//load .env file
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$curl = curl_init();
$token = $_ENV['API_KEY'];
$request = 151;

    $url = "https://api.hubapi.com/crm/v3/objects/contacts/{$request}";
    curl_setopt ($curl,CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
        "content-type: application/json"]);
    curl_setopt ($curl,CURLOPT_POSTFIELDS, $request);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec ($curl);
    $error = curl_error($curl);
    if($error){
        echo $e;
    }
    else{
        print_r($result);
        echo "Deleted Successfully";
    }
    curl_close($curl);

// else{
//     $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//     // Check the HTTP Status code
//     switch ($httpCode) {
//         case 404:
//             $error_status = "404: API Not found";
//             break;
//         }
// }
