<?php
/**
 * Created by PhpStorm.
 * User: Kokila
 * Date: 12/27/15
 * Time: 6:13 AM
 */

require_once("Database.php");

if(isset($_POST['reset-db'])){
    $db = Database::getInstance();
    $mysqli = $db->getConnection();


    $sql = "DROP DATABASE SQLITEST";
    if ($mysqli->query($sql) === TRUE) {
        echo "Existing 'SQLITEST' database found and Database DROPPED<br>";
    } else {
        echo "No Existing Database !<br>";
    }
    $sql = "CREATE DATABASE SQLITEST";
    if ($mysqli->query($sql) === TRUE) {
        echo "New Database created successfully !<br>";
    } else {
        echo "Error creating database: " . $conn->error."<br>";
    }

    $sql = "CREATE TABLE `SQLITEST`.`admin` (
                     `id` INT NOT NULL AUTO_INCREMENT ,
                     `username` VARCHAR(50) NOT NULL ,
                     `password` VARCHAR(100) NOT NULL ,
                     `email` VARCHAR(200) NOT NULL ,
                      PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    if($mysqli->query($sql) === true)
        echo "admin Table Created !<br>";
    $sql = "INSERT INTO `SQLITEST`.`admin` (`id`, `username`, `password`, `email`) VALUES
                  ('1', 'admin', 'testpass', 'admin@sqlitest.tk'),
                  ('2', 'admin2', 'testpass2', 'admin2@sqlitest.tk')";
    if($mysqli->query($sql) === true)
        echo "admin table initial data inserted !<br>";







}

?>
<?  if(!isset($_POST['reset-db'])){ ?>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4" style="background-color: #d9c174">
        <form action="?page=setup-database&noError" method="post" role="form">
            <legend>Database Reset ?</legend>
            <span class="text-danger">Do you want to Reset SQL Injection Test Database ?</span>
            <input hidden value="true" name="reset-db">
            <br>
            <br>
            <button type="submit" class="btn btn-danger pull-right">Yes</button>
            <span class="pull-right">&nbsp;</span>
            <a href="../index.php" class="btn btn-default pull-right">Cancel</a>
            <br>
            <br>
        </form>
    </div>
</div>
<script>
    $( ".alert-success").delay(5000).slideToggle();
</script>
<?}?>