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

<body>
<!-- start header -------------------------->
<?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = GetUserName();
    
    $query = "SELECT * FROM employee where em_ID=$Ac_ID";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pos=$row["em_pos"];
        }}

    ?>

    <div class="ft-modal" id="popup">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">

                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                if($pos=="employee"){ echo "sory.. your not allowed to add employees";}
                else{
                    $userfname = filter_input(INPUT_POST, 'userfname');
                    $userlname = filter_input(INPUT_POST, 'userlname');
                    $pas = filter_input(INPUT_POST, 'pas');
                    $Email = filter_input(INPUT_POST, 'Email');
                    $phone = filter_input(INPUT_POST, 'phone');
                    $gender = filter_input(INPUT_POST, 'gender');
                    $pos = filter_input(INPUT_POST, 'pos');
                    $dob = filter_input(INPUT_POST, 'dob');
                
                
                
                $query = "INSERT INTO  employee (em_fname,em_lname,em_pass,em_phone,em_mail,em_pos,em_gender,em_dob)
                values ('$userfname','$userlname','$pas','$phone','$Email','$pos','$gender','$dob')";

                if ($conn->query($query)) {
                    
                    echo " employee has been added successfully";
                } else {
                    echo "Error: " . $query . "
                " . $conn->error;
                }
            }
                ?>

            </div>
            <div class="ft-modal-footer">

                <a class="ft-modal-close" href="manageAcount.php">&#10006;</a>
          
            </div>
        </div>
    </div>


</body>

</html>