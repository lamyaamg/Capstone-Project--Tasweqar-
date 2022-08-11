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
        .image_overlay {
            margin-right: 5px;
            width: 500px;
            margin-bottom: inherit;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-content: space-between;
            justify-content: space-between;
            align-items: center;

        }

        .info {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 5px;
        }

        .image-gallery .image_overlay a {
            padding: 5px;
            color: darkgrey;
        }

        .image-gallery .image_overlay .p {
            color: black;
        }




        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
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

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 15px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 20px;
            padding: 8px 12px;
            position: absolute;
            top: 10;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }
    </style>
</head>

<body>
    <?php
    require_once 'DBconect.php';
    $Ac_ID = GetID();
    $User_Name = GetUserName();
    ?>
    <div>
        <div>
            <?php include('btopbar.php'); ?>
        </div>

        <?php include('bleftbar.php'); ?>
    </div>


    <section style="flex-direction: column; padding-top:150px;">
        <!-------------------------------view section----------------------------------------->

        <article>
            <?php
            require_once 'DBconect.php';
            $conn = db_connect();
            $id = intval($_GET['propID']);
            $table = $_GET['table'];
            $type = $_GET['typ'];
            $loct = $_GET['loc'];

            $query = "SELECT * FROM property join address using(pro_ID)WHERE pro_ID = $id ";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/' . $row["pro_img"];
                    $imageMapURL = 'uploads/' . $row["imgMap"];
                    $imageDocURL = 'uploads/' . $row["Document"];
            ?>

                    <div class="image-gallery">

                        <div id="ovrl" class="image_overlay" style="margin-top:20px; height:fit-content;padding:80px 25px;">
                            <div style="width: 50%;">
                                <a style="color:coral;font-size:20px; font-variant:small-caps">#<?php echo $row["pro_ID"] ?> for <?php echo $row["pro_type"] ?></a><br>
                                <a>Price:</a><a class="p"><?php echo $row["pro_price"] ?> SAR</a><br>
                                <a>Category:</a><a class="p"><?php echo $row["pro_category"] ?></a><br>
                                <a>Total area in square:</a><a class="p"> <?php echo $row["pro_sqm"] ?></a> <br>
                                <?php
                                $pro_ID = $row["pro_ID"];
                                $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
                                $results = mysqli_query($conn, $querys);
                                if ($results->num_rows > 0) {
                                    $rows = mysqli_fetch_assoc($results);

                                ?>
                                    <a>Property structure:</a><br>
                                    <a class="p"> floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?> bedrooms :<?php echo $rows["bedrooms"] ?></a><br>
                                <?php
                                } else { ?>
                                    <br><br>
                                <?php
                                }
                                ?>
                                <?php
                                    $pro_ID = $row["pro_ID"];
                                    if ($row["pro_type"] = "rent") {
                                        $rentquery = "SELECT * FROM rent WHERE pro_ID =$pro_ID  limit 1 ";
                                        $results = mysqli_query($conn, $rentquery);
                                        if ($results->num_rows > 0) {
                                            $rowr = mysqli_fetch_assoc($results);

                                    ?>
                                            <a>Rent frequency: <a class="p"><?php echo $rowr["freq"] ?></a><br>
                                            <a>Rent period: <a class="p"><?php echo $rowr["period"] ?></a><br>
                                    <?php }
                                    } ?>

                            </div>
                            <div style="width: 50%;">
                                <a> City:</a><a class="p"> <?php echo $row["city"], " - ", $row["province"] ?></a><br>
                                <a> Zip:</a><a class="p" style="padding-right: 70px;"> <?php echo $row["zip"] ?></a> <br>
                                <a> Address: </a><a class="p"><?php echo $row["street"], " - ", $row["homenum"] ?></a> <br>
                                <a> Discription: </a><a class="p"><?php echo $row["pro_description"] ?></a><br>
                                <a> Google Map:</a><a class="p" style=" text-decoration: none;" href="<?php echo $row["Gmap"] ?>"> <?php echo $row["Gmap"] ?></a> <br>
                                <a>Added Date:<a class="p"><?php echo $row["Added_Date"] ?></a><br>

                            </div>

                        </div>
                        <div class="slideshow-container">
                            <?php if ($row["no_img"] == 1) { ?>

                                <div class="mySlides fade">

                                    <img src="<?php echo $imageURL ?>" width="400" height="350" id="myImg<?php echo '1' ?>" onclick="enlargeImg('myImg<?php echo '1' ?>',<?php echo '1' ?>)">


                                    <div class="numbertext">1 / 3</div>
                                </div>
                                <div class="mySlides fade">

                                    <img src="<?php echo $imageMapURL ?>" width="400" height="350" id="myImg<?php echo '2' ?>" onclick="enlargeImg('myImg<?php echo '2' ?>')">
                                    <div class="numbertext">2 / 3</div>

                                </div>
                                <div class="mySlides fade">

                                    <img src="<?php echo $imageDocURL ?>" width="400" height="350" id="myImg<?php echo '3' ?>" onclick="enlargeImg('myImg<?php echo '3' ?>')">
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
                                                <img src="uploads/<?php echo $rows["img"] ?>" width="400" height="350" id="myImg<?php echo $noimg + 1 ?>" onclick="enlargeImg('myImg<?php echo $noimg + 1 ?>')">
                                            <?php } else { ?>
                                                <video style="width:100%" width="400" height="250" controls id="myImg<?php echo $noimg + 1 ?>" onclick="enlargeImg('myImg<?php echo $noimg + 1 ?>')">
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
                                        <?php $noimg ++;?>
                                        <img src="<?php echo $imageMapURL ?>" width="400" height="350" id="myImg<?php echo $noimg ?>" onclick="enlargeImg('myImg<?php echo $noimg ?>')">
                                        <div class="numbertext"><?php echo $noimg ?> / <?php echo $row["no_img"] + 2 ?></div>

                                    </div>
                                    <div class="mySlides fade">
                                    <?php $noimg ++;?>
                                        <img src="<?php echo $imageDocURL ?>" width="400" height="350" id="myImg<?php echo $noimg ?>" onclick="enlargeImg('myImg<?php echo $noimg  ?>')">
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
                        <br>

                        <div style="margin-top:25%;position:fixed" id="btn">
                            <a href="
                                <?php if ($_GET['pg'] != "adv") {
                                    echo "bayerview.php";
                                } else {
                                    echo "bayersearch.php";
                                } ?>
                                      ?table=<?php echo $table ?>&typ=<?php echo $type ?>&loc=<?php echo $loct ?>&pg=<?php echo $_GET['pg'] ?>"><button>Back</button></a>

                            <a onclick="return confirm('Are you sure you want to add this request?');" href="requesttobay.php?table=<?php echo $row["pro_type"] ?>&pid=<?php echo $row["pro_ID"] ?>&sellid=<?php echo $row["sell_ID"] ?>&typ=<?php echo $type ?>&loc=<?php echo $loct ?>&pg=<?php echo $_GET['pg'] ?>#reqtobay"><button>Request to bay</button></a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 35%;">
                    <p style=" padding-top: 20%;"> No properties found</p>
                </div>
            <?php } ?>

        </article>
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