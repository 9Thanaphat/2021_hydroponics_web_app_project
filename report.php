<?php

include("connect.php");
//รับค่า
$lot_id = $_GET["lot_id"];
$sql = "SELECT * FROM `tb_lot` WHERE `lot_id` = '$lot_id'";
        $results = $mysqlx->query($sql);
        while($row = $results->fetch_assoc()) {
        $lot_name=$row["lot_name"];
        $lot_start_date=$row["lot_start_date"];
        $lot_end_date=$row["lot_end_date"];
    }

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$lot_name.".xls");
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize($lot_name.".xls"));   
@readfile($filename); 



?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<table>
		<tr>
			<td >ลำดับ</td>
			<td >วันที่</td>
			<td >อุณหภูมิ 1</td>
			<td >อุณหภูมิ 2</td>
			<td >อุณหภูมิ 3</td>
			<td >ความชื้น 1</td>
			<td >ความชื้น 2</td>
			<td >ความชื้น 3</td>
		</tr>
	<?php 
		
        $start_date = $lot_start_date;
        $end_date = $lot_end_date;

        //เอาข้อมูลของวันทุกวันที่ไม่ซ้ำกัน มาเก็บ

        $sql = "SELECT DISTINCT save_date FROM `tb_sensor` WHERE save_date BETWEEN '$start_date' AND '$end_date' ";
        $results = $mysqlx->query($sql);
        while($row = $results->fetch_assoc()) {
             $all_date[] = $row["save_date"];
             $count_all_date = count($all_date);

        }

            for ($i=0; $i < $count_all_date ; $i++) { 

            $sql = "SELECT AVG(temp_1),AVG(temp_2),AVG(temp_3),AVG(humidity_1),AVG(humidity_2),AVG(humidity_3) FROM `tb_sensor` WHERE save_date='$all_date[$i]' ";
            $results = $mysqlx->query($sql);
            while($row = $results->fetch_assoc()) {
            $average_temp1 = $row['AVG(temp_1)'];
            $average_temp2 = $row['AVG(temp_2)'];
            $average_temp3 = $row['AVG(temp_3)'];
            $average_humidity1 = $row['AVG(humidity_1)'];
            $average_humidity2 = $row['AVG(humidity_2)'];
            $average_humidity3 = $row['AVG(humidity_3)'];
            $date_numer = $i + 1;
            ?>
<tr>
	<td><?php echo $date_numer ?></td>
	<td><?php echo $all_date[$i] ?></td>
	<td><?php echo number_format( $average_temp1, 0 ); ?></td>
	<td><?php echo number_format( $average_temp2, 0 ); ?></td>
	<td><?php echo number_format( $average_temp3, 0 ); ?></td>
	<td><?php echo number_format( $average_humidity1, 0 ); ?></td>
	<td><?php echo number_format( $average_humidity2, 0 ); ?></td>
	<td><?php echo number_format( $average_humidity3, 0 ); ?></td>
</tr>
            <?php
            }
        }
        ?>
</table>
</body>
</html>

