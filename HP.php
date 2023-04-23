<!DOCTYPE html>
<html>
  <head>
    <title>Parking Permit Website</title>
    <?php
    $hn='localhost:3306';
    $db='parking';
    $un='root';
    $pw='';
    ?>
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
        margin: 50px auto;
        max-width: 400px;
      }
      h2 {
        text-align: center;
      }
      form {
        border: 1px solid #ccc;
        padding: 20px;
        margin-top: 20px;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="text"], input[type="password"], input[type="submit"] {
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Parking Permit Website</h1>
    </header>

    <nav>
      <ul>
        <li><a href="viewviolation.php">Violations</a></li>
        <li><a href="viewpermit.php">Permits</a></li>
        <li><a href="viewvehicle.php">Vehicle Information</a></li>
        <li><a href="viewparkinglot.php">Parking Lots</a></li>
		<li><a href="viewdriver.php">Driver</a></li>
		<li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <main>
      <h2>Welcome to the Parking Permit Website</h2>
  </body>
  	 <body>
    <div style="text-align: center;">
      <img src="LATW.jpg" alt="My Image">
    </div>
  </body>
</html>
