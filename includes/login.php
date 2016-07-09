<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 
	// Gets username and password from login form
	if(isset($_POST['login'])) {

		$login_username = $_POST['username'];
		$login_password = $_POST['password'];

	}
	// cleans up the user's input for username and password
	$login_username = mysqli_real_escape_string($connection, $login_username);
	$login_password = mysqli_real_escape_string($connection, $login_password);

	$query = "SELECT * FROM users WHERE username = '{$login_username}' ";
	$select_user_query = mysqli_query($connection, $query);

	if(!$select_user_query) {
		die("Query failed " . mysqli_error($connection));
	}

	while($row = mysqli_fetch_array($select_user_query)) {

		$user_id = $row['user_id'];
		$username = $row['username'];
		$password = $row['user_password'];
		$user_firstName = $row['user_firstName'];
		$user_lastName = $row['user_lastName'];
		$user_role = $row['user_role'];
		$user_status = $row['user_status'];


	}
	// If username and password are not in database, redirect to index
	if($login_username !== $username && $login_password !== $password ) {
		header("Location: ../index.php");
	} elseif ($login_username == $username && $login_password == $password) { // If username and password are in database user is logged in 
		// Logged in user's session is created and below information is stored in session
		$_SESSION['username'] = $username;
		$_SESSION['user_firstName'] = $user_firstName;
		$_SESSION['user_role'] = $user_role;
		$_SESSION['user_status'] = $user_status;

		// Logged in user is redirected to admin portal
		header("Location: ../admin");
	} else { // If all else fails user is redirected to index
		header("Location: ../index.php");
	}

?>