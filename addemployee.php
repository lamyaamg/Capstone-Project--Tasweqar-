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
<!-- start header -------------------------->
<?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = GetUserName();
    
    $query = "SELECT * FROM employee where em_ID=$Ac_ID";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pos=$row["em_pos"];
        }}

    ?>

    <section style="flex-direction: column; padding-top:150px;">
    <p style="color:blueviolet; padding-left:40%; margin-top:-40px;font-size:30px; font-variant:small-caps">welcome <?php echo $User_Name;?></p><br>
    <article style="display: flex;align-items: center;flex-direction: row;justify-content: center;">
      
                <article class="reqest" style="margin-top: 20px;">
                <p style="color: red; margin-left:250px" ><?php if($pos=="employee"){ echo "sory.. your not allowed to add employees";}?></p><br>
                    <article>
                    <form class="form" method="post" style="margin-left: -25px; width:80%;" action="newemployee.php#popup">
                   
                                       <label>User frist name<a style="color: red;">*</a></label>
                                       <input class="input" required type="text" name="userfname" maxlength="100" placeholder="User Name">
                                       <label>User last name<a style="color: red;">*</a></label>
                                       <input class="input" required type="text" name="userlname" maxlength="100" placeholder="User Name">
                                       <label>Password<a style="color: red;">*</a></label>
                                       <input class="input" required type="password" name="pass" maxlength="50" placeholder="password" >
                                       <label>Email<a style="color: red;">*</a></label>
                                       <input class="input" required type="text" name="Email" id="ucname" maxlength="50" placeholder="Email" >
                                       <label>Phone number<a style="color: red;">*</a></label>
                                       <input class="input" required type="text" name="phone" id="phone" maxlength="50" placeholder="Phone Number">
                                       <label>Gender<a style="color: red;">*</a></label>
                                       <select class="input" name="gender" required>
                                           <option>male</option>
                                           <option>female</option>
                                       </select>
                                       <label>Position<a style="color: red;">*</a></label>
                                       <select class="input" name="pos" required>
                                           <option value="admin">admin</option>
                                           <option value="manager">manager</option>
                                           <option value="employee">employee</option>
                                       </select>
                                       <label>DOB<a style="color: red;">*</a></label>
                                       <input class="input" required type="date" name="dob" maxlength="50" placeholder="Phone Number" ">

                                       <button style="margin-left: 90px;" class="btn" type="submit"> Save</button>
                                      
                                   </form>
                        </form>
                    </article>

                </article>

    </article>
    </section>
   


</body>

</html>