<?php

namespace App\Controllers;

use App\Models\CryptoAsset;
use App\View;


class CryptoAssetController
{
    public function getAssets(): string
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'CMC_PRO_API_KEY' => '9bd8cece-0e26-4776-a22b-5519a8ba21a0',
            'start' => '1',
            'limit' => '25'
        ];

        $qs = http_build_query($parameters);
        $request = "{$url}?{$qs}";
        $rawAssets = json_decode(file_get_contents($request));


        $cryptoAssets = [];
        foreach ($rawAssets->data as $asset){
            $cryptoAssets[] = new CryptoAsset(
                $asset->name,
                $asset->symbol,
                $asset->quote->USD->price);
        }

        return new View("app/Views/home.twig",["assets" => $cryptoAssets]);

    }
}