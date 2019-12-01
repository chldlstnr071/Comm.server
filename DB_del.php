<?php
	
	$con = mysqli_connect("localhost", "OGDB", "Og494983!!@@");

	if(!$con){
		die('Failed Connect Mysql: '.mysqli_error());
	}
	else{
		#echo "Successed Connect Mysql<br>";
	}

	$select_db = mysqli_select_db($con, "DB");

	if(!$select_db){
		die('Failed Select DB: '.mysqli_error());
	}
	else{
		#echo "Successed Select DB<br>";
	}

	mysqli_set_charset($con, "utf8");

	$result_1 = mysqli_query($con, "select * from RP1_data");

	$result_2 = mysqli_query($con, "select * from RP2_data");
	
	$result_3 = mysqli_query($con, "select * from RP3_data");

	$cnt1 = mysqli_num_rows($result_1);
	
	$cnt2 = mysqli_num_rows($result_2);
	
	$cnt3 = mysqli_num_rows($result_3);

	if($cnt1>=50){
		mysqli_query($con, "DELETE FROM RP1_data LIMIT 35");
	}

	if($cnt2>=50){
		mysqli_query($con, "DELETE FROM RP2_data LIMIT 35");
	}

	if($cnt3>=50){
		mysqli_query($con, "DELETE FROM RP3_data");
		//mysqli_query($con, "DELETE FROM RP3_data LIMIT 35");
	}

	echo ($cnt1);
	echo "   ";
	echo ($cnt2);
	echo "   ";
	echo ($cnt3);

	mysqli_close($con);
?>

