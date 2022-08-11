<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="indexStyle.css">

    <style>
        html2canvas {
            width: 50% !important;
            height: 100% !important;
        }
    </style>
</head>

<body>
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    if (!(filter_input(INPUT_POST, 'from'))) $from = date('2021-01-01');
    else
        $from = filter_input(INPUT_POST, 'from');

    if (!(filter_input(INPUT_POST, 'to'))) $to = date('20y-m-d');

    else
        $to = filter_input(INPUT_POST, 'to');


    ?>

    <section style="flex-direction: column; padding-top:190px;" >
        <article>
            <p style="color:blueviolet; padding-left:42%; margin-top:-60px;font-size:30px">Property Report</p>
        </article>
        <article>
            <p style="font-size:14px; color:dimgray;width:50%;padding-left:50px;margin-top:0px">
                From:
                <?php

                echo $from;

                ?>
                <br>
                To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $to; ?>
            </p>
            <div id="editor">
                <button style="width:70px; margin-top:-25px;margin-left:50px;" onclick="print()">Print</button>
            </div>
            <form class="form" method="post" action="report.php" style="display: flex;align-items:flex-end;flex-direction: column; margin-left:65%;margin-top:-120px;">
                <input type="date" class="input" name="from">
                <input type="date" class="input" name="to">
                <button style="width:70px; padding-top:1px">Show</button>

            </form>
        </article>
        <article class="container" style=" border: 2px solid gray;"id="htmlContent">

            <div style="width: 40%; border-bottom: blueviolet dotted; border-right: blueviolet dotted;padding:50px 100px;">
                <h1 style="color:blueviolet;font-size:30px">Active Listings</h1><br>
                <a style="font-size:30px;color:black;"><small style="font-size: small; color:darkgrey">Up</small>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $total = 0;
                    $active = 0;
                    $percA = 0;
                    if (($from == null) || ($to == null))
                        $query = "SELECT * FROM property";
                    else
                        $query = "SELECT * FROM property where Added_Date BETWEEN '$from' and '$to'";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $total++;
                            if ($row['pro_status'] == 'active') $active++;
                        }
                        $percA = ($active / $total) * 100;
                    } else $percA = 0;

                    echo floor($percA);
                    ?>
                    %
                </a><br>
            </div>

            <div style="    width: 40%; border-bottom: blueviolet dotted;padding:50px 100px; ">
                <h1 style="color:blueviolet;font-size:30px">Closed sales</h1><br>
                <a style="font-size:30px;color:black;"><small style="font-size: small; color:darkgrey">Up</small>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $total = 0;
                    $active = 0;
                    if (($from == null) || ($to == null))
                        $query = "SELECT * FROM requests";
                    else
                        $query = "SELECT * FROM requests where req_date BETWEEN '$from' and '$to'";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $total++;
                            if ($row['req_status'] == 'paid') $active++;
                        }
                        $perc = ($active / $total) * 100;
                    } else $perc = 0;

                    echo floor($perc);
                    ?>
                    %
                </a><br>
            </div>
            <div style=" width:50%; padding:0px 100px;border-right:blueviolet dotted; ">

                <div id="piechart"></div>
            </div>
            <div style=" width: 50%;padding:0px 100px; margin-top:-20px;">
                <h1><a href="#" style="color:blueviolet;font-size:30px">Avarage days on market</a></h1><br>

              
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $total = 0;
                    $active = 0;
                    $perca = 0;
                    $days=0;
                    $avg=0;
                    if (($from == null) || ($to == null))
                        $query = "SELECT * FROM property join requests";
                    else
                        $query = "SELECT * FROM property join requests where Added_Date BETWEEN '$from' and '$to'";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['pro_status'] == 'active')$total++;
                            if (($row['req_status'] == 'paid')&&($row['pro_status'] == 'active')) $active++; 
                            $RqID= $row['RqID'];
                            $start=new DateTime($row['Added_Date']);
                             $queryp = "SELECT * FROM payment where acept_req_id= $RqID";
                             $resultp = mysqli_query($conn, $queryp);
                             if ($resultp->num_rows > 0) {
                                 while ($rowp = mysqli_fetch_assoc($resultp)) {                        
                             $close=new DateTime($rowp['pay_date']);
                             $diff=$close->diff($start)->format("%a");
                             $days=$days+$diff;
                            }
                        }}     if($active!=0) {
                               $avg=($days/$active); 
                               $perca = ($active / $total) * 100;
                    }else $avg=0;
                            } else {$avg=0;$perca=0;}   
                              
                               

                        ?> 

                    <a style="font-size:30px;color:black;"><small style="font-size:20px; color:darkgrey; padding-left:10px"> <?php echo floor($avg); ?>Days</small><br>
                    <a style="font-size:30px;color:black;"><small style="font-size: small; color:darkgrey">Down </small><?php echo floor($perca); ?>
                    %
                </a><br>
                <!--a href="latenotice.php"><small style="color:coral">click to see more</small></a-->
            </div>

            </div>
        </article>
    </section>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                <?php
                $hcount = 0;
                $Acount = 0;
                $vcount = 0;
                $lcount = 0;
                if (($from == null) || ($to == null))
                    $query = "SELECT * FROM property";
                else
                    $query = "SELECT * FROM property where Added_Date BETWEEN '$from' and '$to'";
                $result = mysqli_query($conn, $query);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['pro_category'] == "HOUSE") $hcount++;
                        else if ($row['pro_category'] == "LAND") $lcount++;
                        if ($row['pro_category'] == "APARTMENT") $Acount++;
                        else if ($row['pro_category'] == "VILLA") $vcount++;
                    }
                ?>['Task', 'Hours per Day'],
                    ['Houses', <?php echo "$hcount" ?>],
                    ['Appartments', <?php echo "$Acount" ?>],
                    ['Villas', <?php echo "$vcount" ?>],
                    ['Lands', <?php echo "$lcount" ?>]
                <?php
                } else
                    echo "no prop";
                    $totalP=$hcount+$lcount+$Acount+$vcount;
                    
                     
                ?>

            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'title': 'Properties Category Distribution',
                'width': 450,
                'height': 300,
                'backgroundColor': 'transparent'
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript">
        function print() {


            html2canvas(document.getElementById("htmlContent"), {
                onrendered: function(canvas) {


                    var imgData = canvas.toDataURL("Img/jpeg");
                    var imgWidth = 110;
                    var pageHeight = 295;
                    var imgHeight = canvas.height * imgWidth / canvas.width;
                    var heightLeft = imgHeight;

                    var doc = new jsPDF('p', 'mm');
                    var position = 50;
                    
                    doc.setFontSize(12);
                    var img = new Image()
                    img.src = 'Img/newlogo1.jpeg'
                    doc.addImage(img, 'jpeg', 150, 10, 60, 50);
                    
                    doc.text("Properties Report ", 90, 20);
                    doc.text("from : <?php echo $from; ?>", 20, 30);
                    doc.text("to : <?php echo $to; ?>", 20, 40);
                    doc.text("Active Listings ", 30, 70);
                    doc.text("up to  <?php  echo floor($percA),"%"?>",30,80);
                    doc.text("<?php  echo"compered to the last month" ?>" , 30, 90);

                    doc.text("Closed Sales :", 120, 70);
                    doc.text("up to  <?php  echo floor($perc),"%"?>",120,80);
                    doc.text("<?php  echo"compered to the last month" ?>" , 120, 90);

                    doc.text("Properties Category Distribution :", 30, 120);
                    doc.text("Houses : <?php echo ceil(($hcount/$totalP)*100),"%" ?>", 30, 130);
                    doc.text("Lands  : <?php echo ceil(($lcount/$totalP)*100),"%"?>", 30, 140);
                    doc.text("Appartments :<?php  echo ceil(($Acount/$totalP)*100),"%"?>", 30, 150);
                    doc.text("Villas  :  <?php  echo ceil(($vcount/$totalP)*100),"%"?>",30,160);
               
                 
                
                    doc.text("<?php  echo"compered to the last month" ?>" , 30, 170);

                    doc.text("Avarage Days on Market : ", 120, 120);
                    doc.text("up to  <?php  echo floor($avg),"Days"?>",120,130);
                    doc.text("Down  <?php  echo floor($perca),"%"?>",120,140);
                    doc.text("<?php  echo"compered to the last month" ?>" , 120, 150);
            


                    /*doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;

                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        doc.addPage();
                        doc.addImage(imgData, 'JPEG', 350, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }*/
                    doc.save('propertiesReport.pdf');

                }
            });
        }
    </script>

</body>

</html>