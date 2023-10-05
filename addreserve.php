<?php
// Connect Database
require("Conn.php");

// Get reserveid from URL
$reserveid = isset($_GET["reserveid"]) ? $_GET["reserveid"] : '';
// echo $reserveid;
if(isset($reserveid)){
    // Query product detial from DB
    $sql = "select * from reserve where reserveid = '".$reserveid."'";
    $result = $conn->query($sql);
    $rowitem = $result->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($reserveid)){
        //Get the posted data
        $reserveid = $_POST["reserveid"];
        $namereserve = $_POST["namereserve"];
        $date = $_POST["date"];
        $couseid = $_POST["couseid"];
        $barberid = $_POST["barberid"];
        $status = $_POST["status"];
        //echo ตัวแปรทั้งหมด

        $sql = 'insert into reserve (reserveid, namereserve, date, couseid, barberid, status) values (?, ?, ?, ?, ?, ?)'; 
        $statement = $conn->prepare($sql); 
        $statement->bind_param('isssss', $reserveid, $namereserve, $date , $couseid, $barberid, $status); 
        $result = $statement->execute(); 
        if (!$result) { 
            die('Execute failed: ' . $statement->error); 
        }

        
        header('Location: reserve.php');
        exit();
    }else{
        //Update product
        //Get the posted data
        $namereserve = $_POST["namereserve"];
        $date = $_POST["date"];
        $couseid = $_POST["couseid"];
        $barberid = $_POST["barberid"];
        $status = $_POST["status"];
        echo "Update<br>";
        echo $reserveid." ".$namereserve." ".$date." ".$couseid." ".$barberid." ".$status;

        $sql = 'update reserve set namereserve = ? ,date = ?, couseid = ?, barberid = ? , status = ? where reserveid = ? '; 
        $statement = $conn->prepare($sql); 
        $statement->bind_param('sssssi', $namereserve, $date, $couseid, $barberid, $status , $reserveid ); 
        $result = $statement->execute(); 
        if (!$result) { 
            die('Execute failed: ' . $statement->error); 
        }

        // Redirect page to reserve.php
        header('Location: reserve.php');
        exit();
    }
}
?>

<?php
include "header.php"
?>



<!-- Body content -->
<div class="container-fluid">
<h1>Reserve Infomation : <?php echo $reserveid == '' ? 'เพิ่ม' : 'แก้ไข'; ?> การจอง </h1>

    <form method="post">
        <div class="mb-3">
            <label for="reserveid" class="form-label">Reserve_id</label>
            <input name="reserveid" type="text" class="form-control" id="reserveid" value="<?php echo empty($reserveid) ? '' : $rowitem["reserveid"]; ?>" <?php echo empty($reserveid) ? '' : 'disabled'; ?>>
        </div>
        <div class="mb-3">
            <label for="namereserve" class="form-label">Name_Reserve</label>
            <input name="namereserve" type="text" class="form-control" id="namereserve" value="<?php echo empty($reserveid) ? '' : $rowitem["namereserve"]; ?>" 
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input name="date" type="datetime-local" class="form-control" id="date" value="<?php echo empty($reserveid) ? '' : $rowitem["date"]; ?>"
            ><h6>เวลาไม่เกิน 19.00 นาฬิกา</h6> 
        </div>
        <div class="mb-3">
            <label for="couseid" class="form-label">Course_name</label>
            <select name="couseid" class="form-select" id="couseid">
                    <option value="" >Choose...</option>
                    <?php 
                        $resultcat = $conn->query("select * from couse");
                        while($row = $resultcat->fetch_assoc()){
                        echo "<option value=\"".$row["couseid"]."\" ";
                        $catvalue = empty($reserveid) ? '' : $rowitem["couseid"];
                        if($row["couseid"]==$catvalue){
                            echo "selected";
                        }
                        echo ">".$row["cousename"]."</option>";
                    }
                    ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="barberid" class="form-label">Barber_name</label>
            <select name="barberid" class="form-select" id="barberid">
                    <option value="" >Choose...</option>
                    <?php 
                        $resultcat = $conn->query("select * from barber");
                        while($row = $resultcat->fetch_assoc()){
                        echo "<option value=\"".$row["barberid"]."\" ";
                        $catvalue = empty($reserveid) ? '' : $rowitem["barberid"];
                        if($row["barberid"]==$catvalue){
                            echo "selected";
                        }
                        echo ">".$row["barbername"]."</option>";
                    }
                    ?>
                </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status (ถ้าไม่ใส่โปรดเว้นว่างไว้)</label>
            <input name="status" type="text" class="form-control" id="status" value="<?php echo empty($reserveid) ? '' : $rowitem["status"]; ?>" 
        </div>
                    <br>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="reserve.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>


<?php
$conn->close();
?>

<?php
include "footer.php"
?>