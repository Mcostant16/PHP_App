<?php
echo "<h1 align=\"center\">This is a test header</h1>\n";
echo "<a href=http://localhost/phptest.php>Main</a>\n";
$y = 1;

for ( $x = 1 ; $x<7 ;$x++) {
      echo "The number for x is $x<br>";
	  $y=$y*$x;
	  echo "The number for y is $y<br>";
}

?>



