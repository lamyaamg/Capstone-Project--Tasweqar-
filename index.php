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

<body>
<?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $query = "SELECT * FROM approvedreq where app_pays_status='unpaid'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
         $date=date('Y-m-d', strtotime($row['app_date'] . ' + 7 days'));
          $currentDate = date('Y-m-d');
         
            if ($date == $currentDate) {
                $colseQ = "UPDATE requests  SET  `req_status` =  'closed' where RqID=$row[req_id] ";
                if ($conn->query($colseQ)) {
                    $DELETQ = "DELETE FROM approvedreq WHERE req_id=$row[req_id] ";
                   
                    if ($conn->query($DELETQ)) {
                        
                         } else {
                                 echo "Error: " . $DELETQ . "   " . $conn->error;
                         }
                    
                } else {
                    echo "Error: " .  $colseQ . "
            " . $conn->error;
                }
            }

          
        }
    }

    ?>
    <!-- start header -------------------------->
    <header>
        <div class="container">
            <!-- -------------logo -->
            <a  href ="#"  class="logo">
                <img src="img/newlogo.jpeg" alt="logo"/>
            </a>

            <!-----------------menue-->
            <nav>
                
                <ul class="menu">                 
                    <li><a class="active" href="index.php" >HOME</a></li>
                    <li><a href="homeSearch.php?table=<?php echo "all"?>&typ=<?php echo "PROPERTY TYPE"?>&loc=<?php echo "LOCATION"?>">SALES &nbsp;&nbsp;AND&nbsp;&nbsp; RENTS</a></li>
                    <li><a href="HowitWork.php">HOW IT WORKS</a></li>
                    <li><a href="Abutus.php">ABOUT US</a></li>&nbsp;
                    <li><a href="formlogin.php" class="btn-link" >LOGIN</a></li>
                    <li><a href="Signup.php" class="btn-link" >SIGN UP</a></li>
                </ul>
            </nav>
            <!--div class="log">
             <button onclick="blog2()">SIGN UP</button>
            </div-->

        </div>

    </header>
    <!-- end header------------------------------>



    <section> 
        <article class="left-art" id="sel">
            <article>
                <p style="font-size:40px; margin-left: -60px;">in Tasweqar you can find your happy place!</p> 
              </article>
              <article class ="form">
                <form class="sel" method="POST" action="homeSearch.php">
                    <select class="input" name="location">
                        <option selected>LOCATION</option>
                        <option>RIYADH</option>
                        <option>JUBAIL</option>
                        <option>JEDDAH</option>
                        <option>MAKKAH</option>
                    </select>
                    <select class="input" name="type">
                        <option selected>PROPERTY TYPE</option>
                        <option>HOUSE</option>
                        <option>LAND</option>
                        <option>APARTMENT</option>
                        <option>VILLA</option>
                    </select>
                    <button class="btn" name="sel" value="rent"> rent</button>
                    <button class="btn" name="sel" value="sale" >  sale</button>
                    
                    
                        
                </form>
              </article>
        </article>
        <article class="right-art">
            <aside class="img">
                <a  href ="#"  ><img src="img/leftnew.jpeg" alt="img" width="450" height="450"/> </a>
                </aside>
        </article>
    </section>

    
    <footer class="footer">
        <div class="about_content">
            <h6>Copyright ©</h6>
            <div>
            <a href="#">2021 All rights reserved |</a>
            </div>
        </div>
        <div  class="about_content">
        <h6>CONTACT </h6>
        <a  href ="https://wa.me/966538535043"  ><img src="img/phone.svg" alt="img" />0538535043</a>
        <a  href ="mailto:info@Tasweqar.com"  ><img src="img/message.svg" alt="img" />info@Tasweqar.com</a>
        <a  href ="https://twitter.com"  ><img src="img/tweeterblack.svg" alt="img" />@Tasweqar</a>
        </div>
        <div  class="about_content">
        <h6>ADDRESS </h6>
        <div>
            <a href="#"> Jubal Industrial City , Fahad</a>
        </div>
        </div>

    
    </footer>

</body>

</html>