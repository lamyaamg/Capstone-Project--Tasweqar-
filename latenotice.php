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
    $count=0;
    if (!(filter_input(INPUT_POST, 'from'))) $from = date('2021-01-01');
    else
        $from = filter_input(INPUT_POST, 'from');

    if (!(filter_input(INPUT_POST, 'to'))) $to = date('20y-m-d');

    else
        $to = filter_input(INPUT_POST, 'to');

    ?>

    <section style="flex-direction: column; padding-top:190px;" >
        <article>
            <p style="color:blueviolet; padding-left:39%; margin-top:-60px;font-size:30px">Late Notice Report</p>
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
            <form class="form" method="post" action="latenotice.php" style="display: flex;align-items:flex-end;flex-direction: column; margin-left:65%;margin-top:-120px;">
                <input type="date" class="input" name="from">
                <input type="date" class="input" name="to">
                <button style="width:70px; padding-top:1px">Show</button>

            </form>
        </article>
        <article class="container"id="htmlContent">
       
        <table  class="display table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:rgb(250, 250, 255,.8);">
                <thead>
                    <tr>
                        
                        <th>Buyer Name</th>
                        <th>Property ID</th>
                        <th>Payment status</th>
                        <th>Total Amount</th>
                        <th>Commission Amount</th>
                        <th>Total commission paid</th>
                        
                    </tr>
                </thead>
                <tbody>
                                <?php

                                $Ac_ID = GetID();
                                
                                $query = "SELECT * FROM requests where req_status='approved' and req_date BETWEEN '$from' and '$to'";

                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $reqid=$row['RqID'];
                                        $sellID=$row['sell_ID'];
                                        $proID=$row['pro_ID'];
                                        $payquery = "SELECT * FROM property where sell_ID = $sellID and pro_ID=$proID";
                                        
                                $resultp = mysqli_query($conn, $payquery);
                                if ($resultp->num_rows > 0) {
                                    while ($rowp = mysqli_fetch_assoc($resultp)) {
                                        $count++;
                                    ?>
                                
                                        <tr style="background-color:rgb(255, 127, 80,.0995);">
                                            <td><?php echo $row["fromUser"] ?> </td>
                                            <td><a style="color: coral; text-decoration:none" a href="#">ID: <?php echo $row["pro_ID"] ?> </td>
                                            <td style="color: red;"> Unpaid</td>
                                            <td> <?php echo $rowp["pro_price"]?> </p></td>
                                            <td> <?php echo $rowp["pro_price"]*.025 ?> </p></td>
                                            <td> <?php echo "0" ?> </td>
                                        
                                        </tr>



                                    <?php
                                    }
                                }
                                    }
                                } else {
                                    ?>
                        <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 15%;">
                            <p style=" padding-right: 20%; font-size:12px">No request found</p>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
                    
            </div>
        </article>
        <p style="color:slategrey; margin-left:6%; font-size:14px">The total number of unpaid commission from <?php echo date("D, d M Y", strtotime($from))," to ",date("D, d M Y", strtotime($to)) ," is ",$count?> </p>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript">
        function print() {
     

            html2canvas(document.getElementById("htmlContent"), {
                onrendered: function(canvas) {
                    

                        var imgData = canvas.toDataURL("Img/JPEG");
                        var imgWidth = 170;
                        var pageHeight = 295;
                        var imgHeight = canvas.height * imgWidth / canvas.width;
                        var heightLeft = imgHeight;

                        var doc = new jsPDF('p', 'mm');
                       
                    var position = 70;
                    doc.setFontSize(9);
                    var img = new Image();
                    img.src = 'Img/newlogo1.jpeg';
                    doc.addImage(img, 'jpeg', 150, 10, 60, 50);

                    doc.text("Properties Report", 90, 20);
                    doc.text("from : <?php echo $from; ?>", 20, 30);
                    doc.text("to : <?php echo $to; ?>", 20, 40);
                    doc.addImage(imgData, 'JPEG', 20, position, imgWidth, imgHeight);
                    doc.text("The tatal number of unpaied commission from <?php echo date("D, d M Y", strtotime($from))," to ",date("D, d M Y", strtotime($to)) ," is ",$count?>",20,position+50);
                    heightLeft -= pageHeight;

                        while (heightLeft >= 0) {
                            position = heightLeft - imgHeight;
                            doc.addPage();
                            doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                            heightLeft -= pageHeight;
                        }
                        doc.save('LateNoticeReport.pdf');
                    
                
                }
            });
        }
    </script>
</body>

</html>