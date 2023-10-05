<?php
require "Conn.php";
    
// Get parameter's value from URL
$catvalue = isset($_GET["barberid"])? $_GET["barberid"] : '';

if($catvalue != ""){
    if($catvalue != ""){
        $sql = "SELECT * FROM barber where barberid = '".$catvalue."'";
    } 
}else{
    $sql = "select * from barber ";
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
<h1>Barber Infomation</h1>
    <a class="btn btn-primary float-end" href="addbarber.php" role="button">เพิ่มช่างตัดผม <i class="bi bi-person-add"></i></a>
        <form class="row row-cols-lg-auto g-3 align-items-center" method="get" action="">
            <div class="col-3">
                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                <select name="barberid" class="form-select" id="barberid">
                    <option value="" >Choose...</option>
                    <?php 
                        $resultcat = $conn->query("select * from barber");
                        while($row = $resultcat->fetch_assoc()){
                        echo "<option value=\"".$row["barberid"]."\" ";
                        if($row["barberid"]==$catvalue){
                            echo "selected";
                        }
                        echo ">".$row["barbernickname"]."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-info">Search <i class="bi bi-search"></i></button>
            </div>
        </form>
                    <br>

    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">BarberID</th>
                <th scope="col">NameBarber</th>
                <th scope="col">TelBarber</th>
                <th scope="col">EmailBarber</th>
                <th scope="col">NicknameBarber</th>
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
                <td><?php echo $row["barbername"];?></td>
                <td><?php echo $row["barberphone"];?></td>
                <td><?php echo $row["barberemail"];?></td>
                <td><?php echo $row["barbernickname"];?></td>
                <td><a class="btn btn-outline-secondary" href="addbarber.php?barberid=<?php echo $row["barberid"];?>" role="button"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-outline-danger" href="deletebarber.php?barberid=<?php echo $row["barberid"];?>" role="button"><i class="bi bi-trash-fill"></i></a></td>
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

