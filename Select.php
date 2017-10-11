<?php 
	
	$a = $_GET['User'];
	$b = $_GET['Pwd'];
	$conn = mysqli_connect("120.25.98.123","Eric","Eric321") or die("Could not connect to database.");
	$sql = "Select * from `e_test`.`baidu_abi_login` where `Username` = '$a' and `Password` = '$b' ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	mysqli_close($conn);
	echo $row['Username']," ",$row['Password'];


	echo Eric;
	echo daniel;
 ?>


