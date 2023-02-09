<?php
include("Product.inc.php");
class Soda extends Product {
   private $ounces;

   public function __construct($name, $value, $amount, $size) {
      parent::setDescription($name);
      parent::setPrice($value);
      parent::setQuantity($amount);
      $this->ounces = $size;
   }

   public function printProduct() {
      parent::printProduct();
      printf("Size: %.2f ounces<br>\n", $this->ounces);
   }
}

$prod1 = new Soda("Root Beer", 1.25, 10, 18);

echo "new product added:<br>\n";
$prod1->printProduct();

echo "<br>Buying 5 bottles.\n";
$prod1->buyProduct(5);
echo "now there's " . $prod1->getQuantity() . " left<br>\n";
$prod1->printProduct();
?>