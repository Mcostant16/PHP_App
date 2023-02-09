<?php
class Product {
   public $description;
   public $price;
   public $quantity;
   public function printProduct() {
      echo "Product: $this->description<br>\n";
      printf("Price: $%.2f<br>\n", $this->price);
      echo "Quantity: $this->quantity<br>\n";
   }

   public function buyProduct($amount) {
      $this->quantity -= $amount;
   }

}

$prod1 = new Product();
$prod1->description = "Carrots";
$prod1->price = 1.50;
$prod1->quantity = 10;
echo "Just added product:<br>\n";
$prod1->printProduct();

echo "<br>Buying 4 carrots.\n";
$prod1->buyProduct(4);
echo "Quantity is now: $prod1->quantity<br>\n";
?>