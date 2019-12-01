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

	$result = mysqli_query($con, "select * from RP2_data");

	$res = array();

	$r = array();

	$cnt = 0;

	$a = 0;

	for($i=0; $row = mysqli_fetch_array($result); $i++){

		array_push($r, array('W1'=>$row[0], 'W2'=>$row[1], 'D1'=>$row[2], 'D2'=>$row[3]));

		if($i==0){

			array_push($res, array('W1'=>$row[0], 'W2'=>$row[1], 'D1'=>$row[2], 'D2'=>$row[3]));
		}

		else if(($i!=0)&&(($r[$a]['W1']!=$res[$cnt]['W1'])||($r[$a]['W2']!=$res[$cnt]['W2'])||($r[$a]['D1']!=$res[$cnt]['D1'])||($r[$a]['D2']!=$res[$cnt]['D2']))){

			array_push($res, array('W1'=>$row[0], 'W2'=>$row[1], 'D1'=>$row[2], 'D2'=>$row[3]));
			$cnt++;
		}

		$a++;
	}


	echo json_encode($res, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>

