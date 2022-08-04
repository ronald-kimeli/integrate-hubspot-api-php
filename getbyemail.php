<?php
//load .env file
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $mail_contact = "hillary@hk.com";
        $url = "https://api.hubapi.com/crm/v3/objects/contacts/${mail_contact}?idProperty=email&properties=email,is_tech,favorite_contact,firstname,lastname";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec ($curl);
        
        curl_close($curl);

        $decs =  json_decode($result,true);
        // print_r($decs);
        if($e = curl_error($curl)){
            echo $e;
        }
        else{
           // echo "<pre>";
           // print_r($result);
             $decs =  json_decode($result,true);
             echo "<pre>";
            // print_r($decs);

            print_r("Id :" .$decs['id']."</br>");
            print_r("Email :" .$decs['properties']['email']."</br>");
            print_r("Is tech :" .$decs['properties']['is_tech']."</br>");
            print_r("Favorite contact :" .$decs['properties']['favorite_contact']."</br>");
            print_r("Last name is :" .$decs['properties']['firstname']."</br>");
            print_r("Last name is :" . $decs['properties']['lastname']."</br>");
            print_r($decs['createdAt']."</br>");
            echo "<hr/>";
            //  foreach($decs as $dec):
            //     {
              //print_r($dec);
            //      foreach($dec as $next):
            //         {
            //          print_r($next['id']);
            //          print_r($next['properties']['email']."</br>");
            //          print_r("Is tech :" .$next['properties']['is_tech']."</br>");
            //          print_r("Favorite contact :" .$next['properties']['favorite_contact']."</br>");
            //          print_r("Last name is :" .$next['properties']['firstname']."</br>");
            //          print_r("Last name is :" . $next['properties']['lastname']."</br>");
            //          print_r($next['createdAt']."</br>");
            //          echo "<hr/>";
            //         }
            //     endforeach;
            //     }
            // endforeach;
        }