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


    <article class="hello" style="width: 100%;" id="2">

        <div>
            <form class="form" method="post" action="step4.php?table=<?php echo 'sale'?>" style="width: 100%;" enctype="multipart/form-data">

            <article  class="progress" style="margin-top: -160px; padding-left:0px">
                <a href="#1"><button class="btn" style="width: 40px;">1</button></a>__________________
                <a href="#2"><button class="btn" style="width: 40px;background-color:coral">2</button></a>__________________
                <a href="#3"><button class="btn" style="width: 40px;background-color:gray">3</button></a>__________________
                <a href="#4"><button class="btn" style="width: 40px; background-color:gray">4</button>

            </article>

            <article class="reqest" style="padding-top: 20px;">
                <article style="text-align: center; padding-top:7px; font-size:25px;">
                    <p style="font-size:35px; font-weight:500; font-variant:small-caps"><span> enter property details</span></p><br><br>
                </article>
                <div style="display: flex; width:100%; margin-left:-80px">
                    <div style="margin-right:50px">
                        <label>Property category<a style="color: red;">*</a></label>
                        <select class="input" name="cat" required style="width: 250px;">
                            <option value="HOUSE" selected>HOUSE</option>
                            <option value="LAND">LAND</option>
                            <option value="VILLA">VILLA</option>
                            <option value="APARTMENT">APARTMENT</option>
                        </select>
                        <label>Area in square meter<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="area" required style="width: 250px;">
                        <label>Property Age<a style="color: red;">*</a></label>
                        <input class="input" type="number" placeholder="0" name="age" required style="width: 250px;">
                        <label>Number of floors<a style="color: red;">*</a></label>
                        <input class="input" type="number" placeholder="0" value="0" name="floor" required style="width: 250px;">

                    </div>
                    <div>
                        <label>Number of rooms<a style="color: red;">*</a></label>
                        <input class="input" type="number" placeholder="0" value="0" name="room" required style="width: 250px;">
                        <label>Number of bedrooms<a style="color: red;">*</a></label>
                        <input class="input" type="number" placeholder="0" value="0" name="bedroom" required style="width: 250px;">
                        <label>Sugested price<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="price" required style="width: 250px;">
                        <label>Description</label>
                        <input class="input" placeholder="" name="des"  style="width: 250px;">
                    </div>
                    <div style="margin-left: 50px;">
                        <label>Title deed <a style="color: red;">*</a></label>
                        <input class="input" name="userfile" type="file" accept="image/jpg, image/jpeg ,image/png" required style="width: 250px;border:2px dotted" />
                        <label>Building plan <a style="color: red;">*</a></label>
                        <input class="input" type="file" name="pic" id="pic" accept="image/jpg, image/jpeg ,image/png" required style="width: 250px;border:2px dotted" />

                        <label>Media <a style="color: red;">*</a></label>
                        <input class="input" type="file" id="file" name="files[]" required multiple style="width: 250px; height:130px; border:2px dotted ">

                        <article style="display:inline-flex; padding-left:100%; padding-top:20px">
                        <div  class="ab"><a href="properties.php" style="color:aliceblue; margin:30px;font-size:15px; padding-bottom:5px;">Back</a></div>
                        <a href="#3"><button style="margin-left:800px;">next</button></a>
                        </article>
                    </div>
                </div>
            </article>
        </div>

        <div id="3">
            <article class="progress" style="margin-top: 280px; padding-left:50px">
                <a href="#1"><button class="btn" style="width: 40px;">1</button></a>__________________
                <a href="#2"><button class="btn" style="width: 40px;">2</button></a>__________________
                <a href="#3"><button class="btn" style="width: 40px;background-color:coral">3</button></a>__________________
                <a href="#4"><button class="btn" style="width: 40px; background-color:gray">4</button>

            </article>

            <article class="reqest" style="padding-top: 37px;">
                <article style="text-align: center; padding-top:7px; font-size:25px;">
                    <p style="font-size:35px; font-weight:500; font-variant:small-caps"><span> enter property address</span></p><br>
                </article>
                <div style="display: flex; width:100%">
                    <div style="margin-right:50px">
                        <label>City<a style="color: red;">*</a></label>
                        <select class="input" name="city" required style="width: 250px;">
                        <option value="RIYADH">RIYADH</option>
                            <option value="JEDDAH">JEDDAH</option>
                            <option value="MAKKAH">MAKKAH</option>
                            <option value="JUBAIL">JUBAIL</option>
                        </select>
                        <label>province<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="prov" required style="width: 250px;">

                    </div>
                    <div style="margin-right:50px">
                        <label>Zip code<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="zip" required style="width: 250px;">
                        <label>Street<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="street" required style="width: 250px;">
                    </div>
                    <div>
                        <label>House number<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="hno" required style="width: 250px;">
                        <label>Google Map<a style="color: red;">*</a></label>
                        <input class="input" placeholder="" name="gmap" required style="width: 250px;">

                        <article style="display:inline-flex; padding-left:100%; padding-top:100px">
                           <div  class="ab"> <a href="#2" style="color:aliceblue; margin:30px;font-size:15px; margin-top:-5px; ">Back</a></div>
                            <a onclick="return confirm('Are you sure you want to confirm enteries?');" href="#"><button style="margin-left: 800px;">next</button></a>
                        </article>
                    </div>
                </div>

                </form>
            </article>
        </div>



    </article>


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
