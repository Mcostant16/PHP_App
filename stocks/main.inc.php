<h2>Welcome to stock App!</h2>
<br>
<br>
<p>Select a Stock Ticker
<p>
<h2>Search Stock Info</h2>
<form class="example" action="index.php" method="get">
  <input type="text" placeholder="Search.." name="searchFor">
  <button type="submit"><i class="fa fa-search"></i></button>
  <input name="content" type="hidden" value="search" />
</form>

<p>Centered inside a form with max-width:</p>
<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

<?php
   //$stock_con = mysqli_connect("localhost", "test", "test", "stock") or die('Could not connect to server');
   $query = "SELECT * from symbols where Symbol = 'AAPL'";
   $result = mysqli_query($con, $query);
   var_dump($db);
   echo "<table width=\"100%\" border=\"0\">\n";
   while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
      $prodid = $row['Symbol'];
      $description = $row['Name'];
      $price = $row['Market Cap'];
      $quantity = $row['Volume'];
 
      echo "<tr><td>\n";
         echo "<img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\">";
      echo "</td><td>\n";
         echo "<font size=\"3\"><b><u>$prodid</u></b></font>\n";
      echo "</td><td>\n";
         if ($quantity == 0)
            echo "<font size=\"3\">$description</font>\n";
         else
         {
            echo "<a href=\"index.php?content=updatecart&id=$prodid\">";
            echo "<font size=\"3\"><b><u>$description</u></b></font>\n";
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
   }
   echo "</table>\n";
?>