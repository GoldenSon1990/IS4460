<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Permit</title>
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
        <li><a href="viewpermit.php">View Permit</a></li>
        <li><a href="addpermit.php">Add Permit</a></li>
		<li><a href="updatepermit.php">Update Permit</a></li>
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
    $PERMIT_ID = $_POST['id'];

    $query = "DELETE FROM PERMIT WHERE PERMIT_ID='$PERMIT_ID'";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    header("Location: deletepermit.php");
}

$query = "SELECT * FROM PERMIT";
$result = $conn->query($query);
if (!$result) die($conn->error);

echo <<<_END
<form method='post' action='deletepermit.php'>
<table>
  <tr>
    <th>PERMIT_ID</th>
    <th>Permit_Type</th>
    <th>Expire_Date</th>
  </tr>
_END;

$rows = $result->num_rows;
for ($i = 0; $i < $rows; $i++) {
    $result->data_seek($i);
    $row = $result->fetch_assoc();

    $formatted_date = date('Y-m-d', strtotime($row['Expire_Date']));

    echo <<<_END
    <tr>
      <td>{$row['PERMIT_ID']}</td>
      <td>{$row['Permit_Type']}</td>
      <td>$formatted_date</td>
      <td><button type='submit' name='delete' value='Delete'><input type='hidden' name='id' value='{$row['PERMIT_ID']}'>Delete</button></td>
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
