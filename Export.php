<?php
	$filename = date("YmjHis");
	header("Content-type:application/vnd.ms-excel");
	header("Content-Disposition:filename=".$filename.".xls");  
	// header("Content-type:application/octet-stream");
	//header("Content-Disposition:attachment;filename=".$filename.".csv");
    $con = mysqli_connect("120.25.98.123","ecom","ecom123");
    $arr = array();
    $arr_type = array();
    $result = mysqli_query($con,"Select Distinct(`Data_Type`) From `ecom`.`ecom_budgeting_jisuan`");
	while ($row = mysqli_fetch_array($result)){
		array_push($arr, $row['Data_Type']);
	}
    for ($i=0; $i < count($arr); $i++) { 
    	$sql = "Select `ecom`.`ecom_historical`.`FY`,`ecom`.`ecom_historical`.`Platform`,`ecom`.`ecom_historical`.`Data_Type`,'Est. CTR' AS `Filter`,`ecom`.`ecom_historical`.`Segment`,
				Round(`ecom`.`ecom_historical`.`Jul` * `ecom`.`ecom_budgeting_jisuan`.`Jul`,5) as `Jul`,Round(`ecom`.`ecom_historical`.`Aug` * `ecom`.`ecom_budgeting_jisuan`.`Aug`,5) as `Aug`,
				Round(`ecom`.`ecom_historical`.`Sep` * `ecom`.`ecom_budgeting_jisuan`.`Sep`,5) as `Sep`,Round(`ecom`.`ecom_historical`.`Oct` * `ecom`.`ecom_budgeting_jisuan`.`Oct`,5) as `Oct`,
				Round(`ecom`.`ecom_historical`.`Nov` * `ecom`.`ecom_budgeting_jisuan`.`Nov`,5) as `Nov`,Round(`ecom`.`ecom_historical`.`Dec` * `ecom`.`ecom_budgeting_jisuan`.`Dec`,5) as `Dec`,
				Round(`ecom`.`ecom_historical`.`Jan` * `ecom`.`ecom_budgeting_jisuan`.`Jan`,5) as `Jan`,Round(`ecom`.`ecom_historical`.`Feb` * `ecom`.`ecom_budgeting_jisuan`.`Feb`,5) as `Feb`,
				Round(`ecom`.`ecom_historical`.`Mar` * `ecom`.`ecom_budgeting_jisuan`.`Mar`,5) as `Mar`,Round(`ecom`.`ecom_historical`.`Apr` * `ecom`.`ecom_budgeting_jisuan`.`Apr`,5) as `Apr`,
				Round(`ecom`.`ecom_historical`.`May` * `ecom`.`ecom_budgeting_jisuan`.`May`,5) as `May`,Round(`ecom`.`ecom_historical`.`Jun` * `ecom`.`ecom_budgeting_jisuan`.`Jun`,5) as `Jun`
				from `ecom`.`ecom_historical` INNER JOIN `ecom`.`ecom_budgeting_jisuan` on 
				`ecom`.`ecom_historical`.`Platform` = `ecom`.`ecom_budgeting_jisuan`.`Platform` and `ecom`.`ecom_historical`.`Data_Type` = `ecom`.`ecom_budgeting_jisuan`.`Data_Type` 
				and `ecom`.`ecom_historical`.`map` = `ecom`.`ecom_budgeting_jisuan`.`Filter`and `ecom`.`ecom_historical`.`Segment` = `ecom`.`ecom_budgeting_jisuan`.`Segment`
				where `ecom`.`ecom_historical`.`map` = 'CTR Adjustment' and `ecom`.`ecom_historical`.`Data_type` = '$arr[$i]'
			Union
			Select `ecom`.`ecom_historical`.`FY`,`ecom`.`ecom_historical`.`Platform`,`ecom`.`ecom_historical`.`Data_Type`,'Est. CPC' AS `Filter`,`ecom`.`ecom_historical`.`Segment`,
				Round(`ecom`.`ecom_historical`.`Jul` * `ecom`.`ecom_budgeting_jisuan`.`Jul`,5) as `Jul`,Round(`ecom`.`ecom_historical`.`Aug` * `ecom`.`ecom_budgeting_jisuan`.`Aug`,5) as `Aug`,
				Round(`ecom`.`ecom_historical`.`Sep` * `ecom`.`ecom_budgeting_jisuan`.`Sep`,5) as `Sep`,Round(`ecom`.`ecom_historical`.`Oct` * `ecom`.`ecom_budgeting_jisuan`.`Oct`,5) as `Oct`,
				Round(`ecom`.`ecom_historical`.`Nov` * `ecom`.`ecom_budgeting_jisuan`.`Nov`,5) as `Nov`,Round(`ecom`.`ecom_historical`.`Dec` * `ecom`.`ecom_budgeting_jisuan`.`Dec`,5) as `Dec`,
				Round(`ecom`.`ecom_historical`.`Jan` * `ecom`.`ecom_budgeting_jisuan`.`Jan`,5) as `Jan`,Round(`ecom`.`ecom_historical`.`Feb` * `ecom`.`ecom_budgeting_jisuan`.`Feb`,5) as `Feb`,
				Round(`ecom`.`ecom_historical`.`Mar` * `ecom`.`ecom_budgeting_jisuan`.`Mar`,5) as `Mar`,Round(`ecom`.`ecom_historical`.`Apr` * `ecom`.`ecom_budgeting_jisuan`.`Apr`,5) as `Apr`,
				Round(`ecom`.`ecom_historical`.`May` * `ecom`.`ecom_budgeting_jisuan`.`May`,5) as `May`,Round(`ecom`.`ecom_historical`.`Jun` * `ecom`.`ecom_budgeting_jisuan`.`Jun`,5) as `Jun`
				from `ecom`.`ecom_historical` INNER JOIN `ecom`.`ecom_budgeting_jisuan` on 
				`ecom`.`ecom_historical`.`Platform` = `ecom`.`ecom_budgeting_jisuan`.`Platform` and `ecom`.`ecom_historical`.`Data_Type` = `ecom`.`ecom_budgeting_jisuan`.`Data_Type` 
				and `ecom`.`ecom_historical`.`map` = `ecom`.`ecom_budgeting_jisuan`.`Filter`and `ecom`.`ecom_historical`.`Segment` = `ecom`.`ecom_budgeting_jisuan`.`Segment`
				where `ecom`.`ecom_historical`.`map` = 'CPC Adjustment' and `ecom`.`ecom_historical`.`Data_type` = '$arr[$i]'
			Union
			Select `ecom`.`ecom_historical`.`FY`,`ecom`.`ecom_historical`.`Platform`,`ecom`.`ecom_historical`.`Data_Type`,'Est. CVR' AS `Filter`,`ecom`.`ecom_historical`.`Segment`,
				Round(`ecom`.`ecom_historical`.`Jul` * `ecom`.`ecom_budgeting_jisuan`.`Jul`,5) as `Jul`,Round(`ecom`.`ecom_historical`.`Aug` * `ecom`.`ecom_budgeting_jisuan`.`Aug`,5) as `Aug`,
				Round(`ecom`.`ecom_historical`.`Sep` * `ecom`.`ecom_budgeting_jisuan`.`Sep`,5) as `Sep`,Round(`ecom`.`ecom_historical`.`Oct` * `ecom`.`ecom_budgeting_jisuan`.`Oct`,5) as `Oct`,
				Round(`ecom`.`ecom_historical`.`Nov` * `ecom`.`ecom_budgeting_jisuan`.`Nov`,5) as `Nov`,Round(`ecom`.`ecom_historical`.`Dec` * `ecom`.`ecom_budgeting_jisuan`.`Dec`,5) as `Dec`,
				Round(`ecom`.`ecom_historical`.`Jan` * `ecom`.`ecom_budgeting_jisuan`.`Jan`,5) as `Jan`,Round(`ecom`.`ecom_historical`.`Feb` * `ecom`.`ecom_budgeting_jisuan`.`Feb`,5) as `Feb`,
				Round(`ecom`.`ecom_historical`.`Mar` * `ecom`.`ecom_budgeting_jisuan`.`Mar`,5) as `Mar`,Round(`ecom`.`ecom_historical`.`Apr` * `ecom`.`ecom_budgeting_jisuan`.`Apr`,5) as `Apr`,
				Round(`ecom`.`ecom_historical`.`May` * `ecom`.`ecom_budgeting_jisuan`.`May`,5) as `May`,Round(`ecom`.`ecom_historical`.`Jun` * `ecom`.`ecom_budgeting_jisuan`.`Jun`,5) as `Jun`
				from `ecom`.`ecom_historical` INNER JOIN `ecom`.`ecom_budgeting_jisuan` on 
				`ecom`.`ecom_historical`.`Platform` = `ecom`.`ecom_budgeting_jisuan`.`Platform` and `ecom`.`ecom_historical`.`Data_Type` = `ecom`.`ecom_budgeting_jisuan`.`Data_Type` 
				and `ecom`.`ecom_historical`.`map` = `ecom`.`ecom_budgeting_jisuan`.`Filter`and `ecom`.`ecom_historical`.`Segment` = `ecom`.`ecom_budgeting_jisuan`.`Segment`
				where `ecom`.`ecom_historical`.`map` = 'CVR Adjustment' and `ecom`.`ecom_historical`.`Data_type` = '$arr[$i]'
			Union
			Select `ecom`.`ecom_historical`.`FY`,`ecom`.`ecom_historical`.`Platform`,`ecom`.`ecom_historical`.`Data_Type`,'Est. Basket Size' AS `Filter`,`ecom`.`ecom_historical`.`Segment`,
				Round(`ecom`.`ecom_historical`.`Jul` * `ecom`.`ecom_budgeting_jisuan`.`Jul`,5) as `Jul`,Round(`ecom`.`ecom_historical`.`Aug` * `ecom`.`ecom_budgeting_jisuan`.`Aug`,5) as `Aug`,
				Round(`ecom`.`ecom_historical`.`Sep` * `ecom`.`ecom_budgeting_jisuan`.`Sep`,5) as `Sep`,Round(`ecom`.`ecom_historical`.`Oct` * `ecom`.`ecom_budgeting_jisuan`.`Oct`,5) as `Oct`,
				Round(`ecom`.`ecom_historical`.`Nov` * `ecom`.`ecom_budgeting_jisuan`.`Nov`,5) as `Nov`,Round(`ecom`.`ecom_historical`.`Dec` * `ecom`.`ecom_budgeting_jisuan`.`Dec`,5) as `Dec`,
				Round(`ecom`.`ecom_historical`.`Jan` * `ecom`.`ecom_budgeting_jisuan`.`Jan`,5) as `Jan`,Round(`ecom`.`ecom_historical`.`Feb` * `ecom`.`ecom_budgeting_jisuan`.`Feb`,5) as `Feb`,
				Round(`ecom`.`ecom_historical`.`Mar` * `ecom`.`ecom_budgeting_jisuan`.`Mar`,5) as `Mar`,Round(`ecom`.`ecom_historical`.`Apr` * `ecom`.`ecom_budgeting_jisuan`.`Apr`,5) as `Apr`,
				Round(`ecom`.`ecom_historical`.`May` * `ecom`.`ecom_budgeting_jisuan`.`May`,5) as `May`,Round(`ecom`.`ecom_historical`.`Jun` * `ecom`.`ecom_budgeting_jisuan`.`Jun`,5) as `Jun`
				from `ecom`.`ecom_historical` INNER JOIN `ecom`.`ecom_budgeting_jisuan` on 
				`ecom`.`ecom_historical`.`Platform` = `ecom`.`ecom_budgeting_jisuan`.`Platform` and `ecom`.`ecom_historical`.`Data_Type` = `ecom`.`ecom_budgeting_jisuan`.`Data_Type` 
				and `ecom`.`ecom_historical`.`map` = `ecom`.`ecom_budgeting_jisuan`.`Filter`and `ecom`.`ecom_historical`.`Segment` = `ecom`.`ecom_budgeting_jisuan`.`Segment`
				where `ecom`.`ecom_historical`.`map` = 'Basket Size Adjustment' and `ecom`.`ecom_historical`.`Data_type` = '$arr[$i]'
			Union
			Select `ecom`.`ecom_historical`.`FY`,`ecom`.`ecom_historical`.`Platform`,`ecom`.`ecom_historical`.`Data_Type`,'Est. Commission Rate' AS `Filter`,`ecom`.`ecom_historical`.`Segment`,
				Round(`ecom`.`ecom_historical`.`Jul` * `ecom`.`ecom_budgeting_jisuan`.`Jul`,5) as `Jul`,Round(`ecom`.`ecom_historical`.`Aug` * `ecom`.`ecom_budgeting_jisuan`.`Aug`,5) as `Aug`,
				Round(`ecom`.`ecom_historical`.`Sep` * `ecom`.`ecom_budgeting_jisuan`.`Sep`,5) as `Sep`,Round(`ecom`.`ecom_historical`.`Oct` * `ecom`.`ecom_budgeting_jisuan`.`Oct`,5) as `Oct`,
				Round(`ecom`.`ecom_historical`.`Nov` * `ecom`.`ecom_budgeting_jisuan`.`Nov`,5) as `Nov`,Round(`ecom`.`ecom_historical`.`Dec` * `ecom`.`ecom_budgeting_jisuan`.`Dec`,5) as `Dec`,
				Round(`ecom`.`ecom_historical`.`Jan` * `ecom`.`ecom_budgeting_jisuan`.`Jan`,5) as `Jan`,Round(`ecom`.`ecom_historical`.`Feb` * `ecom`.`ecom_budgeting_jisuan`.`Feb`,5) as `Feb`,
				Round(`ecom`.`ecom_historical`.`Mar` * `ecom`.`ecom_budgeting_jisuan`.`Mar`,5) as `Mar`,Round(`ecom`.`ecom_historical`.`Apr` * `ecom`.`ecom_budgeting_jisuan`.`Apr`,5) as `Apr`,
				Round(`ecom`.`ecom_historical`.`May` * `ecom`.`ecom_budgeting_jisuan`.`May`,5) as `May`,Round(`ecom`.`ecom_historical`.`Jun` * `ecom`.`ecom_budgeting_jisuan`.`Jun`,5) as `Jun`
				from `ecom`.`ecom_historical` INNER JOIN `ecom`.`ecom_budgeting_jisuan` on 
				`ecom`.`ecom_historical`.`Platform` = `ecom`.`ecom_budgeting_jisuan`.`Platform` and `ecom`.`ecom_historical`.`Data_Type` = `ecom`.`ecom_budgeting_jisuan`.`Data_Type` 
				and `ecom`.`ecom_historical`.`map` = `ecom`.`ecom_budgeting_jisuan`.`Filter`and `ecom`.`ecom_historical`.`Segment` = `ecom`.`ecom_budgeting_jisuan`.`Segment`
				where `ecom`.`ecom_historical`.`map` = 'Commission Rate Adjustment' and `ecom`.`ecom_historical`.`Data_type` = '$arr[$i]'
			Order By `Platform`,`Data_Type`,`Filter`";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$n = 0;
		while($n<mysqli_num_rows($result)){
			array_push($arr_type,$row[$n]);
			$n++;
		}
    }
    $title = array("FY","Platform","Data_Type","Filter","Segment","Jul","Aug","Sep","Oct","Nov","Dec","Jan","Feb","Mar","Apr","May","Jun");
    echo implode("\t", $title),"\n";

    for ($i=0; $i <count($arr_type) ; $i++) { 
    	echo $arr_type[$i]['FY']."\t".$arr_type[$i]['Platform']."\t".$arr_type[$i]['Data_Type']."\t".$arr_type[$i]['Filter']."\t".$arr_type[$i]['Segment']."\t".$arr_type[$i]['Jul']."\t".$arr_type[$i]['Aug']."\t".$arr_type[$i]['Sep']."\t".$arr_type[$i]['Oct']."\t".$arr_type[$i]['Nov']."\t".$arr_type[$i]['Dec']."\t".$arr_type[$i]['Jan']."\t".$arr_type[$i]['Feb']."\t".$arr_type[$i]['Mar']."\t".$arr_type[$i]['Apr']."\t".$arr_type[$i]['May']."\t".$arr_type[$i]['Jun']."\t\n";
    }

	mysqli_close($con);


?>