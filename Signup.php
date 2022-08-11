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
                    <li><a href="index.php" >HOME</a></li>
                    <li><a href="homeSearch.php?table=<?php echo "all"?>&typ=<?php echo "PROPERTY TYPE"?>&loc=<?php echo "LOCATION"?>">SALES &nbsp;&nbsp;AND&nbsp;&nbsp; RENTS</a></li>
                    <li><a href="HowitWork.php">HOW IT WORKS</a></li>
                    <li><a href="Abutus.php">ABOUT US</a></li>&nbsp;
                    <li><a href="formlogin.php" class="btn-link" >LOGIN</a></li>
                    <li><a class="active" href="Signup.php" class="btn-link" >SIGN UP</a></li>
                </ul>
            </nav>

        </div>

    </header>
    <!-- end header------------------------------>



    <section> 
 
        <article class="left-art" id="sign"style="margin-top: -150px; display:block;">
            <article>
                <p style="font-size:25px;margin-top: 0px;">SignUp!</p> 
              </article>
              <article class ="form">
                <form class="sign" method="post" action="regester.php#rig">
                    <input class ="input"required type="text" id="usf" name="userfname" maxlength="100" placeholder="Frist Name">
                    <input class ="input"required type="text" id="usl" name="userlname" maxlength="100" placeholder="Last Name">
                    <input class ="input"required type="text" name="Email"  maxlength="50" placeholder="Email">
                    <input class ="input"required type="text" name="phone" id="phone" maxlength="50" placeholder="Phone Number">
                    <input class ="input"required type="text" name="address" id="adress" maxlength="50" placeholder="Address">
                    <input class ="input"required type="password"  name="pass" maxlength="100" placeholder="password">
                    <input class ="input"required type="date" name="dob" id="dob" maxlength="50" placeholder="Date Of Birth">
                    <select class="input" name="gender">
                        <option value="male" selected>male</option>
                        <option value="female">female</option>
                    </select>
                    <input class ="input"required type="password"  name="conpass" maxlength="100" placeholder="Conferm password">
                    <input class ="input"required type="password" name="card" id="card" maxlength="50" placeholder="your Credit Card Number">
                    <select class="input" name="type">
                        <option value="1" selected>seller</option>
                        <option value="2">buyer</option>
                    </select>
                   
                    <button class="btn" type="submit" > Sign UP</button>
                    
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