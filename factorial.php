<?php
function factorial($value1)
{
$fact = 1;
$count = 1;
while($count <= $value1)
{
$fact = $fact * $count;
$count = $count + 1;
}
return $fact;
}
?>