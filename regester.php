<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <link rel="stylesheet" href="barstyle.css">
</head>

<body>

    <section>


        <div class="ft-modal" id="rig">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>Registeration</h5>
                    <?php

                    require_once "DBconect.php";


                    $conn = db_connect();

                    $userfname = filter_input(INPUT_POST, 'userfname');
                    $userlname = filter_input(INPUT_POST, 'userlname');
                    $password = filter_input(INPUT_POST, 'pass');
                    $passwordconf = filter_input(INPUT_POST, 'conpass');
                    $Email = filter_input(INPUT_POST, 'Email');
                    $phone = filter_input(INPUT_POST, 'phone');
                    $type = filter_input(INPUT_POST, 'type');
                    $addres = filter_input(INPUT_POST, 'address');
                    $gender = filter_input(INPUT_POST, 'gender');
                    $dob = filter_input(INPUT_POST, 'dob');
                    $card = filter_input(INPUT_POST, 'card');

                    // ____________________________________________________Check if Regestered

                    $CHECKQ = "SELECT * FROM  regesterdacounts WHERE Email = '$Email'  ";
                    $result = mysqli_query($conn, $CHECKQ);
                    $row = mysqli_fetch_assoc($result);
                    if ($row > 0) {
                        header('Location:alert.php#reg'); 
                    } else {
                        if ($password == $passwordconf) {
                            $SETACOUNTQ = "INSERT INTO   regesterdacounts (User_Name,user_Lname, password,Email,phone,address,type,gender,dob,cardNo)
             values ('$userfname','$userlname','$password','$Email','$phone','$addres','$type','$gender','$dob','$card')";

                            if ($conn->query($SETACOUNTQ)) {
                                // ____________________________________________________GetID 

                                $IDQ = "SELECT * FROM  regesterdacounts WHERE User_Name = '" . $userfname . "' and Password = '" . $password . "'";
                                $result = mysqli_query($conn, $IDQ);
                                $row = mysqli_fetch_assoc($result);

                                $_SESSION["name"] = $row['User_Name'];
                                $_SESSION["Lname"]=$row['user_Lname'];
                                $_SESSION["ID"] = $row['Ac_ID'];
                                $_SESSION["table_ID"] = $row['type'];
                                if ($row['type'] == '1') {
                                    header('Location:saler.php');
                                } else {
                                    header('Location:bayer.php');
                                }
                            } else {
                                echo "Error: " . $SETACOUNTQ . "
                 " . $conn->error;
                            }
                        } else {

                            echo "passwords are not matched";
                        }
                    }
                    // header('Location:index.php'); 
                    ?>

                </div>
                <div class="ft-modal-footer">

                    <a class="ft-modal-close" href="#.php">&#10006;</a>

                </div>
            </div>
        </div>

    </section>
</body>

</html>