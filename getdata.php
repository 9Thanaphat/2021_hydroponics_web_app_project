<?php 
	include("connect.php");

	$variable = $_REQUEST['variable']; //ค่าที่ส่งมาจาก Board
	
	//echo "0,";
 	if(isset($variable)){ 

 		$sensor = explode(",", $variable); //แยกข้อมูลจาก $variable ที่ใช้ , คั่น

 		$get_now_time = new DateTime( "now", new DateTimeZone( "Asia/Bangkok" ) ); //ตั้ง Timezone
    	$current_date_time = $get_now_time->format( 'Y-m-d H:i:s' ); //ตั้ง format
    	$current_date = $get_now_time->format( 'Y-m-d' ); //ตั้ง format 

    	$sql = "UPDATE `tb_status` SET `temp_1` = '$sensor[0]', `temp_2` = '$sensor[1]', `temp_3` = '$sensor[2]', `humidity_1` = '$sensor[3]', `humidity_2` = '$sensor[4]', `humidity_3` = '$sensor[5]', `mode` = '$sensor[6]', `latest_query_time` = '$current_date_time' WHERE `tb_status`.`controller_name` = 'esp32_1';";

		if ($mysqlx->query($sql) === TRUE) {

		} else {
  		//echo "Error: " . $sql . "<br>" . $mysqlx->error;
		}

		//เช็คเวลาว่าผ่านไปกี่วินาที
		$get_now_time = new DateTime( "now", new DateTimeZone( "Asia/Bangkok" ) ); //ตั้ง Timezone
                $current_date_time = $get_now_time->format( 'Y-m-d H:i:s' ); //ตั้ง format

                $sql = "SELECT * FROM `tb_sensor`";
                $results = $mysqlx->query($sql);
            while($row = $results->fetch_assoc()) {
                $latest_query_time = $row["save_date_time"];
                $date_time1 = new DateTime($current_date_time);
                $date_time2 = new DateTime($latest_query_time);

                $interval = $date_time1->diff($date_time2); //หาความต่างของเวลา
                $interval_day = $interval->d;
                $interval_hour = $interval->h;
                $interval_minute = $interval->i;
                $interval_second = $interval->s;
                
                //เอาค่ามารวมกันเพื่อแปลงเป็นวินาที
                $second_diff = (($interval_day * 86400) + ($interval_hour * 3600) + ($interval_minute * 60) + ($interval_second * 1));

            }

                //echo $second_diff;

	if ($second_diff >= 900) { //ถ้าเวลาที่ insert ข้อมูลล่าสุดมากกว่าหรือเท่ากับ 900 วินาที (15 นาที) ถึงจะ insert ข้อมูลได้
		if(($sensor[0] != 0) && ($sensor[1]) != 0 && ($sensor[2]) != 0 && ($sensor[3]) != 0 && ($sensor[4]) != 0 && ($sensor[5]) != 0) {
			$sql = "INSERT INTO `tb_sensor` (`save_date_time`, `save_date`, `temp_1`, `temp_2`, `temp_3`, `humidity_1`, `humidity_2`, `humidity_3`) VALUES ( '$current_date_time', '$current_date', '$sensor[0]', '$sensor[1]', '$sensor[2]', '$sensor[3]', '$sensor[4]', '$sensor[5]');";
		if ($mysqlx->query($sql) === TRUE) {
  		//echo "New record created successfully";
		} else {
  		//echo "Error: " . $sql . "<br>" . $mysqlx->error;
		}

	}

		}

		$sql = "SELECT * FROM `tb_setting`";
		$results = $mysqlx->query($sql);
		$count = $results->num_rows;
		while($row = $results->fetch_assoc()) {
		$mode = $row["mode"];
		}

		if ($mode == 1) { //ทำงานแบบ Manual
			$sql = "SELECT * FROM `tb_relay`";
		$results = $mysqlx->query($sql);
		$count = $results->num_rows;
		while($row = $results->fetch_assoc()) {
		$name = $row["name"];
		$force_status = $row["force_status"];
		//เช็คเวลา
		$get_now_time = new DateTime( "now", new DateTimeZone( "Asia/Bangkok" ) ); //ตั้ง Timezone
    	$now_time = $get_now_time->format( 'H:i:s' ); //ตั้ง format
    	$open_time = $row["open_time"];
    	$close_time = $row["close_time"];
		if($force_status == 0) { //ถ้าไม่มีการบังคับเปิดปิด
			if($now_time >= $open_time AND $now_time <= $close_time ){ //เช็คเวลาเปิดปิด
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
  		} 
  		else {
    	$status = "1";

    	$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;	
    	}
		} 
		if ($force_status == "1") {
			$status = "0";

    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			} 
		if ($force_status == "2") {
			$status = "1";

    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			}

			echo ",";
 			} //end while
		} //end check mode "0" 

		if ($mode == 2) { //ทำตาม planner

		//เทียบว่าวันนี้คือวันที่เท่าไรของการปลูก

		$sql = "SELECT * FROM `tb_setting`";
		$results = $mysqlx->query($sql);
		while($row = $results->fetch_assoc()) {
			$start_date = $row["start_date"];
			$plan_date_diff = round(abs(strtotime($current_date) - strtotime($start_date)));
			$plan_date_diff = ($plan_date_diff / 60 / 60 / 24 + 1);
			//echo $plan_date_diff;
		}

		$sql = "SELECT planting_plan_id FROM `tb_planting` WHERE `tb_planting`.`planting_date` = '$plan_date_diff';";
		$results = $mysqlx->query($sql);
		while($row = $results->fetch_assoc()) {
			$planting_plan_id = $row["planting_plan_id"];
			//echo $planting_plan_id;
			//echo "<br>";
		}

		$sql = "SELECT * FROM `tb_planting_plan` WHERE `tb_planting_plan`.`planting_plan_id` = '$planting_plan_id';";
		$results = $mysqlx->query($sql);
		while($row = $results->fetch_assoc()) {
			$planting_plan_open_time = $row["planting_plan_open_time"];
			$planting_plan_close_time = $row["planting_plan_close_time"];
			$planting_plan_fan_open_time = $row["planting_plan_fan_open_time"];
			$planting_plan_fan_close_time = $row["planting_plan_fan_close_time"];
			//echo $planting_plan_open_time;
			//echo "<br>";
			//echo $planting_plan_close_time;
			//echo "<br>";
			//echo $planting_plan_fan_open_time;
			//echo "<br>";
			//echo $planting_plan_fan_close_time;
		}

		//0 คือ เปิดไฟ , 1 คือ ปิดไฟ

		$sql = "SELECT * FROM `tb_relay`";
		$results = $mysqlx->query($sql);
		$count = $results->num_rows;
	while($row = $results->fetch_assoc()) {
		$name = $row["name"];
		$force_status = $row["force_status"];
		//เช็คเวลา
		$get_now_time = new DateTime( "now", new DateTimeZone( "Asia/Bangkok" ) ); //ตั้ง Timezone
    	$now_time = $get_now_time->format( 'H:i:s' ); //ตั้ง format

    	$open_time = $planting_plan_open_time;
    	$close_time = $planting_plan_close_time;

    	$fan_open_time = $planting_plan_fan_open_time;
    	$fan_close_time = $planting_plan_fan_close_time;

    	if ($name == "relay1") { //ไฟชั้น 1
    		if($now_time >= $planting_plan_open_time AND $now_time <= $planting_plan_close_time ){ //เช็คเวลาเปิดปิดไฟ
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
    		} else {
    		$status = "1";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";	
    	}
    	} 

    	if ($name == "relay2") { //ไฟชั้น 2
    		if($now_time >= $planting_plan_open_time AND $now_time <= $planting_plan_close_time ){ //เช็คเวลาเปิดปิดไฟ
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
    		} else {
    		$status = "1";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";	
    	}
    	}

    	if ($name == "relay3") { //ไฟชั้น 3
    		if($now_time >= $planting_plan_open_time AND $now_time <= $planting_plan_close_time ){ //เช็คเวลาเปิดปิดไฟ
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
    		} else {
    		$status = "1";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";	
    	}
    	}

    	if ($name == "relay4") { //ปั้มน้ำ
 			if ($force_status == "1") {
			$status = "1";

    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
			} 
		if ($force_status == "2") {
			$status = "0";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
			}
 		} 

 		if ($name == "relay5") { //พัดลมชั้น 1
    		if($now_time >= $planting_plan_fan_open_time AND $now_time <= $planting_plan_fan_close_time ){ //เช็คเวลาเปิดปิดไฟ
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
    		} else {
    		$status = "1";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";	
    	}
    	}

    	if ($name == "relay6") { //พัดลมชั้น 2
    		if($now_time >= $planting_plan_fan_open_time AND $now_time <= $planting_plan_fan_close_time ){ //เช็คเวลาเปิดปิดไฟ
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
    		} else {
    		$status = "1";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";	
    	}
    	}

    	if ($name == "relay7") { //พัดลมชั้น 3
    		if($now_time >= $planting_plan_fan_open_time AND $now_time <= $planting_plan_fan_close_time ){ //เช็คเวลาเปิดปิดไฟ
			$status = 0;
			$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";
    		} else {
    		$status = "1";
    		$sql = "UPDATE `tb_relay` SET `status_now` = '$status' WHERE `tb_relay`.`name` = '$name';";
			if ($mysqlx->query($sql) === TRUE) {}  
			echo $status;
			echo ",";	
    	}
    	}



			
	} //end while
		
}

  
}

		

?>
