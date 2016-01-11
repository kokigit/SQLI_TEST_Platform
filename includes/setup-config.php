<?php
/**
 * Created by PhpStorm.
 * User: Kokila
 * Date: 12/27/15
 * Time: 6:13 AM
 */

if(isset($_POST['host']) && isset($_POST['username']) && isset($_POST['password'])){
    $configData['host'] = $_POST['host'];
    $configData['username'] = $_POST['username'];
    $configData['password'] = $_POST['password'];


    foreach($configData as $key => $value){
        file_put_contents('config.php', implode('',
            array_map(function($data) use ($key,$value){
                return stristr($data,$key) ? "\t'".$key."' => '".$value."',\n" : $data;
            }, file('config.php'))
        ));
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Successfully set !</strong> <?php echo $key. " as a ". $value."</br>"; ?>
        </div>
        <?php
    }
}

//require_once("../Database.php");

?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4" style="background-color: #d9c174">
        <form action="?page=setup-config" method="post" role="form">
            <legend>Database Configurations</legend>

            <div class="form-group">
                <label for="host">Host</label>
                <input type="text" class="form-control" name="host" placeholder="localhost" value="localhost">
            </div>

            <div class="form-group">
                <label for="host">Username</label>
                <input type="text" class="form-control" name="username" placeholder="db user" value="test">
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input type="text" class="form-control" name="password" placeholder="password" value="123">
            </div>

            <button type="submit" class="btn btn-primary pull-right">Save</button>
            <br>
            <br>
        </form>
    </div>
</div>
<script>
    $( ".alert-success").delay(5000).slideToggle();
</script>