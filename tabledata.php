<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ข้อมูลที่เก็บจากเครื่อง</title>

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
                            <a href="lot_tabledata.php">สรุปข้อมูลจากรอบปลูก</a>
                        </li>
                        <li>
                            <a href="tabledata.php" class="text-success">ข้อมูลที่เก็บจากเครื่อง</a>
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

            <div class="container">
              <table class="table table-hover">
              <thead>
                <tr>
                    <th scope="col">วันที่</th>
                    <th scope="col">อุณหภูมิ ชั้น 1</th>
                    <th scope="col">อุณหภูมิ ชั้น 2</th>
                    <th scope="col">อุณหภูมิ ชั้น 3</th>
                    <th scope="col">ความชื้น ชั้น 1</th>
                    <th scope="col">ความชื้น ชั้น 2</th>
                    <th scope="col">ความชื้น ชั้น 3</th>
                </tr>
            </thead>
                <?php 
                    $sql = "SELECT * FROM `tb_sensor` ORDER BY `tb_sensor`.`save_date_time` DESC";
                    $results = $mysqlx->query($sql);
                    while($row = $results->fetch_assoc()) {
                        $save_date_time=$row["save_date_time"];
                        $temp_1=$row["temp_1"];
                        $temp_2=$row["temp_2"];
                        $temp_3=$row["temp_3"];
                        $humidity_1=$row["humidity_1"];
                        $humidity_2=$row["humidity_2"];
                        $humidity_3=$row["humidity_3"];
                ?>

                <tbody><tr>

                <td><?php echo $save_date_time ?></td>
                <td><?php echo $temp_1 ?></td>
                <td><?php echo $temp_2 ?></td>
                <td><?php echo $temp_3 ?></td>
                <td><?php echo $humidity_1 ?></td>
                <td><?php echo $humidity_2 ?></td>
                <td><?php echo $humidity_3 ?></td>

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