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
        <?php include('btopbar.php');?>
        </div>

        <?php include('bleftbar.php');?>
</div>
    <article class="bayhello">
        <article class="left-art" id="sel" style="display:block;">
            <article>
                <p class="bayname"> hello <?php echo "  " . $User_Name; ?>!</p><br>
                <p class="do"> Find your happy place in Tasweqar!</p>
            </article>
            <article class="form" >
                <form class="sel" method="POST" action="bayerview.php#.">
                    <select class="input" name="location">
                        <option selected>LOCATION</option>
                        <option>RIYADH</option>
                        <option>JEDDAH</option>
                        <option>MAKKAH</option>
                        <option>JUBAIL</option>
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
            <article class="adv">
                <p> For advanced search!</p>
                <a href="bayersearch.php"><button class="btn" type="submit">CLICK HERE</button></a>
            </article>

        </article>

    </article>


</body>

</html>