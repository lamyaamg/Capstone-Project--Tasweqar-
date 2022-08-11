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
    <script src="js/modernizr/modernizr.min.js"></script>
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
    $count = 0;
    if (!(filter_input(INPUT_POST, 'from'))) $from = date('2021-01-01');
    else
        $from = filter_input(INPUT_POST, 'from');

    if (!(filter_input(INPUT_POST, 'to'))) $to = date('20y-m-d');

    else
        $to = filter_input(INPUT_POST, 'to');

    ?>

    <section style="flex-direction: column; padding-top:190px;" id="htmlContent">
        <article>
            <p style="color:blueviolet; padding-left:36%; margin-top:-60px;font-size:30px">Paid Commission Report</p>
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
                <button style="width:70px; margin-top:-25px;margin-left:70px;" onclick="print()">Print</button>
            </div>
            <form class="form" method="post" action="paiedReport.php" style="display: flex;align-items:flex-end;flex-direction: column; margin-left:65%;margin-top:-120px;">
                <input type="date" class="input" name="from">
                <input type="date" class="input" name="to">
                <button style="width:70px; padding-top:1px; margin-left:20px">Show</button>

            </form>
        </article>
        <article class="container">

        </article>

        <?php
        $Hcount = 0;
        $Lcount = 0;
        $Vcount = 0;
        $Acount = 0;
        $Hcom = 0;
        $Lcom = 0;
        $Vcom = 0;
        $Acom = 0;
        $tatal = 0;
        $query = "SELECT * FROM requests where req_status='paid' and req_date BETWEEN '$from' and '$to'";

        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $pid = $row['pro_ID'];
                $user = $row['fromUser'];
                $payquery = "SELECT * FROM property where pro_ID = $pid";

                $resultp = mysqli_query($conn, $payquery);
                if ($resultp->num_rows > 0) {
                    while ($rowp = mysqli_fetch_assoc($resultp)) {
                        if ($rowp['pro_category'] == 'HOUSE') {
                            $Hcount++;
                            $tatal++;
                            $Hcom = $Hcom + $rowp['pro_price'] * .025;
                        } else                         
                        if ($rowp['pro_category'] == 'LAND') {
                            $Lcount++;
                            $tatal++;
                            $Lcom = $Lcom + ($rowp['pro_price'] * .025);
                        } else 
                        if ($rowp['pro_category'] == 'VILLA') {
                            $Vcount++;
                            $tatal++;
                            $Vcom = $Vcom + ($rowp['pro_price'] * .025);
                        } else 
                        if ($rowp['pro_category'] == 'APARTMENT') {
                            $Acount++;
                            $tatal++;
                            $Acom = $Acom + ($rowp['pro_price'] * .025);
                        }
                    }
                }
            }
        }

        if ($Hcount != 0)   $Hrate = ($Hcount / $tatal) * 100 / 100;
        else   $Hrate = 0;
        if ($Lcount != 0)   $Lrate = ($Lcount / $tatal) * 100 / 100;
        else  $Lrate = 0;
        if ($Vcount != 0)   $Vrate = ($Vcount / $tatal) * 100 / 100;
        else  $Vrate = 0;
        if ($Acount != 0)   $Arate = ($Acount / $tatal) * 100 / 100;
        else  $Arate = 0;
        ?>

        </p>
        <div style="    display: flex; align-items: center; justify-content: center; flex-wrap: nowrap; flex-direction: row;">
            <div style=" width:50%; padding:0px 10px;">
                <div id="piechart"></div>
            </div>
            <table id="table" class="display table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:rgb(250, 250, 255,.8);">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>HOUSE</th>
                        <th>LAND</th>
                        <th>APPARTMENT</th>
                        <th>VILLA</th>


                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color:rgb(255, 127, 80,.0995);">
                        <td>Commission Rate</td>
                        <?php $tatalcom = $Hcom + $Lcom + $Vcom + $Acom;
                       ?>
                        <td><?php  if($tatalcom !=0)echo  ceil($Hcom / $tatalcom * 100); else echo 0 ?> %</td>
                        <td> <?php if($tatalcom !=0)echo ceil($Lcom / $tatalcom * 100); else echo 0 ?> %</td>
                        <td> <?php if($tatalcom !=0) echo ceil($Acom / $tatalcom * 100); else echo 0 ?> %</td>
                        <td><?php  if($tatalcom !=0)echo  ceil($Vcom / $tatalcom * 100); else echo 0 ?> %</td>

                    </tr>
                    <tr style="background-color:rgb(255, 127, 80,.0995);">
                        <td>Tatal Commission </td>
                        <td><?php echo $Hcom ?> SAR</td>
                        <td> <?php echo $Lcom ?> SAR</td>
                        <td> <?php echo $Acom ?> SAR</td>
                        <td><?php echo  $Vcom ?> SAR</td>

                    </tr>
                </tbody>
            </table>

        </div>
        <p id="stat" style="color:slategrey; margin-left:16%; font-size:15px; width:80%">The highest paid commission rate was
            <?php
            if ($Hcount != 0)   $Hrate = ($Hcom / $tatalcom * 100);
            else   $Hrate = 0;
            if ($Lcount != 0)   $Lrate = ($Lcom / $tatalcom * 100);
            else  $Lrate = 0;
            if ($Vcount != 0)   $Vrate = ($Acom / $tatalcom * 100);
            else  $Vrate = 0;
            if ($Acount != 0)   $Arate = ($Vcom / $tatalcom * 100);
            else  $Arate = 0;
            $R = array('Houses' => $Hrate, 'Lands' => $Lrate, 'Villas' => $Vrate, 'Appartments' => $Arate);
            rsort($R);

            $maxcom = array($Hcom => "Houses", $Lcom => "Lands", $Vcom => "Villas", $Acom => "Appartments");
            krsort($maxcom);
            $macom = array($Hcom, $Lcom, $Vcom, $Acom);
            rsort($macom);


            ?>
            <?php echo ceil($R[0]), "% for", $maxcom[$macom[0]]; ?>,where the total paid commission combined was <?php echo ceil($macom[0]), " "; ?>SAR
            .followed by <?php echo  $maxcom[$macom[1]]; ?>, the total was <?php echo ceil($macom[1]), " "; ?>SAR making it <?php echo ceil($R[1]), "% "; ?>
            .Then <?php echo ceil($R[2]), "% "; ?> with tatal of <?php echo ceil($macom[2]), " SAR for  ", $maxcom[$macom[2]]; ?>  and <?php echo ceil($R[3]), "% for ", $maxcom[$macom[3]]; ?>
            with <?php echo ceil($macom[3]), " "; ?> SAR total commission paid

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
                ['Task', 'Hours per Day'],
                ['Houses', <?php echo  "$Hcom"; ?>],
                ['Appartments', <?php echo "$Acom" ?>],
                ['Villas', <?php echo "$Vcom" ?>],
                ['Lands', <?php echo "$Lcom" ?>]


            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'title': 'Paied commissions',
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


            html2canvas(document.getElementById("table"), {
                onrendered: function(canvas) {


                    var imgData = canvas.toDataURL("Img/jpeg");
                    var imgWidth = 210;
                    var pageHeight = 295;
                    var imgHeight = canvas.height * imgWidth / canvas.width;
                    var heightLeft = imgHeight;

                    var doc = new jsPDF('p', 'mm');

                    var position = 150;
                    doc.setFontSize(12);
                    var img = new Image()
                    img.src = 'Img/newlogo1.jpeg'
                    doc.addImage(img, 'jpeg', 150, 10, 60, 50);

                    doc.text("Paied commission Report", 90, 20);
                    doc.text("from : <?php echo $from; ?>", 20, 30);
                    doc.text("to : <?php echo $to; ?>", 20, 40);
                    doc.text("                                        commission rate                Tatal commission    ", 30, 70);
                    doc.text("     Houses  :                        <?php echo ceil($Hrate), "%                                 ", $Hcom ?> SAR ", 30, 80);
                    doc.text("     Lands    :                        <?php echo ceil($Lrate), "%                                 ", $Lcom ?> SAR ", 30, 90);
                    doc.text("     Appartments  :               <?php echo ceil($Acom/$tatalcom*100), "%                                ", $Acom ?> SAR ", 30, 100);
                    doc.text("     Villas     :                        <?php echo ceil($Vrate), "%                                  ", $Vcom ?> SAR ", 30, 110);
                    doc.text(" The highest paid commission rate was <?php echo ceil($R[0]), "% for", $maxcom[$macom[0]]; ?>,where the total paid "
                        ,30, 150);
                    doc.text("commission combined was <?php echo ceil($macom[0]), " "; ?>SAR .followed by <?php echo  $maxcom[$macom[1]]; ?>, the total was", 30, 160);
                    doc.text("<?php echo ceil($macom[1]), " "; ?>SAR making it <?php echo ceil($R[1]), "% "; ?>.Then <?php echo ceil($R[2]), "% "; ?> with total of <?php echo ceil($macom[2]), "SAR for  "?><?php echo $maxcom[$macom[2]]; ?> and", 30, 170);
                    doc.text(" <?php echo ceil($R[3]), "% for ", $maxcom[$macom[3]]; ?>with <?php echo ceil($macom[3]), " "; ?> SAR total commission paid", 30, 180);
                  
                    // doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;

                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        doc.addPage();
                        doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }
                    doc.save('paiedCommissionReport.pdf');

                }



            });
        }
    </script>
</body>

</html>