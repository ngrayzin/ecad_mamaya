<?php
// Detect session
session_start();  
// Include the Page Layout header
include("header.php"); 

// Reading inputs entered in previous page
$email = $_POST["email"];
$pwd = $_POST["password"];

// include the php file that establishes database connection handle: $conn
include_once("mysql_conn.php");

// To Do 1 (Practical 2): Validate login credentials with database

$qry = "SELECT * from Shopper WHERE Email='$email' and Password='$pwd'";
$results = $conn->query($qry);

if ($results->num_rows > 0) {
    $row = $results->fetch_assoc();
    // Save user's info in session variables
    $_SESSION["ShopperName"] = $row["Name"];
    $_SESSION["ShopperID"] = $row["ShopperID"];

	// To Do 2 (Practical 4): Get active shopping cart
	
	// Redirect to home page
	header("Location: index.php");
   
	exit;
}
else {
	echo  "<h3 style='color:red'>Invalid Login Credentials</h3>";
}

//close db connection
$conn->close();

// Include the Page Layout footer
include("footer.php");
?>