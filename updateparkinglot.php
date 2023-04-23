<!DOCTYPE html>
<html>
  <head>
    <title>Update Parking Lot</title>
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
      <h1>Update Parking Lot</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewparkinglot.php">View Parking Lot</a></li>
        <li><a href="addparkinglot.php">Add Parking Lot</a></li>
        <li><a href="deleteparkinglot.php">Delete Parking Lot</a></li>
      </ul>
    </nav>
    <main>
      <h2>Update Parking Lot</h2>
      <form action="updateparkinglot.php" method="POST">
        <label for="LOT_ID">Parking Lot:</label>
        <?php
          require_once 'db.php';
	      require_once 'checksession.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);
		  
		  if (isset($_GET["LOT_ID"])){
		  
		  $LOT_ID = $_GET['LOT_ID'];

          $query = "SELECT * FROM PARKING_LOT WHERE LOT_ID = $LOT_ID";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
	
		while ($row = $result->fetch_assoc()) {
            
echo <<<_END
   <form method='post' action='updateparkinglot.php'>
   <br>
        <label for="LOT_ID">LOT_ID:</label>
        <input type="text" id="LOT_ID" value='$row[LOT_ID]' name="LOT_ID" required>
        <br>
		 <label for="Permit_Type_1">Permit_Type_1:</label>
        <input type="text" id="Permit_Type_1" value='$row[Permit_Type_1]' name="Permit_Type_1" required>
        <br>
        <label for="Permit_Type_2">Permit_Type_2:</label>
        <input type="text" id="Permit_Type_2" value='$row[Permit_Type_2]' name="Permit_Type_2" required>
        <br>
		 <label for="Address">Address:</label>
        <input type="text" id="Address" value='$row[Address]' name="Address" required>
        <br>
        <label for="Capacity">Capacity:</label>
        <input type="text" id="Capacity" value='$row[Capacity]' name="Capacity" required>
        <br>
        <input type="submit" value="Update Parking Lot" name="update_parkinglot">
		<input type='hidden' value='$row[LOT_ID]' name='LOT_ID'>
	</form>
_END;

			}
			
          }		
				
          //$conn->close();
        ?>
       
		     
			 <?php
        
		
		
		if (isset($_POST["update_parkinglot"])) {
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $LOT_ID = $_POST['LOT_ID'];
          $Permit_Type_1 = $_POST['Permit_Type_1'];
          $Permit_Type_2 = $_POST['Permit_Type_2'];
		  $Address = $_POST['Address'];
          $Capacity = $_POST['Capacity'];
          

          $query = "UPDATE PARKING_LOT SET LOT_ID='$LOT_ID', Permit_Type_1='$Permit_Type_1', Permit_Type_2='$Permit_Type_2', Address='$Address', Capacity='$Capacity' WHERE LOT_ID='$LOT_ID'";
          $result = $conn->query($query);

          if (!$result) {
            echo "Update failed: " . $conn->error;
          } else {
            echo "Parking Lot updated successfully!";
          }

          $conn->close();
        }
      ?>
      </form>

    </main>
  </body>
</html>
