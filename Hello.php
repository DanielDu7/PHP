<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<script type="text/javascript">
		
	</script>
</head>
<body>

	<center>
	
		<?php 
			include "Connect-info.php";
			$Platform = $_POST['Choose'];
			$conn = mysqli_connect($Server,$User,$Pwd) or die("Can not connect to Database.".mysqli_error());
			
			//------------------------test--------------------------------------
			$sql = "Select distinct(`Data Type`) from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform'";
			$result = mysqli_query($conn,$sql);
			$arr = array();
			while ($row = mysqli_fetch_array($result)) 
			{
				array_push($arr, $row['Data Type']);	//将Data Type的数放进数组里面
			}
			for ($i=0; $i < count($arr); $i++) 			//逐一查询
			{ 
				$sql = "Select * from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform' and `Data Type` = '$arr[$i]'";
				$result = mysqli_query($conn,$sql);
				echo '<table id="$i" border="2">';
				echo '<b>'.$arr[$i].'</b>';
				echo '<tr><th>Platform</th><th>Data Type</th><th>Filter</th><th>Segment</th><th>Jul</th><th>Aug</th><th>Sep</th><th>Oct</th><th>Nov</th><th>Dec</th><th>Jan</th><th>Feb</th><th>Mar</th><th>Apr</th><th>May</th><th>Jun</th><th>Remark</th></tr>';
				while($row = mysqli_fetch_array($result))
				{	
					echo '<tr>';
					echo '<td>'.$row['Platform'].'</td>';
					echo '<td>'.$row['Data Type'].'</td>';
					echo '<td>'.$row['Filter'].'</td>';
					echo '<td>'.$row['Segment'].'</td>';
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
					echo '<td contenteditable="true">'.$row['Remark'].'</td>';
					echo '</tr>';
				}	
				echo '</table>';
				echo '</br>';
			}

			mysqli_close($conn);

		 ?>

 	</center>

</body>
</html>

