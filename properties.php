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
<style>
    .ab{
        background-color: rgba(253, 123, 48, 0.979);
    color: aliceblue;
    border-radius:20px;
    box-shadow: none;
    width: 100px;
    height: 30px;
    border-color: rgba(253, 123, 48, 0.041);
    cursor: pointer;
    margin-left:-870px;
    }
  
</style>

<body>
    <div>
        <div>
            <?php include('topbar.php'); ?>
        </div>

        <?php include('leftbar.php'); ?>
    </div>


    <article class="hello" style="width: 100%;">

        <div id="1">
            <article class="progress" style="margin-top: -100px; padding-left:50px">
                <a href="#1"><button class="btn" style="width: 40px;">1</button></a>__________________
                <a href="#2"><button class="btn" style="width: 40px;background-color:gray">2</button></a>__________________
                <a href="#3"><button class="btn" style="width: 40px;background-color:gray">3</button></a>__________________
                <a href="#4"><button class="btn" style="width: 40px; background-color:gray">4</button>

            </article>

            <article class="reqest" style="padding-top: 50px;">
                <article style="text-align: center; padding-top:70px; font-size:25px;">
                    <p style="font-size:35px; font-weight:500; font-variant:small-caps"><span> select request type</span></p>
                </article>
                <form class="form" method="post" action="properties.php#check" style="width: 100%;" enctype="multipart/form-data">

                    <select class="input" name="sr" required>

                        <option value="sale">sale property</option>
                        <option value="rent">rent property</option>
                    </select>

                    <article style="display:inline-flex; padding-left:90%; padding-top: 160px">
                        <a><button>next</button></a>
                    </article>
                </form>
            </article>
        </div>

    </article>
    <div id="check">
            <?php 
            $table = filter_input(INPUT_POST, 'sr');
            if ($table=="sale"){
                header('Location:step2sale.php');
            }
            else   if ($table=="rent"){
                header('Location:step2rent.php');
            }else{
               
            }
            ?>
        </div>

    



    <div class="ft-modal" id="popup">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">
                <p> your property has been added successfuly</p>
            </div>
            <div class="ft-modal-footer">
                <a class="ft-modal-close" href="myproperties.php">&#10006;</a>
            </div>
        </div>
    </div>

</body>

</html>
<!--
<article id="details">
                    <p style="padding-left: 90px;"><span> property details</span></p><br>
                    <label>Property category<a style="color: red;">*</a></label>
                    <select class="input" name="cat" required>
                        <option selected>HOUSE</option>
                        <option>LAND</option>
                        <option>VILLA</option>
                        <option>APARTMENT</option>
                    </select>
                    <label>Area in square meter<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="area" required>
                    <label>Property Age<a style="color: red;">*</a></label>
                    <input class="input" type="number" placeholder="0" name="age" required>
                    <label>Number of floors<a style="color: red;">*</a></label>
                    <input class="input" type="number" placeholder="0" value="0" name="floor" required>
                    <label>Number of rooms<a style="color: red;">*</a></label>
                    <input class="input" type="number" placeholder="0" value="0" name="room" required>
                    <label>Number of bedrooms<a style="color: red;">*</a></label>
                    <input class="input" type="number" placeholder="0" value="0" name="bedroom" required>
                    <label>Sugested price<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="price" required>
                    <label>Description<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="des" required>
                    <label>Photo<a style="color: red;">*</a></label>
                    <input class="input" type="file" name="file">
                    <p  style="padding-left: 90px;"><span> property address</span></p><br>
                    <label>City<a style="color: red;">*</a></label>
                    <select class="input" name="city" required>
                        <option>RIYADAH</option>
                        <option>JEDDEH</option>
                        <option>MEKAH</option>
                    </select>
                    <label>province<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="prov" required>
                    <label>Zip code<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="zip" required>
                    <label>Street<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="street" required>
                    <label>House number<a style="color: red;">*</a></label>
                    <input class="input" placeholder="" name="hno" required>

                </article>
-->