
<?php 

	$Platform = $_POST['Choose'];
	$Version = $_POST['Version_choose'];
	$conn = mysqli_connect("120.25.98.123","ecom","ecom123");

	$sql = "Select distinct(`Data Type`) from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform' and `Status` = '$Version'";
	$result = mysqli_query($conn,$sql);
	$arr = array();
	while ($row = mysqli_fetch_array($result)) 
	{
		array_push($arr, $row['Data Type']);	//将Data Type的数放进数组里面
	}	

	for ($i=0; $i < count($arr); $i++) 			//逐一查询
	{ 
		$sql = "Select * from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform' and `Data Type` = '$arr[$i]' and `Status` = '$Version'";
		$result = mysqli_query($conn,$sql);			
		$j = 0;	
		echo '<form action="select.php" method="post">';
		echo '<table id="table_'.$i.'" border="2">';
		echo '<b>'.$arr[$i].'</b>';
		echo '<tr><th hidden>Id</th><th>FY</th><th>Platform</th><th>Data Type</th><th>Filter</th><th>Segment</th><th>Jul</th><th>Aug</th><th>Sep</th><th>Oct</th><th>Nov</th><th>Dec</th><th>Jan</th><th>Feb</th><th>Mar</th><th>Apr</th><th>May</th><th>Jun</th><th>Remark</th></tr>';

		while($row = mysqli_fetch_array($result))
		{	
			echo '<tr id='.$i.'a'.$j.'>';
			echo '<td hidden>'.$row['Id'].' id='.$i.$j.'0'.'></td>';
			echo '<td><input type="Text" style="width:50px;" disabled="disabled" value="'.$row['FY'].'"></td>';
			echo '<td><input type="Text" style="width:70px;" disabled="disabled" value="'.$row['Platform'].'"></td>';
			echo '<td><input type="Text" style="width:120px;" disabled="disabled" value="'.$row['Data Type'].'"></td>';
			echo '<td><input type="Text" style="width:97.5%;" disabled="disabled" value="'.$row['Filter'].'"></td>';
			echo '<td><input type="Text" style="width:97.5%;" disabled="disabled" value="'.$row['Segment'].'"></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Jul'].' id='.$i.$j.'1'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Aug'].' id='.$i.$j.'2'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Sep'].' id='.$i.$j.'3'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Oct'].' id='.$i.$j.'4'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Nov'].' id='.$i.$j.'5'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Dec'].' id='.$i.$j.'6'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Jan'].' id='.$i.$j.'7'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Feb'].' id='.$i.$j.'8'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Mar'].' id='.$i.$j.'9'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Apr'].' id='.$i.$j.'10'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['May'].' id='.$i.$j.'11'.'></td>';
			echo '<td><input type="Text" style="width:40px;" value='.$row['Jun'].' id='.$i.$j.'12'.'></td>';
			echo '<td><input type="Text" style="width:150px;" value='.$row['Remark'].'></td>';
			$j = $j + 1;
		}	
	}	
	echo '</table>';
	echo '</form>';
	echo '</br>';
	mysqli_close($conn);
?>




