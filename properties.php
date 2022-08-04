<?php
//load .env file
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $objectType = "contacts";
        $url = "https://api.hubapi.com/crm/v3/properties/${objectType}";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec ($curl);
        // print_r($result);
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
            //  print_r($decs);
             foreach($decs as $dec):
                {
            //print_r($dec);
                 foreach($dec as $next):
                    {
                
                        print_r("Name :" .$next['name']."<br/>");
                        print_r("Label :" .$next['label']."<br/>");
                        print_r("Type :" .$next['type']."<br/>");
                        print_r("FielType :" .$next['fieldType']."<br/>");
                  
            //          print_r($next['id']."</br>");
            //          print_r($next['properties']['email']."</br>");
            //         //  print_r($next['properties']['is_tech']."</br>");
            //          print_r("Last name is :" .$next['properties']['firstname']."</br>");
            //          print_r("Last name is :" . $next['properties']['lastname']."</br>");
            //          print_r($next['createdAt']."</br>");
                     echo "<hr/>";
                    }
                endforeach;
                }
            endforeach;
        }