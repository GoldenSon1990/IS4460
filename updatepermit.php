<!DOCTYPE html>
<html>
  <head>
    <title>Update Permit</title>
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
      <h1>Update Permit</h1>
    </header>
    <nav>
      <ul>
        <li><a href="HP.php">Home</a></li>
        <li><a href="viewpermit.php">View Permit</a></li>
        <li><a href="addpermit.php">Add Permit</a></li>
        <li><a href="deletepermit.php">Delete Permit</a></li>
      </ul>
    </nav>
    <main>
      <h2>Update Permit</h2>
      <form action="updatepermit.php" method="POST">
        <label for="PERMIT_ID">Permit:</label>
        <?php
          require_once 'db.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);
		  
		  if (isset($_GET["PERMIT_ID"])){
		  
		  $PERMIT_ID = $_GET['PERMIT_ID'];

          $query = "SELECT * FROM PERMIT WHERE PERMIT_ID = $PERMIT_ID";
          $result = $conn->query($query);
          if (!$result) die($conn->error);

		while ($row = $result->fetch_assoc()) {
            
echo <<<_END
   <form method='post' action='updatepermit.php'>
   <br>
        <label for="PERMIT_ID">PERMIT_ID:</label>
        <input type="text" id="PERMIT_ID" value='$row[PERMIT_ID]' name="PERMIT_ID" required>
        <br>
		 <label for="Permit_Type">Permit_Type:</label>
        <input type="text" id="Permit_Type" value='$row[Permit_Type]' name="Permit_Type" required>
        <br>
        <label for="Expire_Date">Year:</label>
        <input type="text" id="Expire_Date" value='$row[Expire_Date]' name="Expire_Date" required>
        <br>
        <input type="submit" value="Update Permit" name="update_permit">
		<input type='hidden' value='$row[PERMIT_ID]' name='permit_id'>
	</form>
_END;

			}
			
          }		
				
          //$conn->close();
        ?>
       
		     
			 <?php
        
		
		
		if (isset($_POST["update_permit"])) {
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $PERMIT_ID = $_POST['PERMIT_ID'];
          $Permit_Type = $_POST['Permit_Type'];
          $Expire_Date = $_POST['Expire_Date'];
          

          $query = "UPDATE PERMIT SET PERMIT_ID='$PERMIT_ID', Permit_Type='$Permit_Type', Expire_Date='$Expire_Date' WHERE PERMIT_ID='$PERMIT_ID'";
          $result = $conn->query($query);

          if (!$result) {
            echo "Update failed: " . $conn->error;
          } else {
            echo "Permit updated successfully!";
          }

          $conn->close();
        }
      ?>
      </form>

    </main>
  </body>
</html>