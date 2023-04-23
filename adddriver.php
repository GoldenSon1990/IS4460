<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Driver</title>
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
        margin: 80px auto;
        max-width: 600px;
      }
      h2 {
        text-align: center;
      }
      form {
        border: 1px solid #ccc;
        padding: 40px;
        margin-top: 20px;
        box-sizing: border-box;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="text"], input[type="password"], input[type="submit"] {
        padding: 10px;
        margin-bottom: 20px;
        width: 70%;
        border: 3px solid #ccc;
        border-radius: 19px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      form pre {
        text-align: center;
      }
    </style>  
  </head>
  <body>
    <header>
      <h1>Parking Permit Website</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewdriver.php">View Drivers</a></li>
        <li><a href="adddriver.php">Add Driver</a></li>
        <li><a href="deletedriver.php">Delete Driver</a></li>
	<li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <main>
<?php

require_once 'db.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="adddriver.php" method="post">
	<pre>
	First_Name <input type="text" name="First_Name"></br></br>
	Last_name <input type="text" name="Last_name"></br></br>
	Type <input type="text" name="Type"></br></br>
	DRIVER_ID <input type="text" name="DRIVER_ID"></br></br>
	
	<input type="submit" name="ADD RECORD">
	</br></br>
	</pre>
</form>
_END;

if (isset($_POST['First_Name']) &&
	isset($_POST['Last_name']) &&
	isset($_POST['Type']) &&
	isset($_POST['DRIVER_ID'])) {
	
	$First_Name=get_post($conn, 'First_Name');
	$Last_name=get_post($conn, 'Last_name');
	$Type=get_post($conn, 'Type');
	$DRIVER_ID=get_post($conn, 'DRIVER_ID');
		
	$query="INSERT INTO DRIVER (First_Name, Last_name, Type, DRIVER_ID) VALUES ".
		"('$First_Name','$Last_name','$Type','$DRIVER_ID')";
	$result=$conn->query($query);
	if(!$result) echo "INSERT failed: $query <br>" .
		$conn->error . "<br><br>";
}

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>
    </main>
  </body>
</html>
