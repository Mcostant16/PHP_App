<?php

   $search = $_GET['searchFor'];
  // if (get_magic_quotes_gpc())
   //{
     // $search = stripslashes($search);
  // }
  // $searchsql = mysqli_real_escape_string($db, $search);
   echo "<h2>Results of searching '$search'<br><br></h2>\n";
  // $query = "SELECT * from stock WHERE description REGEXP '$searchsql'";
   $query = "select * from symbols order by Symbol limit 5";
   //$result = mysqli_query($db, $query);
   $result = Get_Symbols($search);
   //echo var_dump($result);
   if (!$result)
   {
      echo "<h2>Sorry, unable to process search string.</h2>\n";
   } else
   {
      echo "<table width=\"100%\" border=\"0\">\n";
      foreach($result as $row) :
      
         $prodid = $row['Symbol'];
         $description = $row['Name'];
         $price = $row['Market Cap'];
         $quantity = $row['Volume'];
         echo "<tr><td>\n";
            echo "<font size=\"3\"><b><u>$prodid</u></b></font></a>\n";
         echo "</td><td>\n";
            if ($quantity == 0)
               echo "<font size=\"3\">$description</font>\n";
            else
            {
               echo "<a href=\"index.php?&content;=updatecart&id;=$prodid\">";
               echo "<font size=\"3\"><b><u>$description</u></b></font></a>\n";
            }
         echo "</td><td>\n";
            printf("$%.2f\n", $price);
         echo "</td><td>\n";
            if ($quantity == 0)
               echo "<font color=\"red\">Sorry, this item out of stock</font>\n";
            else if ($quantity < 5)
               echo "Hurry, only $quantity left in stock!\n";
            else
               echo " \n";
         echo "</td></tr>\n";
      endforeach;
      
      echo "</table>\n";
   }
?>