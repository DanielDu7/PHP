<!DOCTYPE html>
<html>
	<title>Index</title>

	<body>	
		<center>
			<form action="Hello.php" method="_POST">
				</br></br>
				请选择需要修改的Platform:
				<select id="First" name="Platform">
					<option>JD</option>
					<option>TMALL</option>
				</select>
				</br>
				请选择需要修改的Data Type:

				<?php 
					include "Connect-info.php";
					
					$conn = mysqli_connect($Server,$User,$Pwd) or die("Can not connect to Database.".mysqli_error());
					$sql = "Select distinct(`Data Type`) from `ecom`.`Ecom_Budgeting` where `Platform` = 'JD'";
					$result = mysqli_query($conn,$sql);
					echo '<select id="Second" name="Data_Type">';
					while($row = mysqli_fetch_array($result))
					{	
						echo '<option>'.$row['Data Type'].'</option>';
					}
					echo '</select>';
					mysqli_close($conn);
				 ?>
				</br></br></br>
				<input type="Submit" name="SubmitBt" value="Submit">
			</form>	
		</center>
	</body>



</html>

