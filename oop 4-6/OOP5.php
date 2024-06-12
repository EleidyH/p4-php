<?php

class Product
{
    public $name;

    public $price;

    public function __construct($name, $price)
    {
        $this->name = ucfirst($name);
        $this->price = $price; 
    }



    public function formatPrice()
    {
        return number_format($this->price, decimals:2);
    }
}


$fruit1 = new Product( name:"Appel", price:2.50);


$fruit2 = new Product(name:"Kiwi", price:2);


$fruit3 = new Product(name:"Aardbei", price:2.50);



$fruit4 = new Product(name:"Watermeloen", price:1.50);



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