<?php
require "Conn.php";
    
// Get parameter's value from URL
$catvalue = isset($_GET["couseid"])? $_GET["couseid"] : '';

if($catvalue != ""){
    if($catvalue != ""){
        $sql = "SELECT * FROM couse where couseid = '".$catvalue."'";
    } 
}else{
    $sql = "select * from couse ";
}
// echo $sql;
$result = $conn->query($sql);
$no = $result->num_rows;
?>

<?php
include "header2.php";
?>
<!-- Body Content -->
<div class="container-fluid">
<h1>Course Infomation</h1>
        <form class="row row-cols-lg-auto g-3 align-items-center" method="get" action="">
            <div class="col-3">
            </div>
        </form>
    <br>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">CourseID</th>
                <th scope="col">CourseName</th>
                <th scope="col">UnitPrice</th>
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
                <td><?php echo $row["cousename"];?></td>
                <td><?php echo $row["price"];?></td>
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

