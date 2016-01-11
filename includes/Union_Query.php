<?php
/**
 * Created by PhpStorm.
 * User: Kokila
 * Date: 12/24/15
 * Time: 11:52 AM
 */

if(isset($_POST['Username']) && $_POST['Password']){
	require_once("Database.php");

	echo "User Inputs :<br>";
	var_dump($_POST);

	$db = Database::getInstance();
	$mysqli = $db->getConnection();


	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$query="select username,password from admin where username='$username' and password='$password' limit 0,1";
	echo "Generated SQl Query:<br>";
	var_dump($query);

	$result = $mysqli->query($query);

	$rows = mysqli_fetch_array($result);
	if($rows)
	{
		?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Welcome Admin!</strong> You have Login as Authorized User !
		</div>
		<?
	}
	else
	{
		?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>UnAuthorized!</strong> Username Password Wrong !
		</div>
		<?
	}
}
?>

<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4" style="background-color: #80cfd9">
        <form action="?page=VulnerableLogin" method="post" role="form">
        	<legend>Authorized Users</legend>

        	<div class="form-group">
        		<label for="Username">Username</label>
        		<input type="text" class="form-control" name="Username" placeholder="username" value="<?echo $_POST['Username']?>">
        	</div>
            <div class="form-group">
        		<label for="Password">Password</label>
        		<input type="text" class="form-control" name="Password" placeholder="username" value="<?echo $_POST['Password']?>">
        	</div>

        	<button type="submit" class="btn btn-primary pull-right">Submit</button>
            <br>
            <br>
        </form>
	</div>
</div>


