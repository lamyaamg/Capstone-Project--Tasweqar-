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
                $Ac_ID = GetID();
                $User_Name = GetUserName();
                ?>
    <div>
        <div>
        <?php include('topbar.php');?>
        </div>

        <?php include('leftbar.php');?>
    </div>
    <article class="hello">
    
        <p class="name"> hello <?php echo "  " . $User_Name; ?>!</p><br>
        <p class="do">Do you want to <a href="properties.php?type=sale">sell </a> or <a href="properties.php?type=rent">rent</a> your property?</p>
        <p>Tasweqar provide you the easiest way to</p>
        <p>sell or rent your property.<br></p>


    </article>


</body>

</html>