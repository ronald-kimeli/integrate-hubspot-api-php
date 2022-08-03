<?php
use Dotenv\Dotenv;
//load .env file
require_once (__DIR__ . "/vendor/autoload.php");
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load(); 

$curl = curl_init();
$token = $_ENV['API_KEY'];
$url = "https://api.hubapi.com/crm/v3/objects/contacts";
$request = '{"properties": {
                "email": "genuine@gmail.com",
                "firstname": "Genuine",
                "lastname": "Melodies"
               
              }
            }';
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt ($curl,CURLOPT_POST, true);
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
}
curl_close($curl);

