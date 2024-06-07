<?php

class Product
{
    public $name;

    public $price;

    public function formatPrice()
    {
        return number_format($this->price, decimals:2);
    }
}

$game1 = new Product();
$game1->name = "Fifa 2023";
$game1->price = 40;

$game2 = new Product();
$game2->name = "Call of Duty";
$game2->price = 10;


$game3 = new Product();
$game3->name = "Minecraft";
$game3->price = 30;


$game4 = new Product();
$game4->name = "Valorant";
$game4->price = 60;


echo $game1->formatPrice(). "<br>";
echo $game1->name. "<br>";
echo $game1->price. "<br>";

echo $game2->formatPrice(). "<br>";
echo $game2->name. "<br>";
echo $game2->price. "<br>";

echo $game3->formatPrice(). "<br>";
echo $game3->name. "<br>";
echo $game3->price. "<br>";

echo $game4->formatPrice(). "<br>";
echo $game4->name. "<br>";
echo $game4->price. "<br>";


var_dump($game1);
echo "<br><br>";
var_dump($game2);
echo "<br><br>";
var_dump($game3);
echo "<br><br>";
var_dump($game4);
echo "<br><br>";



?>