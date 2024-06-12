<?php

class Product
{
    public $name;

    public $price;

    public $currency;

    public function __construct($price, $name = "Een Fruit", $currency = "&euro")
    {
        $this->name = ucfirst($name);
        $this->price = $price; 
        $this->currency = $currency;
        
    }



    public function formatPrice()
    {
        return number_format($this->price, decimals:2);
    }
}


$fruit1 = new Product(price:2.50, currency:"$");


//$fruit2 = new Product(name:"Kiwi", price:2);



//echo $fruit1->formatPrice(). "<br>";
echo $fruit1->name. "<br>";
echo $fruit1->currency;
echo $fruit1->price. "<br>";

//echo $fruit2->formatPrice(). "<br>";
//echo $fruit2->name. "<br>";
//echo $fruit2->price. "<br>";


var_dump($fruit1);
echo "<br><br>";
//var_dump($fruit2);
echo "<br><br>";

?>