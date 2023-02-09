<?php
class Product {
   private $description;
   private $price;
   private $quantity;

   public function __construct($name, $value, $amount) {
      $this->description = $name;
      if ($value > 0)
         $this->price = $value;
      else
         $this->price = 0;
      $this->quantity = $amount;
   }

   public function setDescription($value) {
      $this->description = $value;
   }
   public function getDescription() {
      return $this->description;
   }

   public function setPrice($value) {
      if ($value > 0)
         $this->price = $value;
      else
         $this->price = 0;
   }
   public function getPrice() {
      return $this->price;
   }

   public function setQuantity($amount) {
      $this->quantity = $amount;
   }
   public function getQuantity() {
      return $this->quantity;
   }

   public function printProduct() {
      echo "Product: $this->description<br>\n";
      printf("Price: $%.2f<br>\n", $this->price);
      echo "Quantity: $this->quantity<br>\n";
   }

   public function buyProduct($amount) {
      $this->quantity -= $amount;
   }

   public function addProduct($amount) {
      $this->quantity += $amount;
   }
}
?>