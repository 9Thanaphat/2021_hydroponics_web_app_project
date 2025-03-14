<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

    include("connect.php");

                $get_now_time = new DateTime( "now", new DateTimeZone( "Asia/Bangkok" ) ); //ตั้ง Timezone
                $current_date_time = $get_now_time->format( 'Y-m-d H:i:s' ); //ตั้ง format

                include("function.php");

                $sql = "SELECT * FROM `tb_status` WHERE controller_name = 'esp32_1' ";
                $results = $mysqlx->query($sql);
                while($row = $results->fetch_assoc()) {
                $temp_1 = $row["temp_1"];
                $temp_2 = $row["temp_2"];
                $temp_3 = $row["temp_3"];
                $humidity_1 = $row["humidity_1"];
                $humidity_2 = $row["humidity_2"];
                $humidity_3 = $row["humidity_3"];
                $latest_query_time = $row["latest_query_time"];
                //echo $latest_query_time;
                }

                $date_time1 = new DateTime($current_date_time);
                $date_time2 = new DateTime($latest_query_time);

                $interval = $date_time1->diff($date_time2); //หาความต่างของเวลา
                $interval_day = $interval->d;
                $interval_hour = $interval->h;
                $interval_minute = $interval->i;
                $interval_second = $interval->s;
                
                //เอาค่ามารวมกันเพื่อแปลงเป็นวินาที
                $second_diff = (($interval_day * 86400) + ($interval_hour * 3600) + ($interval_minute * 60) + ($interval_second * 1));

                if ($second_diff <= 15) { //ถ้ามีการเชื่อมต่อภายใน 15 วินาที
                  $connect_status = 1; //1 คือ ออนไลน์
                } elseif ($second_diff > 15) {
                  $connect_status = 0;
                }

            if($_GET['data']==0){
                if ($connect_status == 1 ) {
                  echo "สถานะการเชื่อมต่อ : ";
                  echo "<a class='text-success'> ออนไลน์</a>";
                } elseif ($connect_status == 0) {
                  echo "สถานะการเชื่อมต่อ : ";
                  echo "<a class='text-muted'>";
                  echo "ออฟไลน์ เชื่อมต่อครั้งล่าสุดเมื่อ ";
                  echo $latest_query_time;
                  echo " (";
                  if ($interval_day != 0) {
                    echo "" . $interval_day . " วัน ";
                  }
                  if ($interval_hour != 0) {
                    echo " " . $interval_hour . "ชั่วโมง";
                  }
                  if ($interval_minute != 0) {
                    echo " " . $interval_minute . "นาที";
                  }
                  if ($interval_second != 0) {
                    echo " " . $interval_second . "วินาที";
                  }
                  echo "ที่แล้ว )";
                  echo "</a>";
                }
            }

    $sql = "SELECT * FROM `tb_status`";
    $results = $mysqlx->query($sql);
    while($row = $results->fetch_assoc()) {
    $temp_1=$row["temp_1"];
    $temp_2=$row["temp_2"];
    $temp_3=$row["temp_3"];
    $humidity_1=$row["humidity_1"];
    $humidity_2=$row["humidity_2"];
    $humidity_3=$row["humidity_3"];

    if($_GET['data']==1){
        if ($connect_status == 1) {
        echo $temp_1;
        echo "°C";
        } else if ($connect_status == 0) {
        echo '<center><h3 class="text-muted">-</h3></center>';
        }
    }

    if($_GET['data']==2){
        if ($connect_status == 1) {
        echo $temp_2;
        echo "°C";
        } else if ($connect_status == 0) {
        echo '<center><h3 class="text-muted">-</h3></center>';
        }
    }

    if($_GET['data']==3){
        if ($connect_status == 1) {
        echo $temp_3;
        echo "°C";
        } else if ($connect_status == 0) {
        echo '<center><h3 class="text-muted">-</h3></center>';
        }
    }

    if($_GET['data']==4){
        if ($connect_status == 1) {
        echo $humidity_1;
        echo "%RH";
        } else if ($connect_status == 0) {
        echo '<center><h3 class="text-muted">-</h3></center>';
        }
    }

    if($_GET['data']==5){
        if ($connect_status == 1) {
        echo $humidity_2;
        echo "%RH";
        } else if ($connect_status == 0) {
        echo '<center><h3 class="text-muted">-</h3></center>';
        }
    }

    if($_GET['data']==6){
        if ($connect_status == 1) {
        echo $humidity_3;
        echo "%RH";
        } else if ($connect_status == 0) {
        echo '<center><h3 class="text-muted">-</h3></center>';
        }
    }

}


?>