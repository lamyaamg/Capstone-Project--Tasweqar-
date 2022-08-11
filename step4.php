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
<?php

require_once "DBconect.php";


$conn = db_connect();
if (isset($_FILES['pic']['name'])) $picmap = $_FILES['pic']['name'];
else $picmap = 0;
if (isset($_FILES['userfile']['name'])) $doc = $_FILES['userfile']['name'];
else $doc = 0;
if (isset($_FILES['files']['name'])) $media = $_FILES['files']['name'];
else $media = 0;


$Ac_ID = GetID();
$table = $_GET['table'];
$pro_ID = 0;
$fileCountM = 0;
if ($table == 'rent') {
    $frq = filter_input(INPUT_POST, 'frq');
    $rp = filter_input(INPUT_POST, 'rp');
}
$owner = $_SESSION["name"] . $_SESSION["Lname"];
$categ = filter_input(INPUT_POST, 'cat');
$area = filter_input(INPUT_POST, 'area');
$age = filter_input(INPUT_POST, 'age');
$floor = filter_input(INPUT_POST, 'floor');
$room = filter_input(INPUT_POST, 'room');
$bedroom = filter_input(INPUT_POST, 'bedroom');
$price = filter_input(INPUT_POST, 'price');
$des = filter_input(INPUT_POST, 'des');


//____________________________________________________address

$city = filter_input(INPUT_POST, 'city');
$prov = filter_input(INPUT_POST, 'prov');
$zip = filter_input(INPUT_POST, 'zip');
$street = filter_input(INPUT_POST, 'street');
$hno = filter_input(INPUT_POST, 'hno');
$gmap = filter_input(INPUT_POST, 'gmap');
$fileCountM = count($_FILES['files']['name']);


?>
</div>

<?php

/*_____________________________________________________img upload*/
$targetDir = "uploads/";
$fileNames = $picmap;
$targetFilePath = $targetDir . $fileNames;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
if (in_array($fileType, $allowTypes)) {
    move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath);
} else {
}

$targetDir = "uploads/";
$fileNames = $doc;
$targetFilePath = $targetDir . $fileNames;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
if (in_array($fileType, $allowTypes)) {
    move_uploaded_file($_FILES["userfile"]["tmp_name"], $targetFilePath);
} else {
}
?>
<?php        // ____________________________________________________insert
$sql = "SELECT * FROM  address where homenum = '$hno' and zip= '$zip'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {

    $msg = " This house or zip code has been added befor ";
} else {

    $SETADRESS = "INSERT INTO address (city,province,zip,street,homenum,Gmap)
                values ('$city','$prov','$zip','$street','$hno','$gmap')";
    if ($conn->query($SETADRESS)) {

        $sql = "SELECT * FROM  address where homenum = '$hno' and zip= '$zip'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $pro_ID = $row['ADID'];

        $query = "UPDATE  `tasweqar`.`address`SET  `pro_ID` =  '$pro_ID'                            
                WHERE  `address`.`ADID` = '$pro_ID' LIMIT 1";

        if ($conn->query($query)) {

            if ($categ == "LAND") {
            } else {
                $SETSTRUC = "INSERT INTO structure (floor,bedrooms,rooms,pro_ID)
               values ('$floor','$bedroom','$room','$pro_ID')";
                if ($conn->query($SETSTRUC)) {
                } else {
                    echo "Error: " . $SETSTRUC . "
                  " . $conn->error;
                }
            }

            //-----------------------------------------------------------------------structuer add


            //-----------------------------------------------------------------------property  add

            $SETPROPERQ = "INSERT INTO property (pro_ID,pro_type,pro_category,Added_Date,pro_Age,no_img,pro_sqm,pro_description,pro_status,pro_price,sell_ID,owner,imgMap,Document)
                         values ('$pro_ID','$table','$categ',NOW(),'$age','$fileCountM','$area','$des','inactive','$price','$Ac_ID','$owner','$picmap','$doc')";

            if ($conn->query($SETPROPERQ)) {

                $targetDir = "uploads/";
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4');

                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                if (isset($_FILES['files']['name'])) {
                    $fileNames = array_filter($_FILES['files']['name']);
                    if (!empty($fileNames)) {
                        foreach ($_FILES['files']['name'] as $key => $val) {
                            // File upload path 
                            $fileName = basename($_FILES['files']['name'][$key]);
                            $targetFilePath = $targetDir . $fileName;

                            // Check whether file type is valid 
                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                            if (in_array($fileType, $allowTypes)) {
                                // Upload file to server 
                                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                                    // Image db insert sql 
                                    $insertValuesSQL .= "" . $fileName . "'";
                                } else {
                                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                                }
                            } else {
                                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                            }
                        }

                        // Error message 
                        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

                        if (!empty($insertValuesSQL)) {
                            // $insertValuesSQL = trim($insertValuesSQL, ',');
                            // Insert image file name into database 
                       
                            $imgs = explode("'", $insertValuesSQL);
                            $main = $imgs[0];
                            $query = "UPDATE  `tasweqar`.`property`SET  `pro_img` =  '$main'                                           
                                WHERE  `property`.`pro_ID` = '$pro_ID' LIMIT 1";

                            if ($conn->query($query)) {

                                $msg = "";
                            } else {
                                $msg = "Error: " . $query . "
                           " . $conn->error;
                            }

                            foreach ($imgs as $img) {
                                if ($img != null) {
                                    $insert = $conn->query("INSERT INTO imges (pro_ID, img) VALUES ($pro_ID,'$img')");
                                    if ($insert) {
                                        $msg = "Files are uploaded successfully." . $errorMsg;
                                    } else {
                                        $msg = "Sorry, there was an error uploading your file.";
                                    }
                                }
                            }
                        } else {
                            $msg ="Upload failed! " . $errorMsg;
                        }
                    } else {
                        $msg  = 'Please select a file to upload.';
                    }
                } else {
                    $msg =" can not add this Property";
                }
            } else {
            }
            if ($table == 'rent') {
                $SETPROPT = "INSERT INTO rent (pro_ID,freq,period)
              values ('$pro_ID','$frq','$rp')";

                if ($conn->query($SETPROPT)) {
                } else {
                    $msg = "Error: " . $SETPROPT . "
                  " . $conn->error;
                }
            } else {
            }
        } else {
        }
        $msg = "Property No#" . $pro_ID . " has been added successfuly";
    } else {
    }
}
$conn->close();

