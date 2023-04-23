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
      <h1>Update Driver</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewdriver.php">View drivers</a></li>
        <li><a href="adddriver.php">Add drivers</a></li>
        <li><a href="deletedrivers.php">Delete drivers</a></li>
	<li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <main>
      <h2>Update Driver</h2>
      <form action="updatedriver.php" method="POST">
        <label for="DRIVER_ID">Driver:</label>
        <?php
          require_once 'db.php';
	  require_once 'checksession.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);
		  
		  if (isset($_GET["DRIVER_ID"])){
		  
		  $DRIVER_ID = $_GET['DRIVER_ID'];

          $query = "SELECT * FROM DRIVER WHERE DRIVER_ID = $DRIVER_ID";
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
   <form method='post' action='updatedriver.php'>
   <br>
        <label for="DRIVER_ID">DRIVER_ID:</label>
        <input type="text" id="DRIVER_ID" value='$row[DRIVER_ID]' name="DRIVER_ID" required>
        <br>
		 <label for="First_Name">Model:</label>
        <input type="text" id="First_Name" value='$row[First_Name]' name="First_Name" required>
        <br>
        <label for="Last_Name">Year:</label>
        <input type="text" id="Last_Name" value='$row[Last_Name]' name="Last_Name" required>
        <br>
		 <label for="Type">Color:</label>
        <input type="text" id="Type" value='$row[Type]' name="Type" required>
        <br>
        <input type="submit" value="Update Driver" name="update_driver">
		<input type='hidden' value='$row[DRIVER_ID]' name='driver_id'>
	</form>
_END;

			}
			
          }		
				
          //$conn->close();
        ?>
       
		     
			 <?php
        
		
		
		if (isset($_POST["update_driver"])) {
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $DRIVER_ID = $_POST['driver_id'];
          $First_Name = $_POST['First_Name'];
          $Last_Name = $_POST['Last_Name'];
		  $Type = $_POST['Type'];

          

          $query = "UPDATE DRIVER SET driver_id='$DRIVER_ID', First_Name='$First_Name', Last_Name='$Last_Name', Type='$Type' WHERE DRIVER_ID='$DRIVER_ID'";
          $result = $conn->query($query);

          if (!$result) {
            echo "Update failed: " . $conn->error;
          } else {
            echo "Driver updated successfully!";
          }

          $conn->close();
        }
      ?>
      </form>

    </main>
  </body>
</html>
