<?php

class Product
{
    public $name;

    public $price;

    public function setName($name)
    {
        $this->name = ucfirst($name);
    }

    
    public function formatPrice()
    {
        return number_format($this->price, decimals:2);
    }
}


$fruit1 = new Product();
$fruit1->setName("Appel");
$fruit1->price = 2;

$fruit2 = new Product();
$fruit2->setName("KIWI");
$fruit2->price = 2.50;


$fruit3 = new Product();
$fruit3->name = "Aardbei";
$fruit3->price = 3.50;


$fruit4 = new Product();
$fruit4->name = "Watermeloen";
$fruit4->price = 2;


echo $fruit1->formatPrice(). "<br>";
echo $fruit1->name. "<br>";
echo $fruit1->price. "<br>";

echo $fruit2->formatPrice(). "<br>";
echo $fruit2->name. "<br>";
echo $fruit2->price. "<br>";

echo $fruit3->formatPrice(). "<br>";
echo $fruit3->name. "<br>";
echo $fruit3->price. "<br>";

echo $fruit4->formatPrice(). "<br>";
echo $fruit4->name. "<br>";
echo $fruit4->price. "<br>";


var_dump($fruit1);
echo "<br><br>";
var_dump($fruit2);
echo "<br><br>";
var_dump($fruit3);
echo "<br><br>";
var_dump($fruit4);
echo "<br><br>";



?>