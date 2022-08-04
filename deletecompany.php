<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::classcreateImmutable(__DIR__);
$dotenv->load();

$curl = curl_init();
$token = $_ENV['API_KEY'];
$id = 5968895978;
$url = "https://api.hubapi.com/crm/v3/objects/companies/$id";

    curl_setopt ($curl,CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
        "content-type: application/json"]);
    curl_setopt ($curl,CURLOPT_POSTFIELDS, $id);
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

