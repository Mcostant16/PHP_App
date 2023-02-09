<?php


    $con = mysqli_connect("localhost", "test", "test") or die('Could not connect to server');


    mysqli_select_db( $con, "recipe") or die('Could not connect to database');


    $search = $_GET['searchFor'];


    $words = explode(" ", $search);


    $phrase = implode("%' AND title LIKE '%", $words);


    $query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase%'";


    $result = mysqli_query($con,$query) or die('Sorry, we could not post your recipe to the database at this time');


    echo "<h1>Search Results</h1><br><br>\n";


    if (mysqli_num_rows($result) == 0)


    {


        echo "<h2>Sorry, no recipes were found with '$search' in them.</h2>";


    } else


    {


        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))


        {


            $recipeid = $row['recipeid'];


            $title = $row['title'];


            $shortdesc = $row['shortdesc'];


            echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";


            echo "$shortdesc<br><br>\n";


        }


    }


?>


