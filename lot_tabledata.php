<?php 
include("connect.php");

//รับค่า
$add_lot_name = $_REQUEST["add_lot_name"];
$add_lot_start_date = $_REQUEST["add_lot_start_date"];
$add_lot_end_date = $_REQUEST["add_lot_end_date"];

if(!empty($add_lot_name) && !empty($add_lot_start_date) && !empty($add_lot_end_date)){

  $insert_sql = "INSERT INTO `tb_lot` (`lot_id`, `lot_name`, `lot_start_date`, `lot_end_date`) VALUES (NULL, '$add_lot_name', '$add_lot_start_date', '$add_lot_end_date');";
  $insert = $mysqlx->query($insert_sql);
  header("Location: lot_tabledata.php");
  //echo "yay";
}

//รับค่า edit
$edit_lot_id = $_REQUEST["edit_lot_id"];
$edit_lot_name = $_REQUEST["edit_lot_name"];
$edit_lot_start_date = $_REQUEST["edit_lot_start_date"];
$edit_lot_end_date = $_REQUEST["edit_lot_end_date"];

if(!empty($edit_lot_id) && !empty($edit_lot_name) && !empty($edit_lot_start_date) && !empty($edit_lot_end_date)){

  $update_sql = "UPDATE `tb_lot` SET `lot_name` = '$edit_lot_name', `lot_start_date` = '$edit_lot_start_date', `lot_end_date` = '$edit_lot_end_date' WHERE `tb_lot`.`lot_id` = '$edit_lot_id';";
  $update = $mysqlx->query($update_sql);
  header("Location: lot_tabledata.php");
}

//รับค่า remove
$remove_lot_id = $_REQUEST["remove_lot_id"];
if(!empty($remove_lot_id)){

  $delete_sql = "DELETE FROM `tb_lot` WHERE `tb_lot`.`lot_id` = '$remove_lot_id'";
  $delete = $mysqlx->query($delete_sql);
  header("Location: lot_tabledata.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>สรุปข้อมูลจากรอบปลูก</title>

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
                    <a href="#SettingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="bi bi-gear"></i> ตั้งค่า</a>
                    <ul class="collapse list-unstyled" id="SettingSubmenu">
                        <li>
                            <a href="plan_setting.php">ตั้งค่าแพลนการปลูก</a>
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
                            <a href="lot_tabledata.php" class="text-success">สรุปข้อมูลจากรอบปลูก</a>
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

                    <button type="button" id="sidebarCollapse" class="btn btn-success"><i class="bi bi-list"></i></button>

                </div>
            </nav>

            <nav class="navbar navbar-light bg-light">
                <div class="">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add_lot">
                    <a>เพิ่มรอบที่ปลูก </a><i class="bi bi-plus-square"></i>
                    </button>

                      <!-- Modal ของ add lot -->
<div class="modal fade" id="add_lot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET">

            <label for="text1" class="form-label">ชื่อ</label><br>
            <input type="text" placeholder="ชื่อ" class="form-control" id="text1" name="add_lot_name">
            
            <label for="text2" class="form-label">วันที่เริ่มปลูก</label><br>
            <input type="date" class="form-control" id="text2" name="add_lot_start_date">

            <label for="text3" class="form-label">วันที่เสร็จสิ้นการปลูก</label><br>
            <input type="date" class="form-control" id="text3" name="add_lot_end_date">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-primary">เพิ่ม</button>

        </form>
      </div>
    </div>
  </div>
</div><!--end modal 1 -->

                </div>
            </nav>

            <div class="container">
              <table class="table table-hover">
              <thead>
                <tr>
                    <th scope="col">รอบที่</th>
                    <th scope="col">วันที่เริ่มปลูก</th>
                    <th scope="col">วันที่เสร็จสิ้นการปลูก</th>
                    <th scope="col">จำนวนวัน</th>
                    <th scope="col"></th>
                </tr>
            </thead>
                <?php 
                    $sql = "SELECT * FROM `tb_lot` ORDER BY `tb_lot`.`lot_id` DESC";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                        $lot_id=$row["lot_id"];
                        $lot_name=$row["lot_name"];
                        $lot_start_date=$row["lot_start_date"];
                        $lot_end_date=$row["lot_end_date"];

                        $start_date = $row["lot_start_date"];
                        $end_date = $row["lot_end_date"];
                        $date_diff = round(abs(strtotime($end_date) - strtotime($start_date)));
                        $date_diff = ($date_diff / 60 / 60 / 24 + 1);

                ?>

                <tbody><tr>

                <td><?php echo $lot_name ?></td>
                <td><?php echo $lot_start_date ?></td>
                <td><?php echo $lot_end_date ?></td>
                <td><?php echo $date_diff ?></td>
                <td>

            <a href="lot_tabledata_month.php?lot_id=<?php echo $lot_id; ?>" class="btn btn-success"  ?>
                <i class="bi bi-file-earmark-bar-graph"></i>
            </a>

                    <!-- // Edit  -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_lot<?php echo $lot_id ?>">
                <i class="bi bi-pencil"></i>
            </button>


            <!-- Modal ของ edit  -->
<div class="modal fade" id="edit_lot<?php echo $lot_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รอบปลูก : <?php echo $lot_name ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET"> 

        <input type="hidden" class="form-control" value="<?php echo $lot_id ?>" name="edit_lot_id">

        <label class="form-label">ชื่อรอบปลูก :</label><br>
        <input type="text" class="form-control" value="<?php echo $lot_name ?>" name="edit_lot_name">

        <label class="form-label">วันที่เริ่มปลูก :</label><br>
        <input type="date" class="form-control"  value="<?php echo $lot_start_date ?>" name="edit_lot_start_date">

        <label class="form-label">วันที่เสร็จสิ้นการปลูก :</label><br>
        <input type="date" class="form-control"  value="<?php echo $lot_end_date ?>" name="edit_lot_end_date">
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>

        </form>
      </div>
    </div>
  </div>
</div><!--end modal edit -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#remove_lot<?php echo $lot_id ?>">
                <i class="bi bi-trash"></i>
            </button>

<!-- Modal ของ remove  -->
<div class="modal fade" id="remove_lot<?php echo $lot_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบ : <?php echo $lot_name ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET"> 

        <input type="hidden" class="form-control" value="<?php echo $lot_id ?>" name="remove_lot_id">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-danger">ยืนยัน</button>

        </form>
      </div>
    </div>
  </div>
</div><!--end modal remove -->

                </td>


                <?php } ?>
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