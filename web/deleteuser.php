<?php
//including the database connection file
include_once("forms/config.php");


//getting id of the data from url
$delid = $_GET['delid'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM user WHERE userid=$delid");

//redirecting to the display page (index.php in our case)
header("Location:userprofile.php");
?>