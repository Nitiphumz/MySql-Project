<?php
require "Conn.php";
    
// Get parameter's value from URL
$reservevalue = isset($_GET["reserveid"])? $_GET["reserveid"] : '';

if($reservevalue != ""){
    if($reservevalue != ""){
        $sql = "SELECT * FROM reserve where reserveid = '".$reservevalue."'";
    } else{
        $sql = "SELECT * FROM reserve where reserveid = '".$reservevalue;
    }
}else{
    $sql = "select * from reserve ";
}

// echo $sql;
$result = $conn->query($sql);
$no = $result->num_rows;
?>

<?php
include "header.php";
?>
<!-- Body Content -->
<div class="container-fluid">
<h1>Reserve Infomation</h1>
    <a class="btn btn-primary float-end" href="addreserve.php" role="button">จองคิวตัดผม <i class="bi bi-plus-square"></i></a>
        <form class="row row-cols-lg-auto g-3 align-items-center" method="get" action="">
            
            <div class="col-3">
                <label class="visually-hidden" for="reserveid">Preference</label>
                <select name="reserveid" class="form-select" id="reserveid">
                    <option value="">Choose...</option>
                    <?php 
                        $resulttype = $conn->query("select * from reserve");
                        while($row = $resulttype->fetch_assoc()){
                        echo "<option value=\"".$row["reserveid"]."\"";
                        if($row["reserveid"]==$reservevalue){
                            echo "selected";
                        }
                        echo ">".$row["namereserve"]."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-info">Search  <i class="bi bi-search"></i></button>
            </div>
        </form>
        <br>

    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Datetime</th>
                <th scope="col">Course</th>
                <th scope="col">Barber</th>
                <th scope="col">Status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $count = 1;
                    while($row = $result->fetch_assoc()){
                  
                ?>
                <tr>
                <th scope="row"><?php echo $count;?></th>
                <td><?php echo $row["namereserve"];?></td>
                <td><?php echo $row["date"];?></td>
                <td><?php echo $row["couseid"];?></td>
                <td><?php echo $row["barberid"];?></td>
                <td><?php echo $row["status"];?></td>

                <td><a class="btn btn-outline-secondary" href="addreserve.php?reserveid=
                <?php echo $row["reserveid"];?>" role="button"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-outline-danger" href="deletereserve.php?reserveid=
                <?php echo $row["reserveid"];?>" role="button"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
                <?php
                    $count = $count +
                    1;
                }
                ?>

            </tbody>
            </table>
    </div>

</div>

<?php
$conn->close();
?>

<?php
include "footer.php";
?>

