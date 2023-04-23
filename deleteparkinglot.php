<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Vehicle</title>
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
	<li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
    <main>
<?php

require_once 'db.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']))
{
    $LOTID_ID = $_POST['id'];

    $query = "DELETE FROM parking_lot WHERE LOT_ID='$LOT_ID'";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    header("Location: deleteparkinglot.php");
}

$query = "SELECT * FROM parking_lot";
$result = $conn->query($query);
if (!$result) die($conn->error);

echo <<<_END
<form method='post' action='deleteparkinglot.php'>
<table>
  <tr>
    <th>LOT_ID</th>
    <th>Permit_Type_1</th>
    <th>Permit_Type_2</th>
    <th>Address</th>
    <th>Capacity</th>
    <th>Delete</th>
  </tr>
_END;

$rows = $result->num_rows;
for ($i = 0; $i < $rows; $i++) {
    $result->data_seek($i);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
    <tr>
      <td>$row[0]</td>
      <td>$row[1]</td>
      <td>$row[2]</td>
      <td>$row[3]</td>
      <td>$row[4]</td>
      <td><button type='submit' name='delete' value='Delete'><input type='hidden' name='id' value='$row[0]'>Delete</button></td>
    </tr>
_END;
}

echo <<<_END
</table>
</form>
_END;

$result->close();
$conn->close();

?>
    </div>
  </body>
</html>
