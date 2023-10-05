<?php
// Connect Database
require("Conn.php");

// Get barberid from URL
$barberid = isset($_GET["barberid"]) ? $_GET["barberid"] : '';
// echo $barberid;
if(isset($barberid)){
    // Query barber detial from DB
    $sql = "select * from barber where barberid = '".$barberid."'";
    $result = $conn->query($sql);
    $rowitem = $result->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($barberid)){
        //Get the posted data
        $barberid = $_POST["barberid"];
        $barbername = $_POST["barbername"];
        $barberphone = $_POST["barberphone"];
        $barberemail = $_POST["barberemail"];
        $barbernickname = $_POST["barbernickname"];
        //echo $barberid." ".$barbername." ".$barberphone." ".$barberemail." ".$barbernickname;

        $sql = 'insert into barber (barberid, barbername, barberphone, barberemail, barbernickname) values (?, ?, ?, ?, ?)'; 
        $statement = $conn->prepare($sql); 
        $statement->bind_param('sssss', $barberid, $barbername, $barberphone, $barberemail, $barbernickname); 
        $result = $statement->execute(); 
        if (!$result) { 
            die('Execute failed: ' . $statement->error); 
        }

        // Redirect page to barber.php
        header('Location: barber.php');
        exit();
    }else{
        //Update product
        //Get the posted data
        $barbername = $_POST["barbername"];
        $barberphone = $_POST["barberphone"];
        $barberemail = $_POST["barberemail"];
        $barbernickname = $_POST["barbernickname"];
        echo "Update<br>";
        echo $barberid." ".$barbername." ".$barberphone." ".$barberemail." ".$barbernickname;

        $sql = 'update barber set barbername = ?, barberphone = ?, barberemail = ?, barbernickname = ? where barberid = ? '; 
        $statement = $conn->prepare($sql); 
        $statement->bind_param('sssss', $barbername, $barberphone, $barberemail, $barbernickname, $barberid); 
        $result = $statement->execute(); 
        if (!$result) { 
            die('Execute failed: ' . $statement->error); 
        }

        // Redirect page to member.php
        header('Location: barber.php');
        exit();
    }
}
?>

<?php
include "header.php"
?>

<!-- Body content -->
<div class="container-fluid">
<h1>Barber Infomation : <?php echo $barberid == '' ? 'เพิ่ม' : 'แก้ไข'; ?> ช่างตัดผม </h1>

    <form method="post">
        <div class="mb-3">
            <label for="barberid" class="form-label">Barber_id</label>
            <input name="barberid" type="text" class="form-control" id="barberid" value="<?php echo empty($barberid) ? '' : $rowitem["barberid"]; ?>" <?php echo empty($barberid) ? '' : 'disabled'; ?>>
        </div>
        <div class="mb-3">
            <label for="barbername" class="form-label">Barber_name</label>
            <input name="barbername" type="text" class="form-control" id="barbername" value="<?php echo empty($barberid) ? '' : $rowitem["barbername"]; ?>">
        </div>
        <div class="mb-3">
            <label for="barberphone" class="form-label">Barber_phone</label>
            <input name="barberphone" type="text" class="form-control" id="barberphone" value="<?php echo empty($barberid) ? '' : $rowitem["barberphone"]; ?>">
        </div>
        <div class="mb-3">
            <label for="barberemail" class="form-label">Barber_email</label>
            <input name="barberemail" type="text" class="form-control" id="barberemail" value="<?php echo empty($barberid) ? '' : $rowitem["barberemail"]; ?>">
        </div>
        <div class="mb-3">
            <label for="barbernickname" class="form-label">Barber_nickname</label>
            <input name="barbernickname" type="text" class="form-control" id="barbernickname" value="<?php echo empty($barberid) ? '' : $rowitem["barbernickname"]; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="Barber.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php
$conn->close();
?>

<?php
include "footer.php"
?>