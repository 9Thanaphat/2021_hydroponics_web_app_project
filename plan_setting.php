<?php 
include("connect.php");

//รับค่า
$edit_planting_date = $_REQUEST["edit_planting_date"];
$edit_planting_plan_id = $_REQUEST["edit_planting_plan_id"];
$edit_planting_note = $_REQUEST["edit_planting_note"];

if(!empty($edit_planting_date) && !empty($edit_planting_plan_id) ){

  $update_sql = "UPDATE `tb_planting` SET `planting_plan_id` = '$edit_planting_plan_id', `planting_note` = '$edit_planting_note' WHERE `tb_planting`.`planting_date` = $edit_planting_date;";
  $update = $mysqlx->query($update_sql);
  //header("Location: plan_setting.php");
}

//รับค่า
$edit_start_date = $_REQUEST["edit_start_date"];
$edit_duration_of_planting = $_REQUEST["edit_duration_of_planting"];
$edit_mode = $_REQUEST["edit_mode"];

if(!empty($edit_start_date) && !empty($edit_duration_of_planting) && !empty($edit_mode)){

  $update_sql = "UPDATE `tb_setting` SET `start_date` = '$edit_start_date', `duration_of_planting` = '$edit_duration_of_planting' , `mode` = '$edit_mode' WHERE `tb_setting`.`setting_id` = 1;";
  $update = $mysqlx->query($update_sql);
  header("Location: plan_setting.php");
  //echo "yay";
}

if(empty($edit_start_date) && !empty($edit_duration_of_planting)  && !empty($edit_mode)){

  $update_sql = "UPDATE `tb_setting` SET `start_date` = '', `duration_of_planting` = '$edit_duration_of_planting' , `mode` = '$edit_mode' WHERE `tb_setting`.`setting_id` = 1;";
  $update = $mysqlx->query($update_sql);
  header("Location: plan_setting.php");
  //echo "clear start date";
}

//รับค่า relay_1
$edit_relay_1_force_status = $_REQUEST["edit_relay_1_force_status"];
$edit_relay_1_open_time = $_REQUEST["edit_relay_1_open_time"];
$edit_relay_1_close_time = $_REQUEST["edit_relay_1_close_time"];

