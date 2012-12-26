<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    $host = "us-cdbr-azure-east-b.cloudapp.net";
    $user = "bcd2949c8baf7b";
    $pwd = "ee7246b9";
    $db = "wordaddABbVVe2ev";
  
$con = mysql_connect("mysql:host=$host;dbname=$db",$user,$pwd);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$sql = "CREATE TABLE score_card(name VARCHAR(30), score int)";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  } 
mysql_select_db("score_card", $con);
 $name = $_GET["name"];
 $score = $_GET["score"]; 
$sql="INSERT INTO score_card(name,score) VALUES($name,$score)";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);
   
 
?>