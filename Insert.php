<?php 
	include "Connect-info.php";
	$con = mysqli_connect($Server,$User,$Pwd);
	$list = $_POST['numList'];
	$Version = $_POST['Version'];
	#计算list数组中的元素数量
	$list_con = count($list);
	for ($i=0; $i < $list_con; $i++) { 
		# 计算每个元素数组中的子元素数量
		$childen_con = count($list[$i]);
		for ($ii=0; $ii<$childen_con; $ii++){
			$element = $list[$i][$ii];
			  $sql = "Insert into `ecom`.`ecom_budgeting` (`FY`,`Platform`,`Data_type`,`Filter`,`Segment`,`Jul`,`Aug`,`Sep`,`Oct`,`Nov`,`Dec`,`Jan`,`Feb`,`Mar`,`Apr`,`May`,`Jun`,`Remark`,`Status`) values('$element[FY]','$element[Platform]','$element[Data_Type]','$element[Filter]','$element[Segment]','$element[Jul]','$element[Aug]','$element[Sep]','$element[Oct]','$element[Nov]','$element[Dec]','$element[Jan]','$element[Feb]','$element[Mar]','$element[Apr]','$element[May]','$element[Jun]','$element[Remark]','$Version')";
			$result = mysqli_query($con,$sql);
		}
	}
	mysqli_close($con);	
 ?>



