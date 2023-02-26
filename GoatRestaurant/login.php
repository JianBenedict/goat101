
<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($email,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div id="container">
    <img src="css/goated.png" alt="Logo">
    <h1>Welcome to GOAT 101</h1>
    <div id="login-form">
      <form method="post">
        <label for="email">Username:</label>
        <input type="text" id="email" name="email">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <input type="submit" name="submit" value="Login">
      </form>
    </div>
  </div>

</body>
</html>
