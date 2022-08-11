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
<style>
    .image_overlay a{
        color: black;
 
    }
</style>

<body>
    <div>
        <div>
            <?php include('topbar.php'); ?>
        </div>

        <?php include('leftbar.php'); ?>
    </div>
    <div class="hello" style="padding:10% 5% 0% 10%;">
        <p style=" padding-top:30px;margin-left:20%; font-size:25px; color:blueviolet">MY PROPERTIES</p>
        <div class="image-gallery" style="margin-top:-30px;">


            <?php
            require_once 'DBconect.php';
            $conn = db_connect();
            $Ac_ID = GetID();
            $query = "SELECT * FROM property join address using(pro_ID)WHERE sell_ID = '" . $Ac_ID . "' ORDER BY pro_ID DESC ";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/' . $row["pro_img"];
            ?>
                <div class="image-gallery" style="width: auto; padding:10px">
                        <div class="img">
                            <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" width="300" height="300" alt="img " /> </a>
                            <br><br>
                        </div>
                        <div class="image_overlay" style="margin-left:-300px; margin-top:100px; width:300px; margin-bottom:auto;">
                            <!--<a style="color:coral;font-weight:700;"> FOR <?php echo $table ?></a> <br><br>
                            <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                            <a> Property Owner: <?php echo $row["OwFrist"] ?> <?php echo $row["OwLast"] ?> </a> <br>-->
                            <a style="color:coral;font-size:20px;font-variant:small-caps"> for <?php echo $row["pro_type"]?></a> <br>
                            <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                            <?php if ($row["pro_status"] == "active") { ?>
                            <a>Property Status:<b style="color: green;"><?php echo $row["pro_status"] ?></b></a><br>
                        <?php }
                        if ($row["pro_status"] == "rejected") { ?>
                            <a  href="reson.php?propID=<?php echo $row["pro_ID"]?>&user=<?php echo 'cus'?>#popup" title="click to view reject reason">Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b> <a style="color:red; font-size:x-small">click to view</a></a><br>
                        <?php }
                        if ($row["pro_status"] == "inactive") { ?>
                            <a>Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a><br>
                        <?php }
                         if ($row["pro_status"] == "closed") { ?>
                            <a>Property Status:<b style="color:green;"><?php echo $row["pro_status"] ?> </b></a><br>
                        <?php } ?>

                            <a>Category:<?php echo $row["pro_category"] ?></a><br>
                            <a>City:<?php echo $row["city"] ?></a><br>
                            <a>Added Date:<?php echo $row["Added_Date"] ?></a><br>


                            <a href="SallerView.php?propID=<?php echo $row["pro_ID"] ?>"><button class="btn"><b>view</b></button></a>
                            <a href="myproperties.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>#edit"><button class="btn"><b>Edit</b></button></a>
                         <a onclick="return confirm('Are you sure you want to delete this property ?');" href="deletproperties.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>&adm=<?php echo "sel" ?>#delet"><button class="btn"><b>Delet</b></button></a>

                        </div>

                    </div>

                    
                <?php
                }
            } else {
                ?>

            <?php } ?>


            <div class="ft-modal" id="edit">
                <div class="ft-modal-content">
                    <div class="ft-modal-header">
                    </div>
                    <div class="ft-modal-body">
                    <h5>PROPERTY NO <?php echo "#".$_GET['propID'];?></h5>
                    <?php
                        require_once 'DBconect.php';
                        $conn = db_connect();
                        $id = intval($_GET['propID']);
                        $table = $_GET['table'];
                        $query = "SELECT * FROM property join address USING(pro_ID) WHERE pro_ID = $id limit 1 ";
                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $imageURL = 'uploads/' . $row["pro_img"];
                        ?>
                    
                        

                                <form class="form" method="post" action="updateprop.php" style="width: 100%;">
                                
                                    <article id="details">

                                        <label>Property category<a style="color: red;">*</a></label>
                                        <select class="input" name="cat" required value=<?php echo $row["pro_category"] ?>>
                                            <option selected><?php echo $row["pro_category"] ?></option>
                                            <option>HOUSE</option>
                                            <option>LAND</option>
                                            <option>VILLA</option>
                                            <option>APARTMENT</option>
                                        </select>
                                        <input class="input" name="stat" required value=<?php echo $row["pro_status"] ?> style=" display:none">
                                        <label>Area in square meter<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["pro_sqm"] ?> name="area" required>
                                        <label>property age<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["pro_Age"] ?> name="age" type="number" required>
                                        <?php
                                        $querys = "SELECT * FROM structure WHERE pro_ID = $id limit 1 ";
                                        $results = mysqli_query($conn, $querys);
                                        if ($results->num_rows > 0) {
                                            $rows = mysqli_fetch_assoc($results);

                                        ?>
                                            <label>Number of floors<a style="color: red;">*</a></label>
                                            <input class="input" value=<?php echo $rows["floor"] ?> name="floor" type="number" required>
                                            <label>Number of rooms<a style="color: red;">*</a></label>
                                            <input class="input" value=<?php echo $rows["rooms"] ?> name="room" type="number" required>
                                            <label>Number of bedrooms<a style="color: red;">*</a></label>
                                            <input class="input" value=<?php echo $rows["bedrooms"] ?> name="bedroom" type="number" required>
                                        <?php
                                        } else {
                                        }
                                        ?>
                                        <label>Suggested price<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["pro_price"] ?> name="price" required>
                                        <label>Description<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php if($row["pro_description"]!=null)echo $row["pro_description"]; else echo "--"; ?> name="des" required>
                                        <label>Photo<a style="color: red;">*</a></label>
                                        <input class="input" type="file" name="file" value=<?php echo $row["pro_img"] ?> required>
                                        <label>Title deed<a style="color: red;">*</a></label>
                                        <input class="input" type="file" name="doc" value=<?php echo $row["Document"] ?> required>
                                        <label>Building plan<a style="color: red;">*</a></label>
                                        <input class="input" type="file" name="map" value=<?php echo $row["imgMap"] ?> required>
                                        <p><span> property address</span></p>
                                        <label>City<a style="color: red;">*</a></label>
                                        <select class="input" name="city" required value=<?php echo $row["city"] ?>>
                                            <option selected><?php echo $row["city"] ?></option>
                                            <option>RIYADAH</option>
                                            <option>JEDDAH</option>
                                            <option>MAKKAH</option>
                                            <option>JUBAIL</option>
                                        </select>
                                        <label>province<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["province"] ?> name="prov" required>
                                        <label>Zip code<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["zip"] ?> name="zip" required>
                                        <label>Street<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["street"] ?> name="street" required>
                                        <label>House number<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["homenum"] ?> name="hno" required>
                                        <label>Google map<a style="color: red;">*</a></label>
                                        <input class="input" value=<?php echo $row["Gmap"] ?> name="gmap" required>

                                        <input class="input" value=<?php echo $row["pro_ID"] ?> name="ID" style="display:none">
                                        <input class="input" value=<?php echo "sell" ?> name="ADID" style="display:none">
                                    </article>
                                    <article style="display:inline-flex;">

                                        <a><button type="reset">Reset</button></a>
                                        <button name="save" value=<?php echo $table ?>><b>save</b></button></a>

                                    </article>

                                <?php
                            }
                        } else {
                                ?>

                            <?php } ?>
                                </form>


                    </div>
                    <div class="ft-modal-footer">
                        <a class="ft-modal-close" href="">&#10006;</a>

                    </div>
                </div>
            </div>



</body>

</html>