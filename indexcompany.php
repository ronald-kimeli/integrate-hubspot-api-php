<?php
        use Dotenv\Dotenv;
            //load .env file
        require_once (__DIR__ . "/vendor/autoload.php");
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load(); 

        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $url = "https://api.hubapi.com/crm/v3/objects/companies";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec ($curl);

        curl_close($curl);

       $decs =  json_decode($result,true);

        if($e = curl_error($curl)){
            echo $e;
        }
        else{
            //print_r($result);
             $decs =  json_decode($result,true);
             //echo "<pre>";
             //print_r($decs);
             foreach($decs as $dec):
                {
                 //print_r($dec[0]['id']);
                  foreach($dec as $next):
                    {
                      print_r("Id :" .$next['id']."</br>");
                      print_r("Name :" .$next['properties']['name']."</br>");
                      print_r("Domain :" .$next['properties']['domain']."</br>");
                      print_r("CreatedAt :" .$next['createdAt']."</br>");
                      print_r("UpdatedAt :" .$next['updatedAt']."</br>");
                      echo "<hr/>";
                    }
                endforeach;
                }
            endforeach;
        }