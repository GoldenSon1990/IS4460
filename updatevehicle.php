<!DOCTYPE html>
<html>
  <head>
    <title>Update Vehicle</title>
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
      <h1>Update Vehicle</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewvehicle.php">View Vehicles</a></li>
        <li><a href="addvehicle.php">Add Vehicle</a></li>
        <li><a href="updatevehicle.php">Update Vehicle</a></li>
        <li><a href="deletevehicle.php">Delete Vehicle</a></li>
	<li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <main>
      <h2>Update Vehicle</h2>
      <form action="updatevehicle.php" method="POST">
        <label for="vehicle_id">Vehicle:</label>
        <?php
          require_once 'db.php';
	      require_once 'checksession.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);
		  
		  if (isset($_GET["vehicle_id"])){
		  
		  $vehicleid = $_GET['vehicle_id'];

          $query = "SELECT * FROM vehicle WHERE Vehicle_ID = $vehicleid";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
			/*
          echo '<select name="Make>';
          while ($row = $result->fetch_assoc()) {
            echo "<option value=\"{$row['make']}\">{$row['model']} {$row['color']} ({$row['year']})</option>";
          }
          echo '</select>';
				*/
				
		while ($row = $result->fetch_assoc()) {
            
echo <<<_END

   <form method='post' action='updatevehicle.php'>
   <br>
        <label for="make">Make:</label>
        <input type="text" id="make" value='$row[Make]' name="make" required>
        <br>
		 <label for="model">Model:</label>
        <input type="text" id="model" value='$row[Model]' name="model" required>
        <br>
        <label for="year">Year:</label>
        <input type="text" id="year" value='$row[Year]' name="year" required>
        <br>
		 <label for="color">Color:</label>
        <input type="text" id="color" value='$row[Color]' name="color" required>
        <br>
        <label for="license_plate">License Plate:</label>
        <input type="text" id="license_plate" value='$row[License_Plate]' name="license_plate" required>
        <br>
        <input type="submit" value="Update Vehicle" name="update_vehicle">
		<input type='hidden' value='$row[VEHICLE_ID]' name='vehicle_id'>
	</form>
_END;
			
		}
			
			
			
          }		
				
          //$conn->close();
        ?>
       
		     
			 <?php
        
		
		
		if (isset($_POST["update_vehicle"])) {
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $vehicle_id = $_POST['vehicle_id'];
          $make = $_POST['make'];
          $model = $_POST['model'];
		  $color = $_POST['color'];
          $year = $_POST['year'];
		  $license_plate = $_POST['license_plate'];
          

          $query = "UPDATE vehicle SET make='$make', model='$model', year='$year', license_plate='$license_plate', color='$color' WHERE vehicle_id='$vehicle_id'";
          $result = $conn->query($query);

          if (!$result) {
            echo "Update failed: " . $conn->error;
          } else {
            echo "Vehicle updated successfully!";
          }

          $conn->close();
        }
      ?>
      </form>

    </main>
  </body>
</html>
