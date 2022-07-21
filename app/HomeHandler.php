<?php

namespace App;


class HomeHandler implements IHandler
{
    public function loadLayout()
    {
        return CryptoApiHelper::getCryptoData();
       //return TwigHelper::generatePage(
        //   "app/home.html",
        //   ['numbers' => range(0,10)]);
    }
}