?>


<body>
    <div>
        <div>
            <?php include('topbar.php'); ?>
        </div>

        <?php include('leftbar.php'); ?>
    </div>

    <section style="flex-direction: column;margin-left:300px">

        <div id="4">


            <article class="progress" style="margin-top: -180px; padding-left:50px">
                <a href="#1"><button class="btn" style="width: 40px;">1</button></a>__________________
                <a href="#2"><button class="btn" style="width: 40px;">2</button></a>__________________
                <a href="#3"><button class="btn" style="width: 40px;">3</button></a>__________________
                <a href="#4"><button class="btn" style="width: 40px; background-color:coral">4</button>

            </article>

            <div class="image-gallery" id="dis">

                <div class="image_overlay" style="margin-left:-300px; display:flex;    width: 100%;">
                    <div class="info" style="padding-left: 50px; padding-right: 10px;">
                        <a class="p" style="color:coral;font-size:20px; font-variant:small-caps"> for <?php echo  $table ?></a><br><br>
                        <a style="color:dimgray;">Property Price:</a><a class="p" style="padding-left: 65px;"><?php echo $price ?> SAR</a><br><br>
                        <a style="color:dimgray;">Property Category:</a><a class="p" style="padding-left: 40px;"><?php echo $categ ?></a><br><br>
                        <a style="color:dimgray;"> Total area in square:</a><a class="p" style="padding-left: 40px;"> <?php echo  $area ?></a> <br><br>
                        <a style="color:dimgray;"> Building plan: </a><a class="p" style="padding-left: 10px;"><?php echo 1 ?></a><br><br>
                        <a style="color:dimgray;"> Media:</a><a class="p" style="padding-left: 40px;"> <?php if (isset($_FILES['files']['name'])) echo $fileCountM = count($_FILES['files']['name']);
                                                                                                        else echo 0; ?></a> <br><br>

                    </div>
                    <div style="padding-left: 50px;padding-right: 50px;padding-right: 10px;">
                        <a style="color:dimgray;">Property structure:</a><br><br>
                        <a style="color:dimgray;" class="p"> floor:<a class="p" style="padding-left: 50px;"><?php echo $floor  ?></a><br><br>
                            <a style="color:dimgray;" class="p"> rooms :<a class="p" style="padding-left: 40px;"><?php echo $room ?> </a><br><br>
                                <a style="color:dimgray;" class="p">bedrooms :<a class="p" style="padding-left: 20px;"><?php echo $bedroom ?></a><br><br>
                                    <a style="color:dimgray;"> Title deed: </a><a class="p" style="padding-left: 10px;"><?php echo 1 ?></a><br><br>
                                    <a style="color:dimgray;"> Gogle Map: </a><a class="p" style="padding-left: 10px;"><?php echo $gmap ?></a><br><br>

                    </div>
                    <div class="info" style="padding-left: 50px;padding-right: 10px;">
                        <?php
                        if ($table == "rent") {
                        ?>
                            <a style="color:dimgray;">Rent frequancy:</a><a class="p" style="padding-left: 40px;"> <?php echo  $frq ?></a> <br><br>
                            <a style="color:dimgray;">Rent period:</a><a class="p" style="padding-left: 40px;"> <?php echo  $rp ?></a> <br><br>

                        <?php } ?>
                        <a style="color:dimgray;"> city:</a><a class="p" style="padding-left: 40px;"> <?php echo $city, " - ", $prov ?></a> <br><br>
                        <a style="color:dimgray;"> Zip:</a><a class="p" style="padding-left: 40px;"> <?php echo $zip ?></a> <br><br>
                        <a style="color:dimgray;"> Address: </a><a class="p" style="padding-left: 20px;"><?php echo $street, " - ", $hno ?></a> <br><br>
                        <a style="color:dimgray;"> Discription: </a><a class="p" style="padding-left: 10px;"><?php echo $des ?></a><br><br>

                    </div>


                </div>

                <article style="display:inline-flex; padding-left:50%; padding-top:20px">
                    <a href="step2<?php echo $table ?>.php"><button style="margin-left: -170px;">Back</button></a>
                    <a onclick="return confirm('Are you sure you want to confirm enteries?');" href="#conf"><button type="submit" name="submit" style="margin-left: 10px;">Confirm</button></a>
                </article>



            </div>
    
            </section>
            <section>
            <div class="ft-modal" id="conf">
                <div class="ft-modal-content">
                    <div class="ft-modal-header">
                    </div>
                    <div class="ft-modal-body">

                        <p> <?php echo $msg; ?></p>
                    </div>
                    <div class="ft-modal-footer">
                        <a class="ft-modal-close" href="myproperties.php">&#10006;</a>
                    </div>
                </div>
            </div>
    </section>

</body>

</html>