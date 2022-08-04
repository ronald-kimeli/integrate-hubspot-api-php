<?php
//load .env file
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $mail_contact = "ronaldkimeli@hk.com";
        $url = "https://api.hubapi.com/crm/v3/objects/contacts/${mail_contact}?idProperty=email&properties=email";
        $request = '{
                "properties": {
                        "email": "hillary@hk.com",
                        "favorite_contact":"Rodgers",
                        "is_tech": "Yes"
                       }
                    }';
        curl_setopt ($curl,CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'PATCH');
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
            echo "<pre>";
            print_r($result);
        }