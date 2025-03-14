<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>เกี่ยวกับผู้จัดทำ</title>

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
                            <a href="tabledata.php">ข้อมูลที่เก็บจากเครื่อง</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="aboutus.php" class="text-success"><i class="bi bi-person-circle"></i> เกี่ยวกับผู้จัดทำ</a>
                </li>

            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-light bg-light">
                    <button type="button" id="sidebarCollapse" class="btn btn-success"><i class="bi bi-list"></i></button>
            </nav>

    <div class="container">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3"><img src="img/009.png" style="width:12rem;"></div>
                    <div class="col-9">
                        <h3>นายธนภัทร แตงฉ่ำ</h3>
                        <h5>( ผู้จัดทำโครงการ )</h5>
                        <h4>ข้อมูล</h4>
                        <h5>รหัสประจำตัวนักศึกษา : 64301281009</h5>
                        <h5>อีเมลล์ : tangcham.thanaphat@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3"><img src="img/020.png" style="width:12rem;"></div>
                    <div class="col-9">
                        <h3>นางสาวจิระจีดา พรหมประสิทธิ์</h3>
                        <h5>( ผู้จัดทำโครงการ )</h5>
                        <h4>ข้อมูล</h4>
                        <h5>รหัสประจำตัวนักศึกษา : 64301281020</h5>
                        <h5>อีเมลล์ : swtn2499@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3"><img src="img/lookmai.png" style="width:12rem;"></div>
                    <div class="col-9">
                        <h3>นางสาววรวรรณ อิ่มวุฒิกุล</h3>
                        <h5>( ผู้จัดทำโครงการ )</h5>
                        <h4>ข้อมูล</h4>
                        <h5>รหัสประจำตัวนักศึกษา : 64301281025</h5>
                        <h5>อีเมลล์ : worawan.0209@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div> 
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3"><img src="img/img_2.png" style="width:12rem;"></div>
                    <div class="col-9">
                        <h3>นายประเสริฐศักดิ์ ศิริภาพ</h3>
                        <h5>( ครูที่ปรึกษาโครงการ )</h5>
                        <h4>ข้อมูล</h4>
                        <h5>อีเมลล์ : prasertsak1@gmail.com</h5>
                    </div>
                </div>
            </div>
        </div> 
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3"><img src="img/img_1.png" style="width:12rem;"></div>
                    <div class="col-9">
                        <h3>นายฉัตรชัย โตวราธรรม</h3>
                        <h5>( ครูที่ปรึกษาวิชาโครงการ )</h5>
                        <h4>ข้อมูล</h4>
                        <h5>อีเมลล์ : ct.like@gmail.com</h5>
                    </div>
                </div>
            </div>
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