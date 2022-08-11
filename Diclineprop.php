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


</head>
<body >
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    ?>
    <section style="flex-direction: column; padding-top:190px;">
    
    

        <div class="ft-modal" id="reject">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>REJECT PROPERTY</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $id = intval($_GET['propID']);
                    $table = $_GET['table'];
                    $stat = $_GET['stat'];
                    if($stat=="inactive"){

                    ?>

                    <form class="form" method="post" action="Diclineproprejectq.php?propID=<?php echo $id ?>&table=<?php echo $table ?>&stat=<?php echo $stat ?>&adm=<?php echo "adm" ?>#rejectq" style="width: 100%;">

                        <article id="details">

                            <label>Write reason of rejection <a style="color: red;">*</a></label>
                            <input class="input" name="reson" required style="height:200px;">

                        </article>
                        <article style="display:inline-flex;">

                            <a><button type="reset">Reset</button></a>
                            <button name="save"><b>Save</b></button></a>

                        </article>
                        <?php    
                           
                        }
                        else{echo "This property has been ",$stat," can not reject";}
                        ?>


                    </form>


                </div>
                <div class="ft-modal-footer">
                <a class="ft-modal-close" href="manageprop.php?propID=<?php echo $id ?>&table=<?php echo $table ?>&stat=<?php echo $stat ?>#view">&#10006;</a>

                </div>
            </div>
        </div>

    
    </section>


</body>

</html>