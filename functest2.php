<html>
<body>
<h2>This is a test of defining a function in a separate file</h2>
<?php
include("factorial.php");
echo "The first test. The factorial of 3 is " . factorial(3) . "<br>\n";
?>

<h2>Now, let's try to use it again</h2>

<?php
echo "The last factorial test. The factorial of 5 is " . factorial(5) . "<br>\n";
?>

<h2>This is the end of the test</h2>
</body>
</html>