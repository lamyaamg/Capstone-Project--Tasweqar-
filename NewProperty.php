<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="barstyle.css">

    <style>
        a {
            font-size: 14px;
        }

        .image-galler a:hover img {
            display: block;
            width: 250px;
        }

        .ab {
            background-color: rgba(253, 123, 48, 0.979);
            color: aliceblue;
            border-radius: 20px;
            box-shadow: none;
            width: 100px;
            height: 30px;
            border-color: rgba(253, 123, 48, 0.041);
            cursor: pointer;
            margin-left: -870px;
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

    ?>
    <section style="flex-direction: column; padding-top:190px;">
        <article>
            <p style="color:blueviolet; padding-left:36%; margin-top:-40px;font-size:40px">Add New Property</p>
        </article>
        <article class="container" style="flex-wrap: wrap">


            <div class="image-galler " data-wow-delay="4s" style="margin: 45px;">

                <div class="image_overlay " data-wow-delay="4s" style="width:110%;margin-left:-80px;">
                    <form class="form" method="post" action="NewProperty.php#conf" style="width:10%;" enctype="multipart/form-data">

                        <div style="display: flex; width:100%">
                            <div style="margin-right:20px">
                                <label>Property type<a style="color: red;">*</a></label>
                                <select class="input" name="sr" required style="width: 250px;">
                                    <option value="sale">sale property</option>
                                    <option value="rent">rent property</option>
                                </select>

                                <label>Property category<a style="color: red;">*</a></label>
                                <select class="input" name="cat" required style="width: 250px;">
                                    <option value="HOUSE" selected>HOUSE</option>
                                    <option value="LAND">LAND</option>
                                    <option value="VILLA">VILLA</option>
                                    <option value="APARTMENT">APARTMENT</option>
                                </select>
                                <label>Area in square meter<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="area" required style="width: 250px;">
                                <label>Property Age<a style="color: red;">*</a></label>
                                <input class="input" type="number" placeholder="0" name="age" required style="width: 250px;">
                                <label>Number of floors<a style="color: red;">*</a></label>
                                <input class="input" type="number" placeholder="0" value="0" name="floor" required style="width: 250px;">
                                <label>Number of rooms<a style="color: red;">*</a></label>
                                <input class="input" type="number" placeholder="0" value="0" name="room" required style="width: 250px;">
                                <label>Number of bedrooms<a style="color: red;">*</a></label>
                                <input class="input" type="number" placeholder="0" value="0" name="bedroom" required style="width: 250px;">
                            </div>
                            <div style="margin-right:20px; padding-top:60px;">

                                <label>Seller ID<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="sID" required style="width: 250px;">
                                <label>House number<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="hno" required style="width: 250px;">
                                <label>City<a style="color: red;">*</a></label>
                                <select class="input" name="city" required style="width: 250px;">
                                    <option value="RIYADH">RIYADH</option>
                                    <option value="JEDDAH">JEDDAH</option>
                                    <option value="MAKKAH">MAKKAH</option>
                                    <option value="JUBAIL">JUBAIL</option>
                                </select>
                                <label>province<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="prov" required style="width: 250px;">
                                <label>Zip code<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="zip" required style="width: 250px;">
                                <label>Street<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="street" required style="width: 250px;">

                            </div>
                            <div style="margin-right:20px; padding-top:120px;">
                                <label>Owner Name<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="owner" required style="width: 250px;">
                                <label>Suggested price<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="price" required style="width: 250px;">
                                <label>Title deed <a style="color: red;">*</a></label>
                                <input class="input" name="userfile" type="file" accept="image/jpg, image/jpeg ,image/png" required style="width: 250px;border:2px dotted " />
                                <label>Building plan <a style="color: red;">*</a></label>
                                <input class="input" type="file" name="pic" id="pic" accept="image/jpg, image/jpeg ,image/png" required style="width: 250px;border:2px dotted " />

                                <label>Media <a style="color: red;">*</a></label>
                                <input class="input" type="file" id="file" name="files[]" required multiple style="width: 250px; border:2px dotted ">


                            </div>
                            <div style="margin-right:20px; padding-top:180px;">

                                <label>Google Map<a style="color: red;">*</a></label>
                                <input class="input" placeholder="" name="gmap" required style="width: 250px;">
                                <label>Description</label>
                                <input class="input" placeholder="" name="des" style="width: 250px;">
                                <label>Rent frequency<a style="color: red;">*</a></label>
                                <select class="input" name="frq" required style="width: 250px;" placeholder="only for rent property">
                                    <option >Yearly</option>
                                    <option >Monthly</option>
                                   
                                </select>                                
                                <label>Rent period<a style="color: red;">*</a></label>
                                <input class="input" placeholder="only for rent property" name="rp" required style="width: 250px;" value="only for rent property">


                            </div>

                            <article style="display:inline-flex; padding-left:100%; padding-top:440px">
                                <div class="ab" style=" margin-left:-1150px">
                                    <a href="manageprop.php" style="color:aliceblue; margin:30px;font-size:15px;text-decoration:none; margin-top:-5px; ">Back</a>
                                </div>
                                <a onclick="return confirm('Are you sure you want to confirm enteries?');" href=""><button type="submit" name="submit" style="margin-left: 880px;">conferm</button></a>
                            </article>
                        </div>

                    </form>

                </div>
            </div>

        </article>
    </section>

    <div class="ft-modal" id="conf">
        <div class="ft-modal-content">
            <div class="ft-modal-header">

                <?php

                $Ac_ID = filter_input(INPUT_POST, 'sID');
                $owner = filter_input(INPUT_POST, 'owner');
                $table = filter_input(INPUT_POST, 'sr');
                if ($table == 'rent') {
                    $frq = filter_input(INPUT_POST, 'frq');
                    $rp = filter_input(INPUT_POST, 'rp');
                }
                $categ = filter_input(INPUT_POST, 'cat');
                $area = filter_input(INPUT_POST, 'area');
                $age = filter_input(INPUT_POST, 'age');
                $floor = filter_input(INPUT_POST, 'floor');
                $room = filter_input(INPUT_POST, 'room');
                $bedroom = filter_input(INPUT_POST, 'bedroom');
                $price = filter_input(INPUT_POST, 'price');
                $des = filter_input(INPUT_POST, 'des');
                $picmap = $_FILES['pic']['name'];
                $doc = $_FILES['userfile']['name'];
                $fileCount = count($_FILES['files']['name']);
                //____________________________________________________address

                $city = filter_input(INPUT_POST, 'city');
                $prov = filter_input(INPUT_POST, 'prov');
                $zip = filter_input(INPUT_POST, 'zip');
                $street = filter_input(INPUT_POST, 'street');
                $hno = filter_input(INPUT_POST, 'hno');
                $gmap = filter_input(INPUT_POST, 'gmap');
                /*_____________________________________________________img upload*/
                $targetDir = "uploads/";
                $fileNames = $_FILES['pic']['name'];
                $targetFilePath = $targetDir . $fileNames;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                    move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath);
                } else {
                    echo " cant upload";
                }

                $targetDir = "uploads/";
                $fileNames = $_FILES['userfile']['name'];
                $targetFilePath = $targetDir . $fileNames;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                    move_uploaded_file($_FILES["userfile"]["tmp_name"], $targetFilePath);
                } else {
                    echo " cant upload";
                }
                ?>
                <?php        // ____________________________________________________insert
                $sql = "SELECT * FROM  address where homenum = $hno and zip= $zip";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                
                    $msg = " This house or zip code has been added befor ";
                } else {
                $SETADRESS = "INSERT INTO address (city,province,zip,street,homenum,Gmap)
              values ('$city','$prov','$zip','$street','$hno','$gmap')";
                if ($conn->query($SETADRESS)) {


                    $sql = "SELECT * FROM  address where homenum = $hno and  zip= $zip";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $pro_ID = $row['ADID'];
                    $query = "UPDATE  `tasweqar`.`address`SET  `pro_ID` =  '$pro_ID'                            
                            WHERE  `address`.`ADID` = '$pro_ID' LIMIT 1";

                    if ($conn->query($query)) {
                    } else {
                        echo "this house number or zip has been added befor";
                    }

                    //-----------------------------------------------------------------------structuer add
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

                    //-----------------------------------------------------------------------property  add
                    $SETPROPERQ = "INSERT INTO property (pro_ID,pro_type,pro_category,Added_Date,pro_Age,no_img,pro_sqm,pro_description,pro_status,pro_price,sell_ID,owner,imgMap,Document)
                                values ('$pro_ID','$table','$categ',NOW(),'$age','$fileCount','$area','$des','inactive','$price','$Ac_ID','$owner','$picmap','$doc')";

                    if ($conn->query($SETPROPERQ)) {
                        echo "property NO #";
                        $targetDir = "uploads/";
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4');

                        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
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
                                echo $pro_ID;
                                $imgs = explode("'", $insertValuesSQL);
                                $main = $imgs[0];
                                $query = "UPDATE  `tasweqar`.`property`SET  `pro_img` =  '$main'                                           
                                 WHERE  `property`.`pro_ID` = '$pro_ID' LIMIT 1";

                                if ($conn->query($query)) {

                                    echo "";
                                } else {
                                    echo "Error: " . $query . "
                                " . $conn->error;
                                }

                                foreach ($imgs as $img) {
                                    if ($img != null) {
                                        $insert = $conn->query("INSERT INTO imges (pro_ID, img) VALUES ($pro_ID,'$img')");
                                        if ($insert) {
                                            $statusMsg = "Files are uploaded successfully." . $errorMsg;
                                        } else {
                                            $statusMsg = "Sorry, there was an error uploading your file.";
                                        }
                                    }
                                }
                            } else {
                                $statusMsg = "Upload failed! " . $errorMsg;
                            }
                        } else {
                            $statusMsg = 'Please select a file to upload.';
                        }
                    } else {
                        echo "Error: " . $SETPROPERQ . "  " . $conn->error;
                    }
                    if ($table == 'rent') {
                        $SETPROPER = "INSERT INTO rent (pro_ID,freq,period)
                        values ('$pro_ID','$frq','$rp')";
    
                        if ($conn->query($SETPROPER)) {
                        } else {
                            echo "Error: " . $SETPROPER . "
                 " . $conn->error;
                        }
                    }
                } 
                else {
                    echo "Error: " . $SETADRESS . "
             " . $conn->error;
                }

            }

                $conn->close();

                ?>


            </div>
            <div class="ft-modal-body">
                <p> This house number or zip has been added befor</p>
            </div>
            <div class="ft-modal-footer">
                <a class="ft-modal-close" href="NewProperty.php">&#10006;</a>
            </div>
        </div>
    </div>

</body>

</html>