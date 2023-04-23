<!DOCTYPE html>
<html>
  <head>
    <title>Update Violation</title>
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
      <h1>Update Violation</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewviolation.php">View Violation</a></li>
        <li><a href="addviolation.php">Add Violation</a></li>
        <li><a href="deleteviolation.php">Delete Violation</a></li>
	<li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <main>
      <h2>Update Violation</h2>
      <form action="updateviolation.php" method="POST">
        <label for="VIOLATION_ID">Violation:</label>
        <?php
          require_once 'db.php';
	      require_once 'checksession.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);
		  
		  if (isset($_GET["VIOLATION_ID"])){
		  
		  $VIOLATION_ID = $_GET['VIOLATION_ID'];

          $query = "SELECT * FROM VIOLATION WHERE VIOLATION_ID = $VIOLATION_ID";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
	  
		while ($row = $result->fetch_assoc()) {
            
echo <<<_END
   <form method='post' action='updateviolation.php'>
   <br>
        <label for="VIOLATION_ID">Make:</label>
        <input type="text" id="VIOLATION_ID" value='$row[VIOLATION_ID]' name="VIOLATION_ID" required>
        <br>
		 <label for="Violation_Type">Model:</label>
        <input type="text" id="Violation_Type" value='$row[Violation_Type]' name="Violation_Type" required>
        <br>
        <label for="Date">Year:</label>
        <input type="text" id="Date" value='$row[Date]' name="Date" required>
        <br>
        <input type="submit" value="Update Violation" name="update_violation">
		<input type='hidden' value='$row[VIOLATION_ID]' name='VIOLATION_id'>
	</form>
_END;

			}
			
          }		
				
          //$conn->close();
        ?>
       
		     
			 <?php
        
		
		
		if (isset($_POST["update_violation"])) {
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $VIOLATION_ID = $_POST['VIOLATION_ID'];
          $Violation_Type = $_POST['Violation_Type'];
          $Date = $_POST['Date'];
          

          $query = "UPDATE VIOLATION SET VIOLATION_ID='$VIOLATION_ID', Violation_Type='$Violation_Type', Date='$Date' WHERE VIOLATION_ID='$VIOLATION_ID'";
          $result = $conn->query($query);

          if (!$result) {
            echo "Update failed: " . $conn->error;
          } else {
            echo "Violation updated successfully!";
          }

          $conn->close();
        }
      ?>
      </form>

    </main>
  </body>
</html>
