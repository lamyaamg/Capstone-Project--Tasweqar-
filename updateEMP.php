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

    <div class="ft-modal" id="popup">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">

                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $User_Name = $_SESSION["name"];
                $userfname = filter_input(INPUT_POST, 'userfname');
                $userlname = filter_input(INPUT_POST, 'userlname');
                $Email = filter_input(INPUT_POST, 'Email');
                $phone = filter_input(INPUT_POST, 'phone');
               
                $gender = filter_input(INPUT_POST, 'gender');
                $pos = filter_input(INPUT_POST, 'pos');
                $dob = filter_input(INPUT_POST, 'dob');
               
                $Ac_ID = $_GET['emID'];
              

                $query = "UPDATE  `tasweqar`.`employee`SET  `em_fname` =  '$userfname',`em_lname` =  '$userlname',
                `em_mail` =  '$Email',`em_phone` =  '$phone',`em_pos` =  '$pos',`em_gender` =  '$gender',`em_dob` =  '$dob'                                               
                 WHERE  `employee`.`em_ID` = '$Ac_ID' LIMIT 1";

                if ($conn->query($query)) {

                    echo "profile has been Updated";
                } else {
                    echo "Error: " . $query . "
                " . $conn->error;
                }

                ?>

            </div>
            <div class="ft-modal-footer">
                <?php if ($_GET['user']=="prof") { ?>
                  <a class="ft-modal-close" href="admAcount.php">&#10006;</a>
                <?php } else { ?>
                      <a class="ft-modal-close" href="manageAcount.php">&#10006;</a>
                <?php } ?>
            </div>
        </div>
    </div>


</body>

</html>