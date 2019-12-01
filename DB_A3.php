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

	$result = mysqli_query($con, "select * from RP3_data");

	$res = array();

	$r = array();

	$cnt = 0;

	$a = 0;

	for($i=0; $row = mysqli_fetch_array($result); $i++){

		array_push($r, array('f1'=>$row[0], 'f2'=>$row[1], 'f3'=>$row[2], 'f4'=>$row[3], 't1'=>$row[4], 't2'=>$row[5], 't3'=>$row[6], 't4'=>$row[7]));

		if($i==0){

			array_push($res, array('f1'=>$row[0], 'f2'=>$row[1], 'f3'=>$row[2], 'f4'=>$row[3], 't1'=>$row[4], 't2'=>$row[5], 't3'=>$row[6], 't4'=>$row[7]));
		}

		else if(($i!=0)&&(($r[$a]['f1']!=$res[$cnt]['f1'])||($r[$a]['f2']!=$res[$cnt]['f2'])||($r[$a]['f3']!=$res[$cnt]['f3'])||($r[$a]['f4']!=$res[$cnt]['f4']))){

			array_push($res, array('f1'=>$row[0], 'f2'=>$row[1], 'f3'=>$row[2], 'f4'=>$row[3], 't1'=>$row[4], 't2'=>$row[5], 't3'=>$row[6], 't4'=>$row[7]));
			$cnt++;
		}

		$a++;
	}

	
	echo json_encode($res, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
