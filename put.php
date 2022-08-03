<?php
//load .env file
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$curl = curl_init();
$token = $_ENV['API_KEY'];
$id = 201;
$url = "https://api.hubapi.com/crm/v3/objects/contacts/$id";
$requestArray = ["id"=>201,"email"=>"rony@hk.com",  "firstname"=> "Rony",   "lastname"=> "Andrews"];

curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($requestArray));
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
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