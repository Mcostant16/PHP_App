<?php
class Product {
   private $description;
   private $price;
   private $quantity;

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

   public function buyProduct($val) {
      $this->quantity -= $val;
   }
}

$prod1 = new Product();
$prod1->setDescription("Carrot");
$prod1->setPrice(1.50);
$prod1->setQuantity(10);

echo "Just added product:<br>\n";
$prod1->printProduct();

echo "<br>Buying 4 carrots.\n";
$prod1->buyProduct(4);
echo "Quantity is now: " . $prod1->getQuantity() . "<br>\n";

?>