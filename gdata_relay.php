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
                  echo "<a class='text-success'>ออนไลน์</a>";
                } elseif ($connect_status == 0) {
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

    
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay1' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_1_status_now = $row["status_now"];
}
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay2' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_2_status_now = $row["status_now"];
}
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay3' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_3_status_now = $row["status_now"];
}
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay4' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_4_status_now = $row["status_now"];
}
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay5' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_5_status_now = $row["status_now"];
}
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay6' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_6_status_now = $row["status_now"];
}
$sql = "SELECT * FROM `tb_relay` WHERE name = 'relay7' ";
$results = $mysqlx->query($sql);
while($row = $results->fetch_assoc()) {
$relay_7_status_now = $row["status_now"];
}


    if($_GET['data']==1){ //relay 1
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_1_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_1_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }

    if($_GET['data']==2){ //relay 2
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_2_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_2_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }

        if($_GET['data']==3){ //relay 3
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_3_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_3_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }

    if($_GET['data']==4){ //relay 4
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_4_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_4_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }

    if($_GET['data']==5){ //relay 5
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_5_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_5_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }    

    if($_GET['data']==6){ //relay 6
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_6_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_6_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }    

    if($_GET['data']==7){ //relay 7
        if ($connect_status == 1) { //ถ้า online อยู่
          if ($relay_7_status_now == 1) { //ถ้า status ปิดอยู่ 
            echo "<center><h4>ปิด</h4></center>";
          } elseif ($relay_7_status_now == 0) { //ถ้า status เปิดอยู่ 
            echo "<center><h4>เปิด</h4></center>";
          }
        } else if ($connect_status == 0) {
            echo '<center><h4 class="text-muted">-</h4></center>';
        }
    }    




?>