if(!empty($edit_relay_1_open_time) && !empty($edit_relay_1_close_time) ){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_1_open_time', `close_time` = '$edit_relay_1_close_time', `force_status` = '$edit_relay_1_force_status' WHERE `tb_relay`.`name` = 'relay1';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_1

//รับค่า relay_2
$edit_relay_2_force_status = $_REQUEST["edit_relay_2_force_status"];
$edit_relay_2_open_time = $_REQUEST["edit_relay_2_open_time"];
$edit_relay_2_close_time = $_REQUEST["edit_relay_2_close_time"];

if(!empty($edit_relay_2_open_time) && !empty($edit_relay_2_close_time) ){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_2_open_time', `close_time` = '$edit_relay_2_close_time', `force_status` = '$edit_relay_2_force_status' WHERE `tb_relay`.`name` = 'relay2';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_2

//รับค่า relay_3
$edit_relay_3_force_status = $_REQUEST["edit_relay_3_force_status"];
$edit_relay_3_open_time = $_REQUEST["edit_relay_3_open_time"];
$edit_relay_3_close_time = $_REQUEST["edit_relay_3_close_time"];

if(!empty($edit_relay_3_open_time) && !empty($edit_relay_3_close_time) ){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_3_open_time', `close_time` = '$edit_relay_3_close_time', `force_status` = '$edit_relay_3_force_status' WHERE `tb_relay`.`name` = 'relay3';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_3

$edit_relay_4_force_status = $_REQUEST["edit_relay_4_force_status"];

if(!empty($edit_relay_4_force_status)){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_4_open_time', `close_time` = '$edit_relay_4_close_time', `force_status` = '$edit_relay_4_force_status' WHERE `tb_relay`.`name` = 'relay4';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_4

//รับค่า relay_5
$edit_relay_5_force_status = $_REQUEST["edit_relay_5_force_status"];
$edit_relay_5_open_time = $_REQUEST["edit_relay_5_open_time"];
$edit_relay_5_close_time = $_REQUEST["edit_relay_5_close_time"];

if(!empty($edit_relay_5_open_time) && !empty($edit_relay_5_close_time) ){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_5_open_time', `close_time` = '$edit_relay_5_close_time', `force_status` = '$edit_relay_5_force_status' WHERE `tb_relay`.`name` = 'relay5';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_5

//รับค่า relay_6
$edit_relay_6_force_status = $_REQUEST["edit_relay_6_force_status"];
$edit_relay_6_open_time = $_REQUEST["edit_relay_6_open_time"];
$edit_relay_6_close_time = $_REQUEST["edit_relay_6_close_time"];

if(!empty($edit_relay_6_open_time) && !empty($edit_relay_6_close_time) ){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_6_open_time', `close_time` = '$edit_relay_6_close_time', `force_status` = '$edit_relay_6_force_status' WHERE `tb_relay`.`name` = 'relay6';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_6

//รับค่า relay_7
$edit_relay_7_force_status = $_REQUEST["edit_relay_7_force_status"];
$edit_relay_7_open_time = $_REQUEST["edit_relay_7_open_time"];
$edit_relay_7_close_time = $_REQUEST["edit_relay_7_close_time"];

if(!empty($edit_relay_7_open_time) && !empty($edit_relay_7_close_time) ){

  $sql = "UPDATE `tb_relay` SET `open_time` = '$edit_relay_7_open_time', `close_time` = '$edit_relay_7_close_time', `force_status` = '$edit_relay_7_force_status' WHERE `tb_relay`.`name` = 'relay7';";
  $results = $mysqlx->query($sql);
  header("Location: plan_setting.php");

} //จบรับค่า relay_7

//เทียบว่าวันนี้คือวันที่เท่าไรของการปลูก

        $get_now_time = new DateTime( "now", new DateTimeZone( "Asia/Bangkok" ) ); //ตั้ง Timezone
        $current_date_time = $get_now_time->format( 'Y-m-d H:i:s' ); //ตั้ง format
        $current_date = $get_now_time->format( 'Y-m-d' ); //ตั้ง format 

        $sql = "SELECT * FROM `tb_setting`";
        $results = $mysqlx->query($sql);
        while($row = $results->fetch_assoc()) {
            $start_date = $row["start_date"];
            $plan_date_diff = round(abs(strtotime($current_date) - strtotime($start_date)));
            $plan_date_diff = ($plan_date_diff / 60 / 60 / 24 + 1);
            //echo $plan_date_diff;
        }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ตั้งค่า</title>

    <?php include("css_link.php") ?>


</head>

<body style="font-family: 'Prompt', sans-serif;">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>ระบบควบคุมการทดลองการใช้แสงเทียมในการปลูกผักกรีนโอ๊คด้วยระบบ IoT</h4>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php"><i class="bi bi-speedometer"></i> Dashboard</a>

                </li>
                <li>
                    <a href="#SettingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle "> <i class="bi bi-gear"></i> ตั้งค่า</a>
                    <ul class="collapse list-unstyled" id="SettingSubmenu">
                        <li>
                            <a href="plan_setting.php" class="text-success">ตั้งค่าแพลนการปลูก</a>
                        </li>
                        <li>
                            <a href="planting_plan_setting.php">ตั้งค่ารูปแบบแพลนการปลูก</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#DataSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="bi bi-graph-up"></i> สรุปข้อมูล</a>
                    <ul class="collapse list-unstyled" id="DataSubmenu">
                        <li>
                            <a href="lot_tabledata.php">สรุปข้อมูลจากรอบปลูก</a>
                        </li>
                        <li>
                            <a href="tabledata.php" >ข้อมูลที่เก็บจากเครื่อง</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="aboutus.php"><i class="bi bi-person-circle"></i> เกี่ยวกับผู้จัดทำ</a>
                </li>

            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="">

                    <button type="button" id="sidebarCollapse" class="btn btn-success">
                        <i class="bi bi-list"></i>
                    </button>

                </div>
            </nav>

            

        <div class="container">

                <?php 
                    $sql = "SELECT * FROM tb_setting";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                        $start_date = $row["start_date"];
                        $duration_of_planting = $row["duration_of_planting"];
                        $mode = $row["mode"];
                    }
            ?>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">



                    <a> <i class="bi bi-calendar"></i> วันที่เริ่มปลูก : <?php 
                    if ($start_date == "0000-00-00") {
                        echo "<a class='text-danger'>ยังไม่ได้ตั้งวันที่เริ่มปลูก</a>";
                    } else {
                        echo $start_date; 
                    }
                    
                    ?></a>

                    <a> <i class="bi bi-clock"></i> จำนวนวันที่ปลูก : <?php echo $duration_of_planting; ?></a>

                    <?php $end_date = date('Y-m-d',strtotime($start_date . "+$duration_of_planting days")); ?>

                    <a> <i class="bi bi-calendar-check"></i> วันที่เสร็จสิ้นการปลูก : <?php 
                    if ($start_date == "0000-00-00") {
                        echo "<a class='text-danger'>ยังไม่ได้ตั้งวันที่เริ่มปลูก</a>";
                    } else {
                        echo $end_date; 
                    }
                    
                    ?></a>

                    <a> <i class="bi bi-speedometer"></i> การทำงาน : <?php 
                    if ($mode == 1) {
                        echo "แมนนวล";
                    } elseif ($mode == 2) {
                        echo "ทำตามแพลนปลูก";
                    }
                ?></a>

                </div>
            </nav>

            <nav class="navbar navbar-light bg-light">
                <div class="">
                   <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#edit_setting">
                <a>ตั้งค่า </a><i class="bi bi-gear"></i>
                </button>

            <!-- Modal ของ edit -->
<div class="modal fade" id="edit_setting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET">
            <label for="text1" class="form-label">วันที่เริ่มปลูก</label><br>
              <input type="date" class="form-control" id="text1" name="edit_start_date" value="<?php echo $start_date ?>">
              
              <label for="text2" class="form-label">จำนวนวันที่ปลูก</label><br>
              <input type="text" class="form-control" id="text2" 
              placeholder="จำนวนวันที่ปลูก" name="edit_duration_of_planting" value="<?php echo $duration_of_planting ?>">

              <label class="form-label">โหมดการปลูก :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_mode"
                        >
                    <option value="1" <?php if($mode == 1){ echo "selected"; } ?> >แมนนวล</option>
                    <option value="2" <?php if($mode == 2){ echo "selected"; } ?> >ทำตามแพลนเนอร์</option>
                  </select>

                  <?php 
                $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay4'";
                $results = $mysqlx->query($sql);
                while($row = $results->fetch_assoc()) {
                    $relay_4_force_status=$row["force_status"];
                }
                  ?>
                <label class="form-label">ปั้มน้ำ :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_4_force_status"
                        >
                    <option value="1" <?php if($relay_4_force_status == 1){ echo "selected"; } ?> >เปิด</option>
                    <option value="2" <?php if($relay_4_force_status == 2){ echo "selected"; } ?> >ปิด</option>
                  </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>

        </form>
      </div>
    </div>
  </div>
</div><!--end modal 1 -->

<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#setting" <?php if ($mode != 1) {
    echo "disabled";
} ?>>
            แมนนวล <i class="bi bi-wrench"></i>
            </button>

            <!-- Modal ของ setting -->
            <div class="modal fade" id="setting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">ตั้งค่า</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST">

                      <div class="card"> <!-- card ของ ชั้นที่ 1 -->
                        <?php
                    $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay1' ";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                    $relay_1_name=$row["name"];
                    $relay_1_open_time=$row["open_time"]; 
                    $relay_1_close_time=$row["close_time"];
                    $relay_1_force_status=$row["force_status"];
                ?>
                        <div class="card-body">
                        <h5 class="card-title">ชั้นที่ 1</h5>

                        <label class="form-label">โหมดการทำงานหลอดไฟ :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_1_force_status"
                        >
                    <option value="0" <?php if($relay_1_force_status == 0){ echo "selected"; } ?> >ตั้งเวลา</option>
                    <option value="1" <?php if($relay_1_force_status == 1){ echo "selected"; } ?> >เปิดไฟ</option>
                    <option value="2" <?php if($relay_1_force_status == 2){ echo "selected"; } ?> >ปิดไฟ</option>
                  </select>

                        <label class="form-label">เวลาเปิดไฟ :</label><br>
                        <input type="time" class="form-control" id="text2" 
                        placeholder="$name" name="edit_relay_1_open_time" value="<?php echo $relay_1_open_time ?>">
                        <label class="form-label">เวลาปิดไฟ :</label><br>
                        <input type="time" class="form-control" id="text3" 
                         name="edit_relay_1_close_time" value="<?php echo $relay_1_close_time ?>">

                        </div>
                        <?php } ?>

                        <?php
                    $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay5' ";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                    $relay_5_name=$row["name"];
                    $relay_5_open_time=$row["open_time"]; 
                    $relay_5_close_time=$row["close_time"];
                    $relay_5_force_status=$row["force_status"];
                ?>
                        <div class="card-body">

                        <label class="form-label">โหมดการทำงานพัดลม :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_5_force_status"
                        >
                    <option value="0" <?php if($relay_5_force_status == 0){ echo "selected"; } ?> >ตั้งเวลา</option>
                    <option value="1" <?php if($relay_5_force_status == 1){ echo "selected"; } ?> >เปิด</option>
                    <option value="2" <?php if($relay_5_force_status == 2){ echo "selected"; } ?> >ปิด</option>
                  </select>

                        <label class="form-label">เวลาเปิด :</label><br>
                        <input type="time" class="form-control" id="text2" 
                        placeholder="$name" name="edit_relay_5_open_time" value="<?php echo $relay_5_open_time ?>">
                        <label class="form-label">เวลาปิด :</label><br>
                        <input type="time" class="form-control" id="text3" 
                         name="edit_relay_5_close_time" value="<?php echo $relay_5_close_time ?>">

                        </div>
                        <?php } ?>

                      </div> <!-- end card ของ ชั้นที่ 1 -->
                      <br>
                      <div class="card"> <!-- card ของ relay2 -->
                        <?php
                $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay2' ";
                $results = $mysqlx->query($sql);
                while($row = $results->fetch_assoc()) {
                $relay_2_name=$row["name"];
                $relay_2_open_time=$row["open_time"]; 
                $relay_2_close_time=$row["close_time"];
                    $relay_2_force_status=$row["force_status"];
                ?>
                        <div class="card-body">
                        <h5 class="card-title">ชั้นที่ 2</h5>

                        <label class="form-label">บังคับ :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_2_force_status"
                        >
                    <option value="0" <?php if($relay_2_force_status == 0){ echo "selected"; } ?> >ไม่บังคับ</option>
                    <option value="1" <?php if($relay_2_force_status == 1){ echo "selected"; } ?> >เปิดไฟ</option>
                    <option value="2" <?php if($relay_2_force_status == 2){ echo "selected"; } ?> >ปิดไฟ</option>
                  </select>

                        <label class="form-label">เวลาเปิดไฟ :</label><br>
                        <input type="time" class="form-control" id="text2" 
                        placeholder="$name" name="edit_relay_2_open_time" value="<?php echo $relay_2_open_time ?>">

                        <label class="form-label">เวลาปิดไฟ :</label><br>
                        <input type="time" class="form-control" id="text3" 
                        placeholder="กรอกชื่อจริง" name="edit_relay_2_close_time" value="<?php echo $relay_2_close_time ?>">
                        </div>
                        <?php } ?>

                        <?php
                    $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay6' ";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                    $relay_6_name=$row["name"];
                    $relay_6_open_time=$row["open_time"]; 
                    $relay_6_close_time=$row["close_time"];
                    $relay_6_force_status=$row["force_status"];
                ?>
                        <div class="card-body">

                        <label class="form-label">โหมดการทำงานพัดลม :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_6_force_status"
                        >
                    <option value="0" <?php if($relay_6_force_status == 0){ echo "selected"; } ?> >ตั้งเวลา</option>
                    <option value="1" <?php if($relay_6_force_status == 1){ echo "selected"; } ?> >เปิด</option>
                    <option value="2" <?php if($relay_6_force_status == 2){ echo "selected"; } ?> >ปิด</option>
                  </select>

                        <label class="form-label">เวลาเปิด :</label><br>
                        <input type="time" class="form-control" id="text2" 
                        placeholder="$name" name="edit_relay_6_open_time" value="<?php echo $relay_6_open_time ?>">
                        <label class="form-label">เวลาปิด :</label><br>
                        <input type="time" class="form-control" id="text3" 
                         name="edit_relay_6_close_time" value="<?php echo $relay_6_close_time ?>">

                        </div>
                        <?php } ?>

                      </div> <!-- end card ของ relay2 -->
                      <br>
                      <div class="card"> <!-- card ของ relay3 -->
                        <?php
                $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay3' ";
                $results = $mysqlx->query($sql);
                while($row = $results->fetch_assoc()) {
                $relay_3_name=$row["name"];
                $relay_3_open_time=$row["open_time"]; 
                $relay_3_close_time=$row["close_time"];
                    $relay_3_force_status=$row["force_status"];
                ?>
                        <div class="card-body">
                        <h5 class="card-title">ชั้นที่ 3</h5>

                        <label class="form-label">บังคับ :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_3_force_status"
                        >
                    <option value="0" <?php if($relay_3_force_status == 0){ echo "selected"; } ?> >ไม่บังคับ</option>
                    <option value="1" <?php if($relay_3_force_status == 1){ echo "selected"; } ?> >เปิดไฟ</option>
                    <option value="2" <?php if($relay_3_force_status == 2){ echo "selected"; } ?> >ปิดไฟ</option>
                  </select>

                        <label class="form-label">เวลาเปิดไฟ :</label><br>
                        <input type="time" class="form-control" id="text2" 
                        placeholder="$name" name="edit_relay_3_open_time" value="<?php echo $relay_3_open_time ?>">

                        <label class="form-label">เวลาปิดไฟ :</label><br>
                        <input type="time" class="form-control" id="text3" 
                        placeholder="กรอกชื่อจริง" name="edit_relay_3_close_time" value="<?php echo $relay_3_close_time ?>">
                        </div>
                        <?php } ?>

                        <?php
                    $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay7' ";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                    $relay_7_name=$row["name"];
                    $relay_7_open_time=$row["open_time"]; 
                    $relay_7_close_time=$row["close_time"];
                    $relay_7_force_status=$row["force_status"];
                ?>
                        <div class="card-body">

                        <label class="form-label">โหมดการทำงานพัดลม :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_7_force_status"
                        >
                    <option value="0" <?php if($relay_7_force_status == 0){ echo "selected"; } ?> >ตั้งเวลา</option>
                    <option value="1" <?php if($relay_7_force_status == 1){ echo "selected"; } ?> >เปิด</option>
                    <option value="2" <?php if($relay_7_force_status == 2){ echo "selected"; } ?> >ปิด</option>
                  </select>

                        <label class="form-label">เวลาเปิด :</label><br>
                        <input type="time" class="form-control" id="text2" 
                        placeholder="$name" name="edit_relay_7_open_time" value="<?php echo $relay_7_open_time ?>">
                        <label class="form-label">เวลาปิด :</label><br>
                        <input type="time" class="form-control" id="text3" 
                         name="edit_relay_7_close_time" value="<?php echo $relay_7_close_time ?>">

                        </div>
                        <?php } ?>

                      </div> <!-- end card ของ relay3 -->
                      <br>
                      <div class="card"> <!-- card ของ relay4 -->
                        <?php
                $sql = "SELECT * FROM `tb_relay` WHERE name = 'relay4' ";
                $results = $mysqlx->query($sql);
                while($row = $results->fetch_assoc()) {
                $relay_4_name=$row["name"];
                $relay_4_open_time=$row["open_time"]; 
                $relay_4_close_time=$row["close_time"];
                $relay_4_force_status=$row["force_status"];
                ?>
                        <div class="card-body">
                        <h5 class="card-title">ปั้มน้ำ</h5>

                        <label class="form-label">บังคับ :</label><br>
                        <select class="form-select" id="inputGroupSelect02" name="edit_relay_4_force_status"
                        >
                    <option value="1" <?php if($relay_4_force_status == 1){ echo "selected"; } ?> >เปิด</option>
                    <option value="2" <?php if($relay_4_force_status == 2){ echo "selected"; } ?> >ปิด</option>
                  </select>

                        <?php } ?>
                      </div> <!-- end card ของ relay4 -->

                </div> <!-- end modal body -->
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save</button>

                </form>
                </div>
              </div>
              </div>
            </div><!--end modal 1 -->

                </div>
            </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">วันที่</th>
                    <th scope="col">ชื่อแพลน</th>
                    <th scope="col">เวลาเปิดไฟ</th>
                    <th scope="col">เวลาปิดไฟ</th>
                    <th scope="col">จำนวนชั่วโมงที่เปิดไฟ</th>
                    <th scope="col">เวลาเปิดพัดลม</th>
                    <th scope="col">เวลาปิดพัดลม</th>
                    <th scope="col">จำนวนชั่วโมงที่เปิดพัดลม</th>
                    <th scope="col"></th>
              <th scope="col"></th>
                </tr>
            </thead>
                <tbody><tr>
    <?php

        $sql = "SELECT * FROM `tb_planting`";
        $results = $mysqlx->query($sql);
        $count_all_rows = mysqli_num_rows( $results ); //นับจำนวน Row
        //echo $count_all_rows;

        if ($count_all_rows < $duration_of_planting) { 
            for ($i=$count_all_rows; $i < $duration_of_planting; $i++) { 
            $sql = "INSERT INTO `tb_planting` (`planting_date`, `planting_plan_id`, `planting_note`) VALUES (NULL, '1', '');";
            if ($mysqlx->query($sql) === TRUE) {
            //echo "New record created successfully";
            //echo $i;
            } else {
            //echo "Error: " . $sql . "<br>" . $mysqlx->error;
            } 
            }
        }

        $sql = "SELECT * FROM tb_planting,tb_planting_plan WHERE tb_planting.planting_plan_id = tb_planting_plan.planting_plan_id LIMIT $duration_of_planting;";
        $results = $mysqlx->query($sql);

        while($row = $results->fetch_assoc()) {
            $planting_date=$row["planting_date"];
            $planting_plan_id=$row["planting_plan_id"];
            $planting_plan_name=$row["planting_plan_name"];
            $planting_plan_open_time=$row["planting_plan_open_time"];
            $planting_plan_close_time=$row["planting_plan_close_time"];
            $planting_plan_fan_open_time=$row["planting_plan_fan_open_time"];
            $planting_plan_fan_close_time=$row["planting_plan_fan_close_time"];
            $planting_plan_color=$row["planting_plan_color"];
            $planting_note=$row["planting_note"];

                $date_time1 = new DateTime($planting_plan_open_time);
                $date_time2 = new DateTime($planting_plan_close_time);

                $interval = $date_time1->diff($date_time2); //หาความต่างของเวลา
                $interval_hour = $interval->h;
                $interval_minute = $interval->i;
                $interval_second = $interval->s;

                $fan_date_time1 = new DateTime($planting_plan_fan_open_time);
                $fan_date_time2 = new DateTime($planting_plan_fan_close_time);

                $fan_interval = $fan_date_time1->diff($fan_date_time2); //หาความต่างของเวลา
                $fan_interval_hour = $fan_interval->h;
                $fan_interval_minute = $fan_interval->i;
                $fan_interval_second = $fan_interval->s;
                

    ?>
    
    <tr <?php 
    if ($planting_date == $plan_date_diff) {
        echo "class='table-success'";
    } ?>

    style="border-left: 10px solid <?php echo $planting_plan_color;?>;">
        <td><?php echo $planting_date ?></td>
        <td><?php echo $planting_plan_name ?></td>
        <td><?php echo $planting_plan_open_time ?>น.</td>
        <td><?php echo $planting_plan_close_time ?>น.</td>
        <td><?php if ($interval_hour != 0) {
                    echo $interval_hour . " ชั่วโมง";
                }
                if ($interval_minute != 0) {
                    echo $interval_minute . " นาที";
                }
                if ($interval_second != 0) {
                    echo $interval_second . " วินาที";
                }
 ?></td>
        <td><?php echo $planting_plan_fan_open_time ?>น.</td>
        <td><?php echo $planting_plan_fan_close_time ?>น.</td>
        <td><?php if ($fan_interval_hour != 0) {
                    echo $fan_interval_hour . " ชั่วโมง";
                }
                if ($fan_interval_minute != 0) {
                    echo $fan_interval_minute . " นาที";
                }
                if ($fan_interval_second != 0) {
                    echo $fan_interval_second . " วินาที";
                }
 ?></td>
        <td>

        </td>
        <td>

            <!-- // Note  -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#planting_note<?php echo $planting_date; ?>" <?php if (empty($planting_note)) {
                echo "disabled";
            } ?>>
                <i class="bi bi-sticky"></i>
            </button>

            <!-- // Edit  -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_planting_date<?php echo $planting_date ?>">
                <i class="bi bi-gear"></i>
            </button>


            <!-- Modal ของ edit  -->
