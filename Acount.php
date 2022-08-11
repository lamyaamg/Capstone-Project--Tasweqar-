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

<body>
<?php
        require_once 'DBconect.php';
        $conn = db_connect();
        $Ac_ID = GetID();
        $User_Name = GetUserName();
        
?>
    <div>
        <div>
            <?php 
            if($_SESSION["table_ID"]==1){
                include('topbar.php'); 
            }
            else{
                include('btopbar.php'); 
            }   
            ?>
        </div>

        <?php 
        if($_SESSION["table_ID"]==1){
            include('leftbar.php');
        }
        else{
            include('bleftbar.php'); 
        }
         ?>
    </div>
    <article class="hello">
        <?php
      
        $query = "SELECT * FROM regesterdacounts where Ac_ID = '" . $Ac_ID . "'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <article class="progress">

                </article>
                <article class="reqest" style="margin-top: -70px;">
                    <p>Profile</p>
                    <article>
                        <form class="form" method="post" action="updateAcount.php?acID=<?php echo $row["Ac_ID"] ?>&user=<?php echo "us" ?>#popup">
                                 <label >User ID<a></a> # <?php echo $row["Ac_ID"] ?></label><br><br>
                                        <label>User first name<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="userfname" maxlength="100" placeholder="User Name" value="<?php echo $row["User_Name"] ?> ">
                                        <label>User last name<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="userlname" maxlength="100" placeholder="User Last Name" value="<?php echo $row["user_Lname"] ?> ">
                                        <label >Address<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="address" maxlength="100" placeholder="User Name" value="<?php echo $row["address"] ?> ">
                                        <label >Email<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="Email" id="ucname" maxlength="50" placeholder="Email" value="<?php echo $row["Email"] ?> ">
                                        <label >Phone number<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="phone" id="phone" maxlength="50" placeholder="Phone Number" value="<?php echo $row["phone"] ?> ">
                                        <label >Gender<a style="color: red;">*</a></label>
                                        <select class="input"name="gender" required>
                                            <option selected><?php echo $row["gender"] ?></option>
                                            <option>male</option>
                                            <option>female</option>
                                        </select>
                                        <label >DOB <a style="color: red;">*</a></label>
                                        <input class="input" required name="dob"  maxlength="50" placeholder="Date of birth" value="<?php echo $row["dob"] ?> ">
                                        <label >Credit card NO<a style="color: red;">*</a></label>
                                        <input class="input" required type="text" name="card" maxlength="100" placeholder="card No" value="<?php echo $row["cardNo"] ?> ">
                                        <label >Password<a style="color: red;">*</a></label>
                                        <input class="input" required type="password" name="pass" id="pass" maxlength="50" placeholder="Password" value="<?php echo $row["Password"] ?> ">

                            <button class="btn" type="submit"> Save</button>

                        </form>
                    </article>

                </article>

            <?php
            }
        } else {
            ?>
            
        <?php } ?>

    </article>
   

</body>

</html>