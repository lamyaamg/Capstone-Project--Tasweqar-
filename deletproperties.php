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
    
        <!-----------------------------------------delete-->

        <div class="ft-modal" id="delet">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>YOUR PROPERTY</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $id = intval($_GET['propID']);
                    $table = $_GET['table'];
                    $DELETQ = "DELETE FROM property WHERE pro_ID=$id ";
                    $DELADQ = "DELETE FROM address WHERE pro_ID=$id ";
                    $DELSTRQ = "DELETE FROM structure WHERE pro_ID=$id ";
                    $CHECKST = "SELECT * FROM requests WHERE pro_ID=$id ";
                    $result = mysqli_query($conn, $CHECKST);
                    if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row["req_status"]!="on hold"){
                        echo "This property has been requested"," can not delete ";
                    break;}

                    }}else{
                   
                    if ($conn->query($DELETQ)) {
                        if ($conn->query($DELADQ)){
                        if ($conn->query($DELSTRQ))
                        echo " your property has been deleted succsessfully";
                         } else {
                                 echo "Error: " . $DELETQ . "   " . $conn->error;
                                }
            
                    } else {
                        echo "Error: " . $DELETQ . "   " . $conn->error;
                    }}
                    ?>

                </div>
                <div class="ft-modal-footer">
                <?php
                    if(($_GET['adm'])!="adm"){
                ?>
                    <a class="ft-modal-close" href="myproperties.php">&#10006;</a>
                    <?php
                    }else {
                    ?>
                   <a class="ft-modal-close" href="manageprop.php">&#10006;</a>
                   <?php
                    }
                    ?>
                </div>
            </div>
        </div>


</body>

</html>