<div class="modal fade" id="edit_planting_date<?php echo $planting_date ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ตั้งค่าแพลนของวันที่ <?php echo $planting_date ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET">

            <input type="hidden" class="form-control" id="text1" name="edit_planting_date" value="<?php echo $planting_date ?>" readonly>

            <label class="form-label">แพลนในการปลูก :</label><br>
                    <?php 
                        $sql = " SELECT * FROM tb_planting_plan";
                        $q = mysqli_query( $mysqlx, $sql );
                        echo "<select class='form-control' name='edit_planting_plan_id'>";
                        while( $f = mysqli_fetch_assoc( $q ) ) {
                            if ($planting_plan_id == $f['planting_plan_id']) {
                                echo "<option value='".$f['planting_plan_id']."' selected>".$f['planting_plan_name']."</option>";
                            } else{
                                echo "<option value='".$f['planting_plan_id']."'>".$f['planting_plan_name']."</option>";
                            }
                        }
                        echo "</select>";
                    ?>   
            <label class="form-label">โน้ต :</label><br>
            <input type="text" class="form-control" id="text2" value="<?php echo $planting_note ?>" name="edit_planting_note">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>

        </form>
      </div>
    </div>
  </div>
</div><!--end modal edit -->

<!-- Modal ของ Note  -->
<div class="modal fade" id="planting_note<?php echo $planting_date ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">โน้ตของวันที่ <?php echo $planting_date ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       yay
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">ปิด</button>
      </div>
    </div>
  </div>
</div><!--end modal note -->


        </td>
    </tr>
    <?php
     } 
     ?>

                </tr></tbody>
        </table>

            </div>

            
        </div>
    </div>

    <?php include("js_link.php") ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>