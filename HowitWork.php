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
</head>

<body style="background-image: url('Web 1920 – 1.png');position:relative;
  background-repeat: no-repeat; 
  background-size: cover;">

    <!-- start header -------------------------->
    <header>
        <div class="container">
            <!-- -------------logo -->
            <a href="#" class="logo">
                <img src="img/newlogo.jpeg" alt="logo" />
            </a>

            <!-----------------menue-->
            <nav>

                <ul class="menu">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="homeSearch.php?table=<?php echo "all" ?>&typ=<?php echo "PROPERTY TYPE" ?>&loc=<?php echo "LOCATION" ?>">SALES &nbsp;&nbsp;AND&nbsp;&nbsp; RENTS</a></li>
                    <li><a class="active" href="HowitWork.php">HOW IT WORKS</a></li>
                    <li><a href="Abutus.php">ABOUT US</a></li>&nbsp;
                    <li><a href="formlogin.php" class="btn-link">LOGIN</a></li>
                    <li><a href="Signup.php" class="btn-link">SIGN UP</a></li>
                </ul>
            </nav>

        </div>

    </header>
    <!-- end header------------------------------>


    <section style="display: block; ">
        <article>
            <h3 style="color:#ac70ff; font-size:25px;"> How it works </h3>
        </article>
        <br><br>
        <h4 style="color:#f56200; font-size:21px;">Buyer: </h4>
        <p style="background-color:#ededed; font-size:18px;">

            1- Sign up as a buyer.<br>
            2- Search for property by using location and property type.<br>
            3- Choose the property you like and request to buy it.<br>
            4- Wait for the property's seller approval in order to proceed to the payment.<br>
            5- After receiving the approval you can pay on the “my request” page.<br>
            6- After completing the payment process Tasweqar will contact you in order to provide you the seller’s contact information.<br>
        </p>
       <br>
        <h4 style="color:#f56200; font-size:21px;"> Seller:</h4>
        <p style="background-color:#ededed; font-size:18px;">
            1- Sign up as a buyer. <br>

            2- Enter your property details and all needed information in the “Sell or Rent” page. <br>
            3- Wait for Tasweqar to accept your property and add it to the website, you can see your property status in the “My properties” page.<br>
            4- ِAfter that buyers will be able to see your property and request to but it, you can find the requests in “My request page”.<br>
            5- Accepting the buyer request means that there is an agreement and will allow the buyer to pay the commision fees. <br>
            6- The buyer will pay and will call you to complete the governmental process.<br>



        </p>

    </section>


    <footer class="footer">
        <div class="about_content">
            <h6>Copyright ©</h6>
            <div>
                <a href="#">2021 All rights reserved |</a>
            </div>
        </div>
        <div class="about_content">
            <h6>CONTACT </h6>
            <a href="https://wa.me/966538535043"><img src="img/phone.svg" alt="img" />0538535043</a>
            <a href="mailto:info@Tasweqar.com"><img src="img/message.svg" alt="img" />info@Tasweqar.com</a>
            <a href="https://twitter.com"><img src="img/tweeterblack.svg" alt="img" />@Tasweqar</a>
        </div>
        <div class="about_content">
            <h6>ADDRESS </h6>
            <div>
                <a href="#"> Jubal Industrial City , Fanateer</a>
            </div>
        </div>

    </footer>

</body>

</html>