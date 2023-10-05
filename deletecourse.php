<?php
// Connect Database
require("Conn.php");

// 1. Get the Course
$couseid = isset($_GET["couseid"]) ? $_GET["couseid"] : '';
// echo $couseid;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // 3. Prepare sql and bind parameters
    $sql = 'delete from couse where couseid = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $couseid);
    $result = $statement->execute();

    // Execute sql and check for failure
    if (!$result) {
        die('Execute failed: ' . $statement->error);
    }

    // Redirect
    header('Location: course.php');
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
    <title>Course</title>
</head>
<body class="container">
    <h1>Course_Infomation: Delete Course</h1>

    <?php 
        // 2. Get the couse detail
        $sql = "select * from couse where couseid = '".$couseid."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <p>คุณต้องการจะลบคอร์ส <b><?php echo $row["cousename"];?> ? </b></p>
    <form method="post">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="course.php" class="btn btn-secondary">Cancel</a>
    </form>

<?php
$conn->close();
?>
    
</body>
</html>