<?php

class Product
{
    public $name = "Een bepaald frisdrank";
}

$drank1 = new Product();
$drank1->name = "Fanta";

$drank2 = new Product();
$drank2->name = "Coca-Cola";

$drank3 = new Product();
$drank3->name = "Sprite";

$drank4 = new Product();
$drank4->name = "Dr Pepper";


echo $drank1->name. "<br><br>";
echo $drank2->name. "<br><br>";
echo $drank3->name. "<br><br>";
echo $drank4->name. "<br><br>";

$drank1->name = "Fria";
echo $drank1->name. "<br><br>";

var_dump($drank1);
echo "<br><br>";
var_dump($drank2);
echo "<br><br>";
var_dump($drank3);
echo "<br><br>";


?>