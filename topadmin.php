<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />

    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="barstyle.css">

    <style>
        .menu li {
            width: auto;

        }

        .menu li a:hover {
            width: auto;
            color: blueviolet;

            text-decoration: none;

        }

        .sub {
            display: none;

        }

        .sub li a {
            color: gray;
            font-family: 'Times New Roman', Times, serif;
        }

        ul li:hover .sub {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-content: flex-start;
            align-items: stretch;
            width: 350px;
            padding: auto;
            float: left;
            position: absolute;
            background-color: rgba(255, 255, 255, .961);
            border-top: 2px solid rgba(252, 131, 87, 0.616);
            border-bottom: 2px solid rgba(252, 131, 87, 0.616);

        }

        .sub li a {
            padding: 13px;
            font-size: 14px;
            width: 350px;
            border-bottom: 1px solid gray;
            text-decoration: none;
        }

        .sub li a:hover {
            color: coral;

            text-decoration: none;
        }
    </style>

</head>
<?php
require_once 'DBconect.php';
$conn = db_connect();
$Ac_ID = GetID();
$User_Name = $_SESSION["name"];
?>

<body style="  background-image: url('Webbuble.png');position:contain;
  background-repeat:no-repeat;background-size:cover">
    <!-- start header -------------------------->
    <header style="margin-left: 0%; width:100%;height:140px; background-color:#fff;padding-top:40px;">
        <div class="container" style="display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    min-width: 97px;
    flex-direction: row;
    flex-wrap: nowrap;
    width:100%;
">
            <nav>
                <ul class="menu">
                    <li><a class="btn-link" href="manageprop.php">Manage Properties</a></li>
                    <li><a class="btn-link" href="adcomplaint.php">Complaints</a></li>
                    <li><a href="manageRequests.php" class="btn-link">Manage Requests</a></li>
                    <?php if ($_SESSION["poss"] != "manager") { ?>
                        <li> <a href="#" class="btn-link"> </a></li>
                    <?php } else { ?>
                        <li><a href="report.php" class="btn-link">Reports</a>

                            <ul class="sub">
                                <li><a href="report.php">Property Report </a></li>
                                <li><a href="latenotice.php">Late Notice Report </a></li>
                                <!---->
                                <li><a href="paiedReport.php">Paid Commission Report</a></li>

                            </ul>

                        </li>
                    <?php } ?>

                    <li style="width: 500px; padding-left:30px; margin-top:-60px"><a href="admin.php"><img src="img/newlogo1.jpeg" alt="logo" width="270" height="150" /></a></li>
                    <li style="padding-right: 60px;"><a class="btn-link" href="#">Manage Accounts</a>

                        <ul class="sub">
                            <?php if ($_SESSION["poss"] == "employee") { ?>
                                <li><a href="customers.php">Users Accounts</a></li>
                            <?php } else { ?>

                                <li><a href="customers.php">Users Accounts</a></li>

                                <li><a href="manageAcount.php">Employees Accounts</a></li>
                            <?php } ?>
                        </ul>

                    </li>
                    <li style="margin-left: -50px;"><a href="admAcount.php" class="btn-link">Profile</a></li>
                    <li><a href="logout.php" class="btn-link">Logout</a></li>
                    <li><a class="btn-link" style="width:140px; color:#8c52ff">Hello <?php echo  $User_Name ?></a></li>

                </ul>
            </nav>



    </header>