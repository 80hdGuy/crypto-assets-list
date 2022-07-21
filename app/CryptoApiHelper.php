<?php

namespace App;

class CryptoApiHelper
{

   static public function getCryptoData()
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '5',
            'sort' => 'name',

        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: 9bd8cece-0e26-4776-a22b-5519a8ba21a0'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource

        // Set cURL options
       curl_setopt_array($curl, array(
           CURLOPT_URL => $request,            // set the request URL
           CURLOPT_HTTPHEADER => $headers,     // set the headers
           CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
       ));

       $response = curl_exec($curl); // Send the request, save the response
        var_dump($curl);
       curl_close($curl); // Close request
        return json_decode($response);

        //return $response;
    }
}

