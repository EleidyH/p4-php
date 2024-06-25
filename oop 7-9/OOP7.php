<?php

class Product
{
    public $name;

    public $price;

    public $currency;

    public function __construct($price, $name = "Muziek", $currency = "&euro")
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


$muziek1 = new Product( name:"Europapa" , price:2.50, currency:"$");


//$muziek2 = new Product(name:"Grenade", price:2);



//echo $muziek1->formatPrice(). "<br>";
echo $muziek1->name. "<br>";
echo $muziek1->currency;
echo $muziek1->price. "<br>";

//echo $muziek2->formatPrice(). "<br>";
//echo $muziek2->name. "<br>";
//echo $muziek2->price. "<br>";


var_dump($muziek1);
echo "<br><br>";
//var_dump($muziek2);
echo "<br><br>";

?>