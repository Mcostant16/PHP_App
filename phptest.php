<html>
<body>
<h2>This is the first PHP coding section</h2>
<?php
echo "This is <i>PHP code</i>\n";
?>
<h2>This is the second PHP coding section</h2>
<?php
echo "This is <b>more</b> PHP code\n";
?>



<?php
$name = "Ima Test";
$age = 100;
$salary = 575.25;
echo "<h2>Information for $name</h2>\n";
echo "Age: $age<br />\n";
echo "Salary: $$salary\n";
?>


<?php
$myarray = array("Rich", "Barbara", "Katie Jane", "Jessica");
echo "The first person is $myarray[0]<br />\n";
echo "The last person is $myarray[3]<br />\n";

$anotherarray = array("fruit" => "banana", "vegetable" => "carrot");
echo "My favorite fruit is {$anotherarray['fruit']}\n";
?>
</body>
</html>


<html>
<head>
<title>Calculate the circumference of a Circle</title>
</head>
<body>
<h1>The Circumference of a Circle</h1>
<br>
<?php
$diameter = rand(1,10);
$circumference = $diameter * 3.14159;
echo "<h2>The circumference of a circle with a diameter of $diameter is: $circumference</h2>";
?>
</body>
</html>

<html>
<body>
<h1>Random number test</h1>
<?php
$var = rand(0, 100);
if ($var > 50)
{   
echo "<h2>The value is big: $var</h2>\n";
} elseif ($var  > 25)
{    echo "<h2>The value is medium: $var</h2>\n";
} else
{    
     echo "<h2>The value is small: $var</h2>\n";
}
?>
</body>
</html>


<html>
<body>
<?php include("header.inc.php"); ?>
<br><br>
<h2>This is the body of the main page</h2>
</body>
</html>