<?php 
include("connect.php");

//รับค่า
$edit_planting_plan_id = $_REQUEST["edit_planting_plan_id"];
$edit_planting_plan_name = $_REQUEST["edit_planting_plan_name"];
$edit_planting_plan_open_time = $_REQUEST["edit_planting_plan_open_time"];
$edit_planting_plan_close_time = $_REQUEST["edit_planting_plan_close_time"];
$edit_planting_plan_fan_open_time = $_REQUEST["edit_planting_plan_fan_open_time"];
$edit_planting_plan_fan_close_time = $_REQUEST["edit_planting_plan_fan_close_time"];
$edit_planting_plan_color = $_REQUEST["edit_planting_plan_color"];

if(!empty($edit_planting_plan_id) && !empty($edit_planting_plan_name) && !empty($edit_planting_plan_open_time) && !empty($edit_planting_plan_close_time) && !empty($edit_planting_plan_fan_open_time) && !empty($edit_planting_plan_fan_close_time)  && !empty($edit_planting_plan_color)) {

  $update_sql = "UPDATE `tb_planting_plan` SET `planting_plan_name` = '$edit_planting_plan_name', `planting_plan_open_time` = '$edit_planting_plan_open_time',  `planting_plan_close_time` = '$edit_planting_plan_close_time', `planting_plan_fan_open_time` = '$edit_planting_plan_fan_open_time',  `planting_plan_fan_close_time` = '$edit_planting_plan_fan_close_time', `planting_plan_color` = '$edit_planting_plan_color' WHERE `tb_planting_plan`.`planting_plan_id` = '$edit_planting_plan_id';";
  $update = $mysqlx->query($update_sql);
  header("Location: planting_plan_setting.php");
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
                            <a href="plan_setting.php">ตั้งค่าแพลนการปลูก</a>
                        </li>
                        <li>
                            <a href="planting_plan_setting.php" class="text-success">ตั้งค่ารูปแบบแพลนการปลูก</a>
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
                            <a href="tabledata.php">ข้อมูลที่เก็บจากเครื่อง</a>
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
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-success">
                        <i class="bi bi-list"></i>
                    </button>

                </div>
            </nav>

            <div class="container">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">รหัสแพลน</th>
                    <th scope="col">ชื่อแพลน</th>
                    <th scope="col">เวลาเปิดไฟ</th>
                    <th scope="col">เวลาปิดไฟ</th>
                    <th scope="col">จำนวนชั่วโมงที่เปิดไฟ</th>
                    <th scope="col">เวลาเปิดพัดลม</th>
                    <th scope="col">เวลาปิดพัดลม</th>
                    <th scope="col">จำนวนชั่วโมงที่เปิดพัดลม</th>
                    <th scope="col">สี</th>
                    <th scope="col"></th>
                </tr>
            </thead>
                <tbody><tr>
    <?php

        $sql = "SELECT * FROM tb_planting_plan";
        $results = $mysqlx->query($sql);

        while($row = $results->fetch_assoc()) {
            $planting_plan_id=$row["planting_plan_id"];
            $planting_plan_name=$row["planting_plan_name"];
            $planting_plan_open_time=$row["planting_plan_open_time"];
            $planting_plan_close_time=$row["planting_plan_close_time"];
            $planting_plan_fan_open_time=$row["planting_plan_fan_open_time"];
            $planting_plan_fan_close_time=$row["planting_plan_fan_close_time"];
            $planting_plan_color=$row["planting_plan_color"];

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
    <tr style="border-left: 10px solid <?php echo $planting_plan_color; ?>;">
        <td><?php echo $planting_plan_id ?></td>
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
         <a style="background-color:<?php echo $planting_plan_color; ?>;"><?php echo $planting_plan_color; ?></a>   
        </td>
        <td>

            <!-- // Edit  -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_planting_plan<?php echo $planting_plan_id ?>">
                <i class="bi bi-gear"></i>
            </button>

            


            <!-- Modal ของ edit  -->
<div class="modal fade" id="edit_planting_plan<?php echo $planting_plan_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ตั้งค่าแพลนที่ <?php echo $planting_plan_id ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET">

            <input type="hidden" class="form-control" id="text1" name="edit_planting_plan_id" value="<?php echo $planting_plan_id ?>" readonly>

            <label class="form-label">ชื่อแพลน :</label><br>
            <input type="text" class="form-control" id="text2" value="<?php echo $planting_plan_name ?>" name="edit_planting_plan_name">

            <label class="form-label">เวลาเปิดไฟ :</label><br>
            <input type="time" class="form-control" id="text2" value="<?php echo $planting_plan_open_time ?>" name="edit_planting_plan_open_time">

            <label class="form-label">เวลาปิดไฟ :</label><br>
            <input type="time" class="form-control" id="text3" value="<?php echo $planting_plan_close_time ?>" name="edit_planting_plan_close_time">

             <label class="form-label">เวลาเปิดพัดลม :</label><br>
            <input type="time" class="form-control" id="text2" value="<?php echo $planting_plan_fan_open_time ?>" name="edit_planting_plan_fan_open_time">

            <label class="form-label">เวลาปิดพัดลม :</label><br>
            <input type="time" class="form-control" id="text3" value="<?php echo $planting_plan_fan_close_time ?>" name="edit_planting_plan_fan_close_time">

            <label class="form-label">สี :</label><br>
            <input type="color" class="form-control" id="text3" value="<?php echo $planting_plan_color ?>" name="edit_planting_plan_color">
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