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
<body >
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = $_SESSION["name"];

    ?>
    <section style="flex-direction: column; padding-top:190px;">
        <p style="color:blueviolet; padding-left:40%; margin-top:-40px;font-size:30px; font-variant:small-caps">welcome <?php echo $User_Name; ?></p><br>
        <article style="display: flex;align-items: center;flex-direction: row;justify-content: center;">
            <?php

            $query = "SELECT * FROM employee where em_ID = '" . $Ac_ID . "'";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <article class="progress">

                    </article>
                    <article class="reqest" style="margin-top: 20px;">

                        <article>
                            <form class="form" method="post" style="margin-left: 80px; display:flex" action="updateEMP.php?emID=<?php echo $row["em_ID"] ?>&user=<?php echo "prof" ?>#popup">
                            <div style="padding-right: 20px;">
                                <label>User frist name<a style="color: red;">*</a></label>
                                <input class="input" required type="text" name="userfname" maxlength="100" placeholder="User Name" value="<?php echo $row["em_fname"] ?>" style="width:250px">
                                <label>User last name<a style="color: red;">*</a></label>
                                <input class="input" required type="text" name="userlname" maxlength="100" placeholder="User Name" value="<?php echo $row["em_lname"] ?> "style="width:250px">
                                <label>Email<a style="color: red;">*</a></label>
                                <input class="input" required type="text" name="Email" id="ucname" maxlength="50" placeholder="Email" value="<?php echo $row["em_mail"] ?> "style="width:250px">
                                <label>Phone number<a style="color: red;">*</a></label>
                                <input class="input" required type="text" name="phone" id="phone" maxlength="50" placeholder="Phone Number" value="<?php echo $row["em_phone"] ?> "style="width:250px">
                                <button style=" margin-left: 40px;" class="btn" type="submit"> Save</button>

                            </div>
                            <div >
                                <label>Gender<a style="color: red;">*</a></label>
                                <select class="input" name="gender" required  style="width:250px">
                                   <option value="<?php echo $row["em_gender"] ?>" selected><?php echo $row["em_gender"] ?></option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                                <label>Position<a style="color: red;">*</a></label>
                                <select class="input" name="pos" required  style="width:250px">
                                    <option value=<?php echo $row["em_pos"] ?> selected><?php echo $row["em_pos"] ?></option>
                                </select>
                                <label>DOB<a style="color: red;">*</a></label>
                                <input class="input" required type="text" name="dob" maxlength="50"  value="<?php echo $row["em_dob"] ?> " style="width:250px">
                                <label>Password<a style="color: red;">*</a></label>
                                <input class="input" required type="password" name="pass" maxlength="50" value="<?php echo $row["em_pass"] ?> " style="width:250px">

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
    </section>
    


</body>

</html>