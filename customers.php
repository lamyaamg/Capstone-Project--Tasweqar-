<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" href="indexStyle.css">
  
</head>

<body>
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>
    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = $_SESSION["name"];
    ?>
    <section style="flex-direction: column; padding-top:190px;padding-bottom:350px">
        <article>
            <p style="color:blueviolet; padding-left:39%; margin-top:-40px;font-size:30px">customers Accounts</p>
        </article>
        <article class="container">

            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:rgb(250, 250, 255,.8);">
                <thead>
                    <tr>
                        <th>customer ID</th>
                        <th>customer Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>DOB</th>
                        <th>Card No</th>
                        <th >Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $query = "SELECT * FROM regesterdacounts";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr style="background-color:rgb(255, 127, 80,.0995);">
                                <td>#00<?php echo $row["Ac_ID"] ?> </td>
                                <td><?php echo $row["User_Name"]?><?php echo $row["user_Lname"]?> </td>
                                <td><?php echo $row["phone"] ?> </td>
                                <td><?php echo $row["Email"] ?> </td>
                                <td><?php echo $row["gender"] ?></td>
                                <td><?php echo $row["address"] ?> </td>
                                <td><?php if( $row["type"]==1){echo "seller"; }else {echo "buyer";}?> </td>
                                <td> <?php echo $row["dob"] ?></td>
                                <td> <?php echo $row["cardNo"] ?></td>
                                <td><a style="color:coral; font-weight:900"href="customers.php?acID=<?php echo $row["Ac_ID"] ?>#edit">Edit</a></td>
                                <td><a style="color:coral; font-weight:900" onclick="return confirm('Are you sure you want to delet this customer ?');" href="deletcustomer.php?acID=<?php echo $row["Ac_ID"] ?>#delet" >Delete</a></td>

                            </tr>



                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 15%;">
                            <p style=" padding-right: 20%; font-size:12px">No customer found</p>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </article>


        <div class="ft-modal" id="edit" >
            <div class="ft-modal-content" style="width:90%;">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>Customer details</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $acid = intval($_GET['acID']);
                    $query = "SELECT * FROM regesterdacounts WHERE Ac_ID = $acid limit 1 ";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                            <article class="reqest" style="margin-top: 20px; width:100%">

                                <article>
                                    <form class="form" method="post" style="margin-left: -55px; width:80%; display:flex" action="updateAcount.php?acID=<?php echo $row["Ac_ID"] ?>&user=<?php echo "emp" ?>#popup">
                                    <div style="padding:5px;margin-right:50px"> 
                                        <label style="padding:5px;">User frist name <a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="userfname" maxlength="100" placeholder="User Name" value="<?php echo $row["User_Name"] ?> "style="width: 200px;">
                                        <label style="padding:5px;">User last name <a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="userlname" maxlength="100" placeholder="User Last Name" value="<?php echo $row["user_Lname"] ?> "style="width: 200px;">
                                        <label style="padding:5px;">Address<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="address" maxlength="100" placeholder="User Name" value="<?php echo $row["address"] ?> "style="width: 200px;">
                                        <label style="padding:5px;">Email<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="Email" id="ucname" maxlength="50" placeholder="Email" value="<?php echo $row["Email"] ?> "style="width: 200px;">
                                      <button style="margin-left: 40px;" class="btn" type="submit"> Save</button>
                                    </div>
                                    <div style="padding:5px;margin-right:50px"> 
                                        <label style="padding:5px;">Phone number<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="phone" id="phone" maxlength="50" placeholder="Phone Number" value="<?php echo $row["phone"] ?> "style="width: 200px;">
                                        <label style="padding:5px;">Gender<a style="color: red;">*</a></label>
                                        <select class="input" style="width: 200px;" name="gender" required>
                                            <option selected><?php echo $row["gender"] ?></option>
                                            <option>male</option>
                                            <option>female</option>
                                        </select>
                                        <label style="padding:5px;">DOB<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="dob"  maxlength="50" placeholder="Date of birth" value="<?php echo $row["dob"] ?> " style="width: 200px;">
                                        <label style="padding:5px;">Cridet card NO<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="card" maxlength="100" placeholder="card No" value="<?php echo $row["cardNo"] ?> "style="width: 200px;"> 
                                      
                                    </div>   
                                    </form>
                                </article>

                            </article>

                        <?php
                        }
                    } else {
                        ?>

                    <?php } ?>

                    </article>
                </div>
                <div class="ft-modal-footer">
                    <a class="ft-modal-close" href="customers.php">&#10006;</a>

                </div>
            </div>
        </div>
        <!---------------------------------------------------------------------------->

    </section>
</body>

</html>