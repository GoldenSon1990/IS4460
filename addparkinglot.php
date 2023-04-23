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
        <li><a href="viewparkinglot.php">View Lots</a></li>
        <li><a href="addparkinglot.php">Add Lots</a></li>
        <li><a href="deleteparkinglot.php">Delete Lots</a></li>
      </ul>
    </nav>
    <main>
<?php

require_once 'db.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
<form action="addparkinglot.php" method="post">
	
	<pre>
	
	Lot ID <input type="text" name="Lot_ID"></br></br>
	Permit_Type_1 <input type="text" name="Permit_Type_1"></br></br>
	Permit_Type_2 <input type="text" name="Permit_Type_2"></br></br>
	Address <input type="text" name="Address"></br></br>
	Capacity <input type="text" name="Capacity"></br></br>
	
	
	<input type="submit" name="ADD RECORD">
	</br></br>
	</pre>
</form>
_END;

if (isset($_POST['Lot_ID']) &&
	isset($_POST['Permit_Type_1']) &&
	isset($_POST['Permit_Type_2']) &&
	isset($_POST['Address']) &&
	isset($_POST['Capacity']))
	
	{
	
	$Lot_ID=get_post($conn, 'Lot_ID');
	$Permit_Type_1=get_post($conn, 'Permit_Type_1');
	$Permit_Type_2=get_post($conn, 'Permit_Type_2');
	$Address=get_post($conn, 'Address');
	$Capacity=get_post($conn, 'Capacity');

		
	$query="INSERT INTO parking_lot (Lot_ID, Permit_Type_1, Permit_Type_2, Address, Capacity) VALUES ".
		"('$Lot_ID', '$Permit_Type_1', '$Permit_Type_2', '$Address','$Capacity')";
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
