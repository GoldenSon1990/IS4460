<!DOCTYPE html>
<html>
<head>
    <title>Student Parking - Login</title>
  	
<?php



require_once "db.php";
require_once "user.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM users WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";

		session_start();
		
		$user = new User($tmp_username);
		$_SESSION['user'] = $user;
		
		header("Location: HP.php");
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();


//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #f44336;
            color: #fff;
            padding: 10px;
        }
        nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        nav li {
            margin: 0;
            padding: 0;
            display: inline-block;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.2s ease-in-out;
        }
        nav a:hover {
            background-color: #b71c1c;
        }
        main {
            margin: 50px auto;
            max-width: 400px;
        }
        h2 {
            text-align: center;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Parking Manager</h1>
    </header>
    <nav>
        <ul>
            
        </ul>
    </nav>
    <main>
        <h2>Login</h2>

	<form method="post" action="login_check.php">
		<h2>Login</h2>
		<label for="username">Username:</label><br>
		<input type="text" id="username" name="username" required><br>
		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password" required><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
