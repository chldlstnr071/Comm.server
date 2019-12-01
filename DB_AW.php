<?php
	$con = mysqli_connect("localhost", "OGDB", "Og494983!!@@");

	mysqli_set_charset($con, "utf8");

	$select_db = mysqli_select_db($con, "DB");

	if(mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}

	$W1 = (int)$_POST['W1'];
	$W2 = (int)$_POST['W2'];
	$D1 = (int)$_POST['D1'];
	$D2 = (int)$_POST['D2'];

	$resu = mysqli_query($con, "insert into RP2_data (W1, W2, D1, D2) values ('$W1', '$W2', '$D1', '$D2')");

	if($resu){
		#echo 'success';
	}
	else{
		echo 'failure';
	}


	mysqli_close($con);

?>

