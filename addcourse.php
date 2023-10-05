<?php
// Connect Database
require("Conn.php");

// Get couseid from URL
$couseid = isset($_GET["couseid"]) ? $_GET["couseid"] : '';
// echo $couseid;
if(isset($couseid)){
    // Query product detial from DB
    $sql = "select * from couse where couseid = '".$couseid."'";
    $result = $conn->query($sql);
    $rowitem = $result->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($couseid)){
        //Get the posted data
        $couseid = $_POST["couseid"];
        $cousename = $_POST["cousename"];
        $price = $_POST["price"];
        //echo $couseid." ".$cousename." ".$price.";

        $sql = 'insert into couse (couseid, cousename, price) values (?, ?, ?)'; 
        $statement = $conn->prepare($sql); 
        $statement->bind_param('sss', $couseid, $cousename, $price); 
        $result = $statement->execute(); 
        if (!$result) { 
            die('Execute failed: ' . $statement->error); 
        }

        // Redirect page to course.php
        header('Location: course.php');
        exit();
    }else{
        //Update product
        //Get the posted data
        $cousename = $_POST["cousename"];
        $price = $_POST["price"];
        echo "Update<br>";
        echo $couseid." ".$cousename." ".$price;

        $sql = 'update couse set cousename = ?, price = ? where couseid = ? '; 
        $statement = $conn->prepare($sql); 
        $statement->bind_param('sss', $cousename, $price, $couseid); 
        $result = $statement->execute(); 
        if (!$result) { 
            die('Execute failed: ' . $statement->error); 
        }

        // Redirect page to member.php
        header('Location: course.php');
        exit();
    }
}
?>

<?php
include "header.php"
?>

<!-- Body content -->
<div class="container-fluid">
<h1>Course Infomation : <?php echo $couseid == '' ? 'เพิ่ม' : 'แก้ไข'; ?> คอร์ส </h1>

    <form method="post">
        <div class="mb-3">
            <label for="couseid" class="form-label">Course_id</label>
            <input name="couseid" type="text" class="form-control" id="couseid" value="<?php echo empty($couseid) ? '' : $rowitem["couseid"]; ?>" <?php echo empty($couseid) ? '' : 'disabled'; ?>>
        </div>
        <div class="mb-3">
            <label for="cousename" class="form-label">Course_name</label>
            <input name="cousename" type="text" class="form-control" id="cousename" value="<?php echo empty($couseid) ? '' : $rowitem["cousename"]; ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Course_price</label>
            <input name="price" type="text" class="form-control" id="price" value="<?php echo empty($couseid) ? '' : $rowitem["price"]; ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="course.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php
$conn->close();
?>

<?php
include "footer.php"
?>