<?php 
	$Platform = $_POST['Choose'];
	$Version = $_POST['Version_choose'];
	include "Connect-info.php";
	$conn = mysqli_connect($Server,$User,$Pwd);
	$sql = "Select distinct(`Data_Type`) from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform' and `Status` = '$Version'";
	$result = mysqli_query($conn,$sql);
	$arr = array();
	$arr_type = array();
	$data=[];
	$data1=[];
	$arr1 = array();
	while ($row = mysqli_fetch_array($result)) 
	{

		array_push($arr, $row['Data_Type']);	//将Data Type的数放进数组里面
	}

	for ($i=0; $i < count($arr); $i++) 			//逐一查询
	{ 

		$sql = "Select * from `ecom`.`Ecom_Budgeting` where `Platform` = '$Platform' and `Data_Type` = '$arr[$i]' and `Status` = '$Version'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$n=0;
		while($n<mysqli_num_rows($result)){
		    array_push($arr_type, $row[$n]);
   			$n++;
		}
		$data1['tableData'] = $arr_type;
		$data1['Type'] = $arr[$i];
		array_push($arr1, $data1);
		$arr_type = array();
	}


	$data['Data'] = $arr1;
	$data['Type'] = $arr; 
	echo json_encode($data);
	file_put_contents('test.json', json_encode($data));	
	mysqli_close($conn);
 ?>
 
