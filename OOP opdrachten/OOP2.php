<?php

class Product
{
    public $name = "Een bepaald spel";
}

$game1 = new Product();
$game1->name = "Fifa 2023";

$game2 = new Product();
$game2->name = "Call of Duty";

$game3 = new Product();
$game3->name = "Minecraft";

$game4 = new Product();
$game4->name = "Valorant";


echo $game1->name. "<br><br>";
echo $game2->name. "<br><br>";
echo $game3->name. "<br><br>";
echo $game4->name. "<br><br>";

$game1->name = "Fifa 2022";
echo $game1->name. "<br><br>";

var_dump($game1);
echo "<br><br>";
var_dump($game2);
echo "<br><br>";
var_dump($game3);
echo "<br><br>";


?>