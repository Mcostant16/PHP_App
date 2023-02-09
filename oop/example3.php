<?php
include("Product.inc.php");

$prod1 = new Product("Carrots", 1.50, 10);
echo "Just added product:<br>\n";
$prod1->printProduct();

$prod2 = new Product("Onions", 2.00, 15);
echo "<br>Just added product:<br>\n";
$prod2->printProduct();

echo "<br>Buying 4 carrots.\n";
$prod1->buyProduct(4);
$quant = $prod1->getQuantity();
echo "Quantity is now: $quant<br>\n";

echo "Buying 3 onions.\n";
$prod2->buyProduct(3);
$quant = $prod2->getQuantity();
echo "Quantity is now: $quant<br>\n";

echo "Adding 10 more carrots.\n";
$prod1->addProduct(10);
$quant = $prod1->getQuantity();
echo "Quantity is now: $quant<br>\n";
?>