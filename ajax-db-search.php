
 <section style="flex-direction: column;padding-top: 0%; width:100%">
        <article class="container" id="output" style="width: 100%;">
<?php
require_once 'DBconect.php';
$conn = db_connect();
$Ac_ID = GetID();
$query = "SELECT * FROM property join address using(pro_ID) WHERE  pro_ID LIKE '{$_POST['query']}%'LIMIT 100";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imageURL = 'uploads/' . $row["pro_img"];
?>

        <div class="image-galler" style="margin: 15px;">
            <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" width="250" style="border-radius: 10px;" alt="img " /> </a>
            <br>
            <a style="color:coral;font-size:18px; font-variant:small-caps"> for <?php echo $row["pro_type"] ?></a>
            <a>Property ID:<?php echo $row["pro_ID"] ?></a>
            <a>Owner ID:<?php echo $row["sell_ID"] ?></a>
            <?php if ($row["pro_status"] == "active") { ?>
                <a>Property Status:<b style="color: green;"><?php echo $row["pro_status"] ?></b></a>
            <?php }
            if ($row["pro_status"] == "rejected") { ?>
                <a style="text-decoration:none;color:black" href="reson.php?propID=<?php echo $row["pro_ID"] ?>&user=<?php echo 'ad' ?>#popup" title="click to view reject reason">Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a>
            <?php }
            if ($row["pro_status"] == "inactive") { ?>
                <a>Property Status:<b style="color: red;"><?php echo $row["pro_status"] ?> </b></a>
            <?php } ?>
            <a>Property category:<?php echo $row["pro_category"] ?></a>
            <a>Property price:<?php echo $row["pro_price"] ?> SAR</a>
            <a>Property age:<?php echo $row["pro_Age"] ?> Years</a>
            <?php
            $pro_ID = $row["pro_ID"];
            $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
            $results = mysqli_query($conn, $querys);
            if ($results->num_rows > 0) {
                $rows = mysqli_fetch_assoc($results);

            ?>
                <a>Property structuer: floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?></a>
                <a>Added Date:<?php echo $row["Added_Date"] ?></a><br>

            <?php
            } else { ?>
                <a>Added Date:<?php echo $row["Added_Date"] ?></a>
                <br><br>
              
            <?php
            }
            ?>
            <div>
                <a href="manageprop.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>#view"><button style="width:50px; hight:10px">view</button></a>
                <a href="manageprop.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>#edit"><button style="width:50px; hight:10px">Edit</button></a>
                <a onclick="return confirm('Are you sure you want to delet this property ?');" href="deletproperties.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>&adm=<?php echo "adm" ?>#delet"><button style="width:50px; hight:10px">Delete</button></a>
            </div>
           
        </div>

    <?php
    }
} else {
    ?>
    
    <p style="padding-left: 0%; color:darkgrey"> No property found</p>
<?php } ?>
        </article>
 </section>

   