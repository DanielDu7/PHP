<form action='Insert-new.php' method="_POST">
	<table border="1" align="center">
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Authority</th>
			<th>Log-In Time</th>
		</tr>

	<?php 
		$conn = mysqli_connect("120.25.98.123","Eric","Eric321") or die("Can not connect to database:".mysqli_error());
		$sql = "Select * from `e_test`.`baidu_abi_login`";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>';
			echo '<td contenteditable="true">';
			echo $row['Username']; 
			echo '</td>';		
			echo '<td contenteditable="true">';
			echo $row['Password']; 
			echo '</td>';		
			echo '<td contenteditable="true">';
			echo $row['Authority']; 
			echo '</td>';
			echo '<td contenteditable="true">';
			echo $row['Log-In Time']; 
			echo '</td>';
			echo '</tr>';
		}

		mysqli_close($conn);
	 ?>

	</table>
	请输入账号：<input type="Text" name="Username">
	<br>
	<button type="submit" value="submit" name="submit">提交</button>
	
</form>