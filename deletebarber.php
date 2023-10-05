<?php
// Connect Database
require("Conn.php");

// 1. Get the itemid
$barberid = isset($_GET["barberid"]) ? $_GET["barberid"] : '';
// echo $barberid;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // 3. Prepare sql and bind parameters
    $sql = 'delete from barber where barberid = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $barberid);
    $result = $statement->execute();

    // Execute sql and check for failure
    if (!$result) {
        die('Execute failed: ' . $statement->error);
    }

    // Redirect
    header('Location: barber.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Barber</title>
</head>
<body class="container">
    <h1>Barber_Infomation: Delete Barber</h1>

    <?php 
        // 2. Get the product detail
        $sql = "select * from barber where barberid = '".$barberid."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <p>คุณต้องการจะลบ <b><?php echo $row["barbername"];?> ? </b></p>
    <form method="post">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="Barber.php" class="btn btn-secondary">Cancel</a>
    </form>

<?php
$conn->close();
?>
    
</body>
</html>