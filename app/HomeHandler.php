<?php

namespace App;

use stdClass;

class HomeHandler implements IHandler
{
    public function loadLayout(): string
    {

        return TwigHelper::generatePage(
            "app/home.html",
            $this->convertCoinData(CryptoApiHelper::getCryptoData())
        );
    }

    /**
     * @param stdClass $rawCoinData
     * @return array
     */
    private function convertCoinData(stdClass $rawCoinData): array
    {
        $coinDataList = $rawCoinData->data;
        $convertedCoinData = ["coins" => []];
        foreach ($coinDataList as $coin){
            $convertedCoinData["coins"][] = [
                "name" => $coin->name,
                "symbol" => $coin->symbol,
                "total_supply" => $coin->total_supply
            ];
        }
        return $convertedCoinData;
    }
}