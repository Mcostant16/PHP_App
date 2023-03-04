
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../store/mystyle.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="stocks.css" />
<title>Stock Information</title>
</head>

<?php
   include("../store/mylibrary/login.php");
   include("../store/mylibrary/showproducts.php");
   // Connect to database 
   include("database.php"); 
   //include 'db_stock_info.php'; 

   $con = mysqli_connect("localhost", "test", "test", "stock") or die('Could not connect to server');
?>

<body>
<table width="100%" border="0">
  <tr>
    <td id="header" height="90" colspan="3">
<?php include("header.inc.php"); ?></td>
  </tr>
  <tr>
    <td id="nav" width="20%" valign="top">
<?php include("../store/nav.inc.php"); ?></td>
    <td id="main" width="50%" valign="top">
  <?php
             if (!isset($_REQUEST['content']))
                include("main.inc.php");
             else
             {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".inc.php";
                include($nextpage);
             }
           ?></td>
    <td id="status" width="30%" valign="top">
  <?php include("../store/cart.inc.php"); ?></td>
  </tr>
  
  <tr>
    <td id="footer" colspan="3">
  <div align="center">
  <?php include("../store/footer.inc.php"); ?>
  </div></td>
  </tr>
</table>
</body>
</html>