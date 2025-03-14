<?php 
include("connect.php");

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

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

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
                    <a href="index.php" class="text-success"><i class="bi bi-speedometer"></i> Dashboard</a>
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
                            <a href="lot_tabledata.php">สรุปข้อมูลจจากรอบปลูก</a>
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

            <div class="container">
              <div id="connect_status"></div><br>
              <div class="row">

                <!--- card ชั้น 3 --->

                <div class="col-sm-12 col-md-12 col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="bi bi-box"></i> ชั้นที่ 3</h5>
                      <hr>
                      <div class="row"> <!--- row --->

                      <div class="col"><!--- col 1 led --->
                        <center><a class="text-secondary"><i class="bi bi-lightbulb"></i> หลอดไฟ</a></center>
                        <center><div id="led_3"></div></center>
                      </div>  <!---end col 1 --->

                      <div class="col"><!--- col 2 fan --->
                        <center><a class="text-secondary"><i class="bi bi-fan"></i> พัดลม</a></center>
                        <center><div id="fan_3"></div></center>
                      </div>  <!---end col 2 --->

                      <div class="col"><!--- col 3 temp --->
                        <center><a class="text-secondary"><i class="bi bi-thermometer-half"></i> อุณหภูมิ</a></center>
                        <center><div id="temp_3"></div></center>
                      </div>  <!---end col 3 --->

                      <div class="col"><!--- col 4 humidity --->
                        <center><a class="text-secondary"><i class="bi bi-moisture"></i> ความชื้น</a></center>
                        <center><div id="humidity_3"></div></center>
                      </div>  <!---end col 4 --->

                      </div>  <!---end row --->
                    </div>
                  </div>

                  <br>
                </div>
                <!---end card ชั้นที่ 3 --->

                <!--- card ชั้น 2 --->

                <div class="col-sm-12 col-md-12 col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="bi bi-box"></i> ชั้นที่ 2</h5>
                      <hr>
                      <div class="row"> <!--- row --->

                      <div class="col"><!--- col 1 led --->
                        <center><a class="text-secondary"><i class="bi bi-lightbulb"></i> หลอดไฟ</a></center>
                        <center><div id="led_2"></div></center>
                      </div>  <!---end col 1 --->

                      <div class="col"><!--- col 2 fan --->
                        <center><a class="text-secondary"><i class="bi bi-fan"></i> พัดลม</a></center>
                        <center><div id="fan_2"></div></center>
                      </div>  <!---end col 2 --->

                      <div class="col"><!--- col 3 temp --->
                        <center><a class="text-secondary"><i class="bi bi-thermometer-half"></i> อุณหภูมิ</a></center>
                        <center><div id="temp_2"></div></center>
                      </div>  <!---end col 3 --->

                      <div class="col"><!--- col 4 humidity --->
                        <center><a class="text-secondary"><i class="bi bi-moisture"></i> ความชื้น</a></center>
                        <center><div id="humidity_2"></div></center>
                      </div>  <!---end col 4 --->

                      </div>  <!---end row --->
                    </div>
                  </div>

                  <br>
                </div>
                <!---end card ชั้นที่ 2 --->

                <!--- card ชั้นที่ 1 --->

                <div class="col-sm-12 col-md-12 col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="bi bi-box"></i> ชั้นที่ 1</h5>
                      <hr>
                      <div class="row"> <!--- row --->

                      <div class="col"><!--- col 1 led --->
                        <center><a class="text-secondary"><i class="bi bi-lightbulb"></i> หลอดไฟ</a></center>
                        <center><div id="led_1"></div></center>
                      </div>  <!---end col 1 --->

                      <div class="col"><!--- col 2 fan --->
                        <center><a class="text-secondary"><i class="bi bi-fan"></i> พัดลม</a></center>
                        <center><div id="fan_1"></div></center>
                      </div>  <!---end col 2 --->

                      <div class="col"><!--- col 3 temp --->
                        <center><a class="text-secondary"><i class="bi bi-thermometer-half"></i> อุณหภูมิ</a></center>
                        <center><div id="temp_1"></div></center>
                      </div>  <!---end col 3 --->

                      <div class="col"><!--- col 4 humidity --->
                        <center><a class="text-secondary"><i class="bi bi-moisture"></i> ความชื้น</a></center>
                        <center><div id="humidity_1"></div></center>
                      </div>  <!---end col 4 --->

                      </div>  <!---end row --->
                    </div>
                  </div>

                  <br>
                </div>
                <!---end card ชั้น 1 --->

                <!--- card 4 --->
                <div class="col col-sm-12 col-lg-4">
                  

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><i class="bi bi-droplet"></i> ปั้มน้ำ</h5>
                      <hr>
                      <div class="row"> <!--- row --->

                      <div class="col">
                        <h4><div id="pump"></div></h4>
                      </div>  <!---end col 1 --->

                      </div>  <!---end row --->
                    </div>
                  </div>

                <br>
                </div>
                <!---end card 4 --->

              
              </div>

              <br>

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

    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที

        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=0",
                async:false,
                success:function(getData){
                    $("div#connect_status").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=1",
                async:false,
                success:function(getData){
                    $("div#temp_1").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=2",
                async:false,
                success:function(getData){
                    $("div#temp_2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=3",
                async:false,
                success:function(getData){
                    $("div#temp_3").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=4",
                async:false,
                success:function(getData){
                    $("div#humidity_1").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=5",
                async:false,
                success:function(getData){
                    $("div#humidity_2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"data=6",
                async:false,
                success:function(getData){
                    $("div#humidity_3").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;

        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=1",
                async:false,
                success:function(getData){
                    $("div#led_1").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=2",
                async:false,
                success:function(getData){
                    $("div#led_2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=3",
                async:false,
                success:function(getData){
                    $("div#led_3").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=4",
                async:false,
                success:function(getData){
                    $("div#pump").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=5",
                async:false,
                success:function(getData){
                    $("div#fan_1").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=6",
                async:false,
                success:function(getData){
                    $("div#fan_2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata_relay.php",
                data:"data=7",
                async:false,
                success:function(getData){
                    $("div#fan_3").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;


    },1000);    
});
</script>

</body>

</html>