<?php
// connect to the database
session_start();
$db = mysqli_connect('localhost', 'root', 'root', 'booking-system');
// initialize variables
 $Customerid = 30;
	$Customername = "";
	$Street = "";
  $zipcode = "";
  $city = "";
  $meetingdate = "";
  $Createdat = "";
	$update = false;


	if (isset($_POST['save'])) {
		$Customername = $_POST['Customername'];
		$Street = $_POST['Street'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];


		mysqli_query($db, "INSERT INTO `customer`(`Customer-ID`, `Customername`, `Street`, `zipcode`, `city`) VALUES('$Customername', '$Street' , '$zipcode' ,'$city')");
		$_SESSION['message'] = "Customer Added";
		header('location: cusindex.php');
	}
  if (isset($_POST['update'])) {
    $Customerid= $_POST['Customer-ID'];
    $Customername = $_POST['Customername'];
    $Street = $_POST['Street'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];


    mysqli_query($db, "UPDATE info SET Customername='$Customername', Street='$Street' , zipcode='$zipcode' , city='$city'WHERE Customer-ID=$Customerid");
    header('location: cusindex.php');
  }
  if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM custtomer WHERE Customer-ID=$Customerid");
	$_SESSION['message'] = "Address deleted!";
	header('location: cusindex.php');
}
   ?>
