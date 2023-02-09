<?php
include("Product.inc.php");
class ProductDatabase extends mysqli {

   public function clean_and_query($query) {
      if (get_magic_quotes_gpc())
         $query = stripslashes($query);
      $query = $this->real_escape_string($query);
      return $this->query($query);
   }

   public function getProduct($result) {
      if ($row = $result->fetch_assoc())
      {
         $prod = new Product($row['description'], $row['price'], $row['quantity']);
         return $prod;
      } else
      {
         return FALSE;
      }
   }
}
?>