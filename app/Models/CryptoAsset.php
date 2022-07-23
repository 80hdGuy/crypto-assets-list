<?php

namespace App\Models;

class CryptoAsset
{
    private string $name;
    private string $symbol;
    private string $priceInUSD;

    public function __construct(string $name, string $symbol, float $priceInUSD)
    {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->priceInUSD = "$ " . number_format($priceInUSD,2);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPriceInUSD(): string
    {
        return $this->priceInUSD;
    }

}