<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="barstyle.css">

    <style>
        a {
            font-size: 15px;
        }

        .image-galler a:hover img {
            display: block;
            width: 260px;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: coral;
            font-weight: bold;
            font-size: 35px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body style="  background-image: url('Webbuble.png');position:absolute;
  background-repeat:repeat;background-size:cover">
    <header style="margin-left: 10%; width:100%;height:140px; background-color:#fff;padding-top:90px;">
        <div class="container" style="display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    min-width: 97px;
    flex-direction: row;
    flex-wrap: nowrap;
    width:100%;
">
            <!-- start header -------------------------->
            <?php include('topadmin.php'); ?>
            <!-- end header------------------------------>

    </header>
    <?php
    require_once 'DBconect.php';
    $conn = db_connect();

    ?>
    <section style="margin-left: auto; margin-top:-230px;margin-right: auto; width: 100%;display: flex; z-index: 1;flex-direction: row; flex-wrap: wrap; align-content: space-around;">
        <p style="color:blueviolet; padding-left:36%; ;font-size:40px">Manage Properties</p><br>

        <article style=" margin-left: 20%; margin-top:20px;display: flex;flex-direction: row;flex-wrap: nowrap;justify-content: space-between;align-items: center;">
            <a href="NewProperty.php"><button style="width:200px; padding:10px; height:40px;margin-left:-25%">ADD PROPERTY</button></a><br><br>
            <form class="form" style="display: flex;margin-right:20%" action="manageprop.php#q" method="post">
                <input class="input" placeholder="Property ID" name="sr" id="search" required style="width: 500px; border:1px solid gray;">
                <button type="submit" id="search" style="width: 150px;">Search</button>
            </form>
        </article>
    </section id="q">
    <section style="flex-direction: column;padding-top: 0%;">
        <article class="container" id="output">


            <?php
            require_once 'DBconect.php';
            $conn = db_connect();
            $Ac_ID = GetID();
            if (filter_input(INPUT_POST, 'sr')) {
                $id = filter_input(INPUT_POST, 'sr');
                $query = "SELECT * FROM property join address using(pro_ID)where pro_ID= $id ORDER BY pro_ID DESC ";
            } else
                $query = "SELECT * FROM property join address using(pro_ID)ORDER BY pro_ID DESC ";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/' . $row["pro_img"];
            ?>

                    <div class="image-galler" style="margin: 15px;">
                        <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" width="250" style="border-radius: 10px;" alt="img " /> </a>
                        <br>
                        <a style="color:coral;font-size:18px; font-variant:small-caps"> for <?php echo $row["pro_type"] ?></a>
                        <a>Property ID:<?php echo $row["pro_ID"] ?></a>
                        <a>Owner ID:<?php echo $row["sell_ID"] ?></a>
                        <?php if ($row["pro_status"] == "active") { ?>
                            <a>Property Status:<b style="color: green;"><?php echo $row["pro_status"] ?></b></a>
                        <?php }
                        if ($row["pro_status"] == "rejected") { ?>
                            <a style="text-decoration:none;color:black" href="reson.php?propID=<?php echo $row["pro_ID"] ?>&user=<?php echo 'ad' ?>#popup" title="click to view reject reason">Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a>
                        <?php }
                        if ($row["pro_status"] == "inactive") { ?>
                            <a>Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a>

                        <?php }
                        if ($row["pro_status"] == "closed") { ?>
                            <a>Property Status:<b style="color:yellowgreen;"><?php echo $row["pro_status"] ?> </b></a>
                        <?php } ?>
                        <a>Property category:<?php echo $row["pro_category"] ?></a>
                        <a>Property price:<?php echo $row["pro_price"] ?> SAR</a>
                        <a>Property age:<?php echo $row["pro_Age"] ?> Years</a>

                        <?php
                        $pro_ID = $row["pro_ID"];
                        $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
                        $results = mysqli_query($conn, $querys);
                        if ($results->num_rows > 0) {
                            $rows = mysqli_fetch_assoc($results);

                        ?>
                            <a>Property structure: floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?></a>
                            <a>Added Date:<?php echo $row["Added_Date"] ?></a><br>

                        <?php
                        } else { ?>

                            <a>Added Date:<?php echo $row["Added_Date"] ?></a>
                            <br><br>
                        <?php
                        }
                        ?>

                        <div>
                            <a href="manageprop.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>#view"><button style="width:50px; hight:10px">View</button></a>
                            <a href="manageprop.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>#edit"><button style="width:50px; hight:10px">Edit</button></a>
                            <a onclick="return confirm('Are you sure you want to delet this property ?');" href="deletproperties.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>&adm=<?php echo "adm" ?>#delet"><button style="width:50px; hight:10px">Delete</button></a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <p style="padding-top: 20%; color:darkgrey"> no property found</p>
            <?php } ?>
            </div>
        </article>

        <!---------------------------------------------------------------------->
        <div class="ft-modal" id="view">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>PROPERTY</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $Ac_ID = GetID();
                    $proid = intval($_GET['propID']);
                    $query = "SELECT * FROM property join address using(pro_ID)WHERE pro_ID = '" . $proid . "'";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $imageURL = 'uploads/' . $row["pro_img"];
                            $imageMapURL = 'uploads/' . $row["imgMap"];
                            $imageDocURL = 'uploads/' . $row["Document"];
                    ?>

                            <div class="img" style="margin:5px 15px 55px ;">
                                <div class="slideshow-container">
                                    <?php if ($row["no_img"] == 1) { ?>

                                        <div class="mySlides fade">

                                            <img src="<?php echo $imageURL ?>" width="520" height="350" id="myImg<?php echo '1' ?>" onclick="enlargeImg('myImg<?php echo '1' ?>',<?php echo '1' ?>)">


                                            <div class="numbertext">1 / 3</div>
                                        </div>
                                        <div class="mySlides fade">

                                            <img src="<?php echo $imageMapURL ?>" width="520" height="350" id="myImg<?php echo '2' ?>" onclick="enlargeImg('myImg<?php echo '2' ?>')">
                                            <div class="numbertext">2 / 3</div>

                                        </div>
                                        <div class="mySlides fade">

                                            <img src="<?php echo $imageDocURL ?>" width="520" height="350" id="myImg<?php echo '3' ?>" onclick="enlargeImg('myImg<?php echo '3' ?>')">
                                            <div class="numbertext">3 / 3</div>

                                        </div>

                                    <?php } else { ?>

                                        <?php

                                        $pro_ID = $row["pro_ID"];
                                        $querys = "SELECT * FROM imges WHERE pro_ID =$pro_ID  ";
                                        $results = mysqli_query($conn, $querys);
                                        $noimg = 0;

                                        if ($results->num_rows > 0) {
                                            while ($rows = mysqli_fetch_assoc($results)) {
                                                $noimg++;

                                        ?>
                                                <div class="mySlides fade">
                                                    <?php

                                                    $imgs = explode(".", $rows["img"]);
                                                    $ext = $imgs[1];
                                                    if ($ext != 'mp4') {
                                                    ?>
                                                        <img src="uploads/<?php echo $rows["img"] ?>" width="520" height="350" id="myImg<?php echo $noimg + 1 ?>" onclick="enlargeImg('myImg<?php echo $noimg + 1 ?>')">
                                                    <?php } else { ?>
                                                        <video style="width:100%" width="520" height="350" controls id="myImg<?php echo $noimg + 1 ?>" onclick="enlargeImg('myImg<?php echo $noimg + 1 ?>')">
                                                            <source src="uploads/<?php echo $rows["img"] ?>" type="video/mp4">
                                                            your browser does not support video tag
                                                        </video>
                                                    <?php } ?>
                                                    <div class="numbertext"><?php echo $noimg ?> / <?php echo $row["no_img"] + 2 ?></div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <div class="mySlides fade">
                                                <?php $noimg++; ?>
                                                <img src="<?php echo $imageMapURL ?>" width="520" height="350" id="myImg<?php echo $noimg ?>" onclick="enlargeImg('myImg<?php echo $noimg ?>')">
                                                <div class="numbertext"><?php echo $noimg ?> / <?php echo $row["no_img"] + 2 ?></div>

                                            </div>
                                            <div class="mySlides fade">
                                                <?php $noimg++; ?>
                                                <img src="<?php echo $imageDocURL ?>" width="520" height="350" id="myImg<?php echo $noimg ?>" onclick="enlargeImg('myImg<?php echo $noimg  ?>')">
                                                <div class="numbertext"><?php echo $noimg  ?> / <?php echo $row["no_img"] + 2 ?></div>
                                            </div>
                                        <?php } else { ?>
                                            <br><br>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01">
                                        <div id="caption"></div>
                                    </div>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

                                </div>

                            </div>
                            <div style="display: flex;align-items: stretch;margin-left: 20px;margin-top:-40px;justify-content: space-between;flex-direction: row;    flex-wrap: nowrap;    padding-top: 20px; font-family:'Times New Roman', Times, serif">
                                <div style="width: 50%;">
                                    <a style="color:coral;font-size:18px; font-variant:small-caps"> for <?php echo $row["pro_type"] ?></a> <br>
                                    <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                                    <a>Property Owner:<?php echo $row["owner"] ?></a> <br>
                                    <?php if ($row["pro_status"] == "active") { ?>
                                        <a>Property Status:<b style="color: green;"><?php echo $row["pro_status"] ?></b></a><br>
                                    <?php }
                                    if ($row["pro_status"] == "rejected") { ?>
                                        <a style="text-decoration:none;color:black" href="reson.php?propID=<?php echo $row["pro_ID"] ?>&user=<?php echo 'ad' ?>#popup" title="click to view reject reason">Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a><br>
                                    <?php }
                                    if ($row["pro_status"] == "inactive") { ?>
                                        <a>Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a><br>
                                    <?php }
                                    if ($row["pro_status"] == "closed") { ?>
                                        <a>Property Status:<b style="color:yellowgreen;"><?php echo $row["pro_status"] ?> </b></a><br>
                                    <?php } ?>
                                    <a>Property Price:<?php echo $row["pro_price"] ?> SAR</a><br>
                                    <a>Property area:<?php echo $row["pro_sqm"] ?> </a><br>
                                    <a>Property age:<?php echo $row["pro_Age"] ?> year</a><br>
                                    <a>Google Map:<br> <a href="<?php echo $row["Gmap"] ?>" style="text-decoration: none;"> <?php echo $row["Gmap"] ?> </a><br>
                                </div>
                                <div>
                                    <a>Category:<?php echo $row["pro_category"] ?></a><br>
                                    <?php
                                    $pro_ID = $row["pro_ID"];
                                    if ($row["pro_type"] = "rent") {
                                        $rentquery = "SELECT * FROM rent WHERE pro_ID =$pro_ID  limit 1 ";
                                        $results = mysqli_query($conn, $rentquery);
                                        if ($results->num_rows > 0) {
                                            $rowr = mysqli_fetch_assoc($results);

                                    ?>
                                            <a>Rent frequency:<?php echo $rowr["freq"] ?></a><br>
                                            <a>Rent period:<?php echo $rowr["period"] ?></a><br>
                                    <?php }
                                    } ?>
                                    <a>Property address:<?php echo $row["city"] ?>-<?php echo $row["province"] ?>-<?php echo $row["homenum"] ?> <br>zip:<?php echo $row["zip"] ?></a><br>
                                    <?php
                                    $pro_ID = $row["pro_ID"];
                                    $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
                                    $results = mysqli_query($conn, $querys);
                                    if ($results->num_rows > 0) {
                                        $rows = mysqli_fetch_assoc($results);

                                    ?>
                                        <a>Property structure: floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?> <br>bedrooms :<?php echo $rows["bedrooms"] ?></a><br>
                                        <a>Added Date:<?php echo $row["Added_Date"]; ?></a><br>
                                    <?php
                                    } else { ?>

                                        <a>Added Date:<?php echo $row["Added_Date"]; ?></a>
                                        <br><br>
                                        <?php

                                    }
                                    if(($row["pro_status"]!="inactive")&&($row["em_ID"]!=null)){
                                    $em_ID = $row["em_ID"];
                                    $query3 = "SELECT * FROM employee WHERE em_ID= $em_ID";
                                    $result3 = mysqli_query($conn, $query3);
                                    if ($result3->num_rows > 0) {
                                        while ($row3 = mysqli_fetch_assoc($result3)) {

                                        ?>
                                            <a> Activated by: <?php echo $row3["em_fname"], " ", $row3["em_lname"] ?></a> <br>
                                    <?php
                                        }
                                    }}else {}

                                        if(($row["pro_status"]=="rejected")){
                                            $pro=$row["pro_ID"];
                                            $queryp = "SELECT * FROM rejected WHERE pro_ID= $pro";
                                            $resultp = mysqli_query($conn, $queryp);
                                            if ($resultp->num_rows > 0) {
                                                while ($rowp = mysqli_fetch_assoc($resultp)) {
                                            $em_ID = $rowp["em_ID"];
                                            $queryem = "SELECT * FROM employee WHERE em_ID= $em_ID";
                                            $resultem = mysqli_query($conn, $queryem);
                                            if ($resultem->num_rows > 0) {
                                                while ($rowem = mysqli_fetch_assoc($resultem)) {
        
                                                ?>
                                                    <a> Rejected by: <?php echo $rowem["em_fname"], " ", $rowem["em_lname"] ?></a> <br>
                                            <?php
                                                }
                                            }}}else{}  
                                                
                                            }

                                    
                                    ?><br><br>
                                    <a onclick="return confirm('Are you sure you want to activate this property ?');" href="activateprop.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>&stat=<?php echo $row["pro_status"] ?>#accept"><button style="width:100px; hight:10px">Accept</button></a>
                                    <a onclick="return confirm('Are you sure you want to reject this property ?');" href="Diclineprop.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>&stat=<?php echo $row["pro_status"] ?>&adm=<?php echo "adm" ?>#reject"><button style="width:100px; hight:10px">Decline</button></a>

                                </div>
                            </div>
                </div>

            <?php
                        }
                    } else {
            ?>

        <?php } ?>

        <div class="ft-modal-footer">
            <a class="ft-modal-close" href="">&#10006;</a>

        </div>
            </div>
        </div>
        <!-------------------------------------------------------------------edit-->
        <div class="ft-modal" id="edit">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>YOUR PROPERTY</h5>
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
                                    <select class="input" name="cat" required>
                                        <option selected><?php echo $row["pro_category"] ?></option>
                                        <option value="HOUSE">HOUSE</option>
                                        <option value="LAND">LAND</option>
                                        <option value="VILLA">VILLA</option>
                                        <option value="APARTMENT">APARTMENT</option>
                                    </select>
                                    <label>Status<a style="color: red;">*</a></label>
                                    <select class="input" name="stat" required>
                                        <option selected><?php echo $row["pro_status"] ?></option>
                                        <option value="active">active</option>
                                        <option value="inactive">inactive</option>
                                        <option value="closed">closed</option>
                                    </select>
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
                                    <label>Sugested price<a style="color: red;">*</a></label>
                                    <input class="input" value=<?php echo $row["pro_price"] ?> name="price" required>
                                    <label>Description<a style="color: red;">*</a></label>
                                    <input class="input" value=<?php echo $row["pro_description"] ?> name="des" required>
                                    <label>Photo<a style="color: red;">*</a></label>
                                    <input class="input" type="file" name="file" value=<?php echo $row["pro_img"] ?> required>
                                    <label>Title deed<a style="color: red;">*</a></label>
                                    <input class="input" type="file" name="doc" value=<?php echo $row["Document"] ?> required>
                                    <label>Building plan<a style="color: red;">*</a></label>
                                    <input class="input" type="file" name="map" value=<?php echo $row["imgMap"] ?> required>
                                    <p><span> property address<a style="color: red;">*</a></span></p>
                                    <label>City<a style="color: red;">*</a></label>
                                    <select class="input" name="city" required>
                                        <option selected><?php echo $row["city"] ?></option>
                                        <option>RIYADH</option>
                                        <option>JEDDAH</option>
                                        <option>MaKKAH</option>
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
                                    <input class="input" value=<?php echo $row["ADID"] ?> name="ADID" style="display:none">
                                </article>
                                <article style="display:inline-flex;">

                                    <a><button type="reset">Reset</button></a>
                                    <button name="save" value=<?php echo $table ?>><b>Save</b></button></a>

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



    </section>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keyup(function() {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'ajax-db-search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {

                            $('#output').html(data);
                            $('#output').css('display', 'block');

                            $("#search").focusout(function() {
                                $('#output').css('display', 'none');
                            });
                            $("#search").focusin(function() {
                                $('#output').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#output').css('display', 'block');
                }
            });
        });

        // Function to increase image size
        function enlargeImg(imge) {
            // var elem=img;
            var modal = document.getElementById("myModal");

            var hed = document.getElementById("hed");
            var img = document.getElementById(imge);
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
                hed.style.display = "none";
            }

            var span = document.getElementsByClassName("close")[0];

            span.onclick = function() {
                modal.style.display = "none";
                hed.style.display = "block";
            }
        }
    </script>
</body>

</html>