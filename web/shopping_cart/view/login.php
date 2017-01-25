<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>

<body>
	<p>Log in Page</p>

	<form action="/shopping_cart/index.php" method="post">
		<input type="hidden" name="action" value="login">
		<input type="text" name="username" placeholder="Username">
		<br />
		<input type="submit" value="Login">
	</form>

</body>

</html>
