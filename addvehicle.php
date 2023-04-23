<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Vehicle</title>
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
	
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <h1>Parking Permit Website</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewvehicle.php">View Vehicles</a></li>
        <li><a href="addvehicle.php">Add Vehicle</a></li>
        <li><a href="deletevehicle.php">Delete Vehicle</a></li>
      </ul>
    </nav>
    <main>
<?php

require_once 'db.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="addvehicle.php" method="post">
	<pre>
	Make <input type="text" name="Make"></br></br>
	Model <input type="text" name="Model"></br></br>
	Color <input type="text" name="Color"></br></br>
	Year <input type="text" name="Year"></br></br>
	
	<input type="submit" name="ADD RECORD">
	</br></br>
	</pre>
</form>
_END;

if (isset($_POST['Make']) &&
	isset($_POST['Model']) &&
	isset($_POST['Color']) &&
	isset($_POST['Year'])) {
	
	$Make=get_post($conn, 'Make');
	$Model=get_post($conn, 'Model');
	$Color=get_post($conn, 'Color');
	$Year=get_post($conn, 'Year');
		
	$query="INSERT INTO vehicle (Make, Model, Color, Year) VALUES ".
		"('$Make','$Model','$Color','$Year')";
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
