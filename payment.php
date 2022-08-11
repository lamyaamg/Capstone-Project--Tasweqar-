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
    <link rel="stylesheet" href="barstyle.css">

</head>

<body>
<?php


require_once 'DBconect.php';
$conn = db_connect();
$id = intval($_GET['reqid']);
$proid = intval($_GET['proid']);
$stat=$_GET['stat'];
$user=$_GET['user'];
$Ac_ID = GetID();

?>
    
    <article class="hello">
    <div class="ft-modal" id="pay">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                <p>ONLINE PAYMENT</p>
                    
                    <?php if($stat!='approved'){
                        if($stat=='on hold'){ echo " you have to wait acceptance";  }
                        if($stat=='paid'){ echo " This request has already paid";}
                        if($stat=='closed'){ echo " This request has been closed";}

                    }
                   
                        if(($stat==='unpaid')||($stat==='approved')){
                   ?>

                    <form class="form" method="post" action="buyerpayment.php?reqid=<?php echo $id ?>&proid=<?php echo $proid; ?>
                    &stat=<?php echo $stat; ?>&user=<?php echo $user; ?>
                    <?php if($user=='buy') echo '#buyer'; else echo '#seller';?>" style="width: 100%;">
                    <p style="color:gray; font-size:14px">Please enter your card details</p>
                        <article id="details">
                            <label style="padding: 10px;">Card No<a style="color: red;">*</a></label>
                            <input class="input" name="reson"  required style="margin-bottom: -10px;">
                            <label style="padding: 10px;">password<a style="color: red;">*</a></label>
                            <input class="input" name="reson"  type ="password"required type="password">

                        </article>
                        <article style="display:inline-flex;">

                            <a><button type="reset">Reset</button></a>
                            <a onclick="return confirm('Are you sure you want complete payment?');"><button  name="confirm">Confirm</button></a>

                        </article>


                    </form>
                    <?php }?>
                    </div>
                <div class="ft-modal-footer">
                <?php if($user=='buy'){?>
                    <a class="ft-modal-close" href="bayerrequest.php">&#10006;</a>
                <?php }else{?>
                    <a class="ft-modal-close" href="coomitionBell.php">&#10006;</a>
                    <?php }?>
                </div>
            </div>
        </div>


        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>

</body>

</html>