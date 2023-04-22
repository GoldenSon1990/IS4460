
<!DOCTYPE html>
<html>
  <head>
    <title>View/Add Permit</title>
    
    
    <?php
require_once('sessioncheck.php');
?>

    
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
      }
      
      h1 {
        color: #ff0000;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
      }
      
      h2 {
        font-size: 24px;
        margin-top: 30px;
      }
      
      form {
        margin-top: 20px;
      }
      
      label {
        display: block;
        margin-bottom: 10px;
      }
      
      select, input[type="date"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        margin-bottom: 20px;
        width: 100%;
      }
      
      input[type="submit"] {
        background-color: #ff0000;
        border: none;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: #990000;
      }
    </style>
  </head>
  <body>
    <h1>View/Add Permit</h1>
    <h2>Current Permit Information:</h2>
    <p>Permit Type: Residential</p>
    <p>Permit Expiration Date: 12/31/2023</p>
    <form>
      <h2>Update Permit Information:</h2>
      <label for="permittype">Permit Type:</label>
      <select id="permittype" name="permittype">
        <option value="residential">Residential</option>
        <option value="commercial">Commercial</option>
        <option value="visitor">Visitor</option>
      </select>
      <br><br>
      <label for="expirationdate">Permit Expiration Date:</label>
      <input type="date" id="expirationdate" name="expirationdate" value="2023-12-31">
      <br><br>
      <input type="submit" value="Save">
    </form>
  </body>
</html>
