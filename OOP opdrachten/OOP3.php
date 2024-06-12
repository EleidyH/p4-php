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

$drank1 = new Product();
$drank1->name = "Fanta";
$drank1->price = 2;

$drank2 = new Product();
$drank2->name = "Coca-Cola";
$drank2->price = 2.50;


$drank3 = new Product();
$drank3->name = "Sprite";
$drank3->price = 3.50;


$drank4 = new Product();
$drank4->name = "Dr Pepper";
$drank4->price = 2;


echo $drank1->formatPrice(). "<br>";
echo $drank1->name. "<br>";
echo $drank1->price. "<br>";

echo $drank2->formatPrice(). "<br>";
echo $drank2->name. "<br>";
echo $drank2->price. "<br>";

echo $drank3->formatPrice(). "<br>";
echo $drank3->name. "<br>";
echo $drank3->price. "<br>";

echo $drank4->formatPrice(). "<br>";
echo $drank4->name. "<br>";
echo $drank4->price. "<br>";


var_dump($drank1);
echo "<br><br>";
var_dump($drank2);
echo "<br><br>";
var_dump($drank3);
echo "<br><br>";
var_dump($drank4);
echo "<br><br>";



?>