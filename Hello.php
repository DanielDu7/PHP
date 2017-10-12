<center>
<?php 

	include "Connect-info.php";
	$Platform = $_GET['Selection'];
	$conn = mysqli_connect($Server,$User,$Pwd) or die("Can not connect to Database.".mysqli_error());
	$sql = "Select * from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform'";
	$result = mysqli_query($conn,$sql);
	echo '<table id="tab1" border="2">';

	echo '<tr><th>Platform</th><th>Data Type</th><th>Filter</th><th>Segment</th><th>Jul</th><th>Aug</th><th>Sep</th><th>Oct</th><th>Nov</th><th>Dec</th><th>Jan</th><th>Feb</th><th>Mar</th><th>Apr</th><th>May</th><th>Jun</th></tr>';
	while($row = mysqli_fetch_array($result))
	{
		echo '<tr>';
		echo '<td contenteditable="true">'.$row['Platform'].'</td>';
		echo '<td contenteditable="true">'.$row['Data Type'].'</td>';
		echo '<td contenteditable="true">'.$row['Filter'].'</td>';
		echo '<td contenteditable="true">'.$row['Segment'].'</td>';
		echo '<td contenteditable="true">'.$row['Jul'].'</td>';
		echo '<td contenteditable="true">'.$row['Aug'].'</td>';
		echo '<td contenteditable="true">'.$row['Sep'].'</td>';
		echo '<td contenteditable="true">'.$row['Oct'].'</td>';
		echo '<td contenteditable="true">'.$row['Nov'].'</td>';
		echo '<td contenteditable="true">'.$row['Dec'].'</td>';
		echo '<td contenteditable="true">'.$row['Jan'].'</td>';
		echo '<td contenteditable="true">'.$row['Feb'].'</td>';
		echo '<td contenteditable="true">'.$row['Mar'].'</td>';
		echo '<td contenteditable="true">'.$row['Apr'].'</td>';
		echo '<td contenteditable="true">'.$row['May'].'</td>';
		echo '<td contenteditable="true">'.$row['Jun'].'</td>';
		echo '</tr>';
	}	

	echo '</table>';
	mysqli_close($conn);
 ?>
 </center>

