<?php


$title = addslashes($_POST['title']);
$poster = addslashes($_POST['poster']);
$shortdesc = addslashes($_POST['shortdesc']);
$ingredients = addslashes(htmlspecialchars($_POST['ingredients']));
$directions = addslashes(htmlspecialchars($_POST['directions']));


if (trim($poster) == "")


{


    echo "<h2>Sorry, each recipe must have a poster</h2>\n";


}else


{


    $con = mysqli_connect("localhost", "test", "test") or die('Could not connect to server');


    mysqli_select_db( $con, "recipe") or die('Could not connect to database');


    $query = "INSERT INTO recipes (title, shortdesc, poster, ingredients, directions) " .


          " VALUES ('$title', '$shortdesc', '$poster', '$ingredients', '$directions')";


    $result = mysqli_query($con,$query) or die('Sorry, we could not post your recipe to the database at this time');


    if ($result)


       echo "<h2>Recipe posted</h2>\n";


    else


       echo "<h2>Sorry, there was a problem posting your recipe</h2>\n";


}


?>

