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


            <div class="container">
        <?php 
        $start_date = $lot_start_date;
        $end_date = $lot_end_date;

        //เอาข้อมูลของวันทุกวันที่ไม่ซ้ำกัน มาเก็บ

        $sql = "SELECT DISTINCT save_date FROM `tb_sensor` WHERE save_date BETWEEN '$start_date' AND '$end_date' ";
        $results = $mysqlx->query($sql);
        while($row = $results->fetch_assoc()) {
             $c_all_date[] = $row["save_date"];
             $c_count_all_date = count($c_all_date);

        }

            for ($i=0; $i < $c_count_all_date ; $i++) { 

            $sql = "SELECT AVG(temp_1),AVG(temp_2),AVG(temp_3),AVG(humidity_1),AVG(humidity_2),AVG(humidity_3) FROM `tb_sensor` WHERE save_date='$c_all_date[$i]' ";
            $results = $mysqlx->query($sql);
            while($row = $results->fetch_assoc()) {
            $chart_date_numer = $i + 1;

            $labels[] = $chart_date_numer;
            $temp1[] = $row['AVG(temp_1)'];
            $temp2[] = $row['AVG(temp_2)'];
            $temp3[] = $row['AVG(temp_3)'];
            $humidity1[] = $row['AVG(humidity_1)'];
            $humidity2[] = $row['AVG(humidity_2)'];
            $humidity3[] = $row['AVG(humidity_3)'];

                }
            }

            $sql = "SELECT AVG(temp_1),AVG(temp_2),AVG(temp_3),AVG(humidity_1),AVG(humidity_2),AVG(humidity_3) FROM `tb_sensor` WHERE save_date BETWEEN '$start_date' AND '$end_date' ";
             $results = $mysqlx->query($sql);
             while($row = $results->fetch_assoc()) {
             $all_temp1 = $row['AVG(temp_1)'];
             $all_temp2 = $row['AVG(temp_2)'];
             $all_temp3 = $row['AVG(temp_3)'];
             $all_humidity1 = $row['AVG(humidity_1)'];
             $all_humidity2 = $row['AVG(humidity_2)'];
             $all_humidity3 = $row['AVG(humidity_3)'];

        }

            ?>


                <div class="card">
                    <div class="card-body">สรุปข้อมูลการปลูกระหว่างวันที่ <a class="text-success"><?php echo $start_date; ?></a> ถึงวันที่ <a class="text-success"><?php echo $end_date; ?></a> เป็นเวลา <a class="text-success"><?php echo $c_count_all_date; ?></a> วัน</div>
                </div>
                <br>
                <div class="card text-center">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ชั้นที่</th>
                                <th>อุณหภูมิเฉลี่ย</th>
                                <th>ความชื้นเฉลี่ย</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td><?php  echo $all_temp1; ?></td>
                                    <td><?php  echo $all_humidity1; ?></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td><?php  echo $all_temp2; ?></td>
                                    <td><?php  echo $all_humidity2; ?></td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td><?php  echo $all_temp3; ?></td>
                                    <td><?php  echo $all_humidity3; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-6">
                        <div class="card-body"><canvas id="MonthTempChart" width="450" height="200"></canvas></div>
                        </div>

                        <div class="col-6">
                            <div class="card-body"><canvas id="MonthHumidityChart" width="450" height="200"></canvas></div>
                            
                        </div>
                        </div>

                    </div>
                    

                </div>
                
                <br>

                <div class="card">
                    <div class="card-body"> 
                    <center><canvas id="TempChart" width="650" height="400"></canvas></center>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body"> 
                    <center><canvas id="HumidityChart" width="650" height="400"></canvas></center>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
    var ctx = document.getElementById("TempChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=json_encode($labels)?>,
            datasets: [{
                label: 'อุณหภูมิ ชั้นที่ 1',
                data: <?=json_encode($temp1, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(252, 3, 198, 1)',
                ],
                borderColor: [
                    'rgba(252, 3, 198,1)',
                ],
                tension: 0.5,
                borderWidth: 3
            },
            {
                label: 'อุณหภูมิ ชั้นที่ 2',
                data: <?=json_encode($temp2, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(252, 186, 3, 1)',
                ],
                borderColor: [
                    'rgba(252, 186, 3,1)',
                ],
                tension: 0.5,
                borderWidth: 3
            },
            {
                label: 'อุณหภูมิ ชั้นที่ 3',
                data: <?=json_encode($temp3, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(3, 190, 252, 1)',
                ],
                borderColor: [
                    'rgba(3, 190, 252,1)',
                ],
                tension: 0.5,
                borderWidth: 3
            }],

        },

        options: {
            scales: {
                y: {
        display: true,
        title: {
          display: true,
          text: 'อุณหภูมิเฉลี่ย'
        },
        suggestedMin: 20,
        suggestedMax: 40,
        ticks: {
          stepSize: 1
        }
      }
            },
             responsive: true,
             title: {
                display: false,
                text: 'อุณหภูมิ'
            }
        }
    });
    </script>

    <script>
    var ctx = document.getElementById("HumidityChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?=json_encode($labels)?>,
            datasets: [{
                label: 'ความชื้นสัมพัทธ์ ชั้นที่ 1',
                data: <?=json_encode($humidity1, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(252, 3, 198, 1)',
                ],
                borderColor: [
                    'rgba(252, 3, 198,1)',
                ],
                tension: 0.5,
                borderWidth: 3
            },
            {
                label: 'ความชื้นสัมพัทธ์ ชั้นที่ 2',
                data: <?=json_encode($humidity2, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(252, 186, 3, 1)',
                ],
                borderColor: [
                    'rgba(252, 186, 3,1)',
                ],
                tension: 0.5,
                borderWidth: 3
            },
            {
                label: 'ความชื้นสัมพัทธ์ ชั้นที่ 3',
                data: <?=json_encode($humidity3, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(3, 190, 252, 1)',
                ],
                borderColor: [
                    'rgba(3, 190, 252,1)',
                ],
                tension: 0.5,
                borderWidth: 3
            }],

        },

        options: {
            scales: {
                y: {
        display: true,
        title: {
          display: true,
          text: 'ความชื้นสัมพัทธ์เฉลี่ย'
        },
        suggestedMin: 40,
        suggestedMax: 100,
        ticks: {
          stepSize: 1
        }
      }
            },
             responsive: true,
             title: {
                display: true,
                text: ''
            }
        }
    });
    </script>



    <script>
        var ctx = document.getElementById("MonthTempChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["อุณหภูมิเฉลี่ย <?php echo $c_count_all_date; ?> วัน"],
                datasets: [{
                    label: 'ชั้นที่ 1',
                    data: [<?php echo $all_temp1; ?>],
                    backgroundColor: [
                        'rgba(252, 3, 198, 1)',
                    ],
                    borderColor: [
                        'rgba(252, 3, 198, 1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'ชั้นที่ 2',
                    data: [<?php echo $all_temp2; ?>],
                    backgroundColor: [
                        'rgba(252, 186, 3, 1)',
                    ],
                    borderColor: [
                        'rgba(252, 186, 3, 1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'ชั้นที่ 3',
                    data: [<?php echo $all_temp3; ?>],
                    backgroundColor: [
                        'rgba(3, 190, 252,1)',
                    ],
                    borderColor: [
                        'rgba(3, 190, 252,1)',
                    ],
                    borderWidth: 1
                },
                ]
            },

            options: {
            scales: {
                y: {
        display: true,
        title: {
          display: true,
          text: 'อุณหภูมิเฉลี่ย'
        },
        suggestedMin: 20,
        suggestedMax: 40,
        ticks: {
          stepSize: 1
        }
      }
            },
             responsive: false,
             title: {
                display: true,
                text: ''
            }
        }
    });
        </script>

        <script>
        var ctx = document.getElementById("MonthHumidityChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["ความชื้นสัมพัทธ์เฉลี่ย <?php echo $c_count_all_date; ?> วัน"],
                datasets: [{
                    label: 'ชั้นที่ 1',
                    data: [<?php echo $all_humidity1; ?>],
                    backgroundColor: [
                        'rgba(252, 3, 198, 1)',
                    ],
                    borderColor: [
                        'rgba(252, 3, 198, 1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'ชั้นที่ 2',
                    data: [<?php echo $all_humidity2; ?>],
                    backgroundColor: [
                        'rgba(252, 186, 3, 1)',
                    ],
                    borderColor: [
                        'rgba(252, 186, 3, 1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'ชั้นที่ 3',
                    data: [<?php echo $all_humidity3; ?>],
                    backgroundColor: [
                        'rgba(3, 190, 252,1)',
                    ],
                    borderColor: [
                        'rgba(3, 190, 252,1)',
                    ],
                    borderWidth: 1
                },
                ]
            },

            options: {
            scales: {
                y: {
        display: true,
        title: {
          display: true,
          text: 'ความชื้นสัมพัทธ์เฉลี่ย'
        },
        suggestedMin: 40,
        suggestedMax: 100,
        ticks: {
          stepSize: 1
        }
      }
            },
             responsive: false,
             title: {
                display: true,
                text: ''
            }
        }
    });
        </script>

        <br>
        <div class="card">
            <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th >ลำดับ</th>
                    <th >วันที่</th>
                    <th >อุณหภูมิ 1</th>
                    <th >อุณหภูมิ 2</th>
                    <th >อุณหภูมิ 3</th>
                    <th >ความชื้น 1</th>
                    <th >ความชื้น 2</th>
                    <th >ความชื้น 3</th>
                </tr>
            </thead>
                <tbody><tr>
    <?php 
    
     //echo "Date Diff = ".DateDiff("2008-08-01","2008-08-31")."<br>";
     //echo "Time Diff = ".TimeDiff("00:00","19:00")."<br>";
     //echo "Date Time Diff = ".DateTimeDiff("2008-08-01 00:00","2008-08-01 19:00")."<br>";
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

    </tr>
</tbody>
</table>
    <div class="card-body"><a href="report.php?lot_id=<?php echo $lot_id; ?>" class="btn btn-success"  ?>
                <i class="bi bi-file-earmark-spreadsheet"></i>
            ส่งออกข้อมูลเป็น EXCEL</a></div>
        
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