<?php
function factorial($value1)
{
$factorial = 1;
$count = 1;
while($count <= $value1)
{
$factorial = $factorial * $count;
$count = $count + 1;
}
return $factorial;
}

echo "The factorial of 10 is " . factorial(10) . "<br>\n";
echo "The factorial of 5 is " . factorial(5) . "<br>\n";
?>