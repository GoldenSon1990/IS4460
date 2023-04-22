

<!DOCTYPE html>
<html>
  <head>
    <title>Violation Payment</title>
    
    <?php
require_once('sessioncheck.php');
?>

    
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
      }
      h1 {
        color: #333333;
      }
      h2 {
        color: #666666;
      }
      label {
        display: block;
        color: #666666;
        font-weight: bold;
        margin-bottom: 10px;
      }
      input[type="submit"] {
        background-color: #ff4d4d;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type="submit"]:hover {
        background-color: #cc0000;
      }
    </style>
  </head>
  <body>
    <h1>Violation Payment</h1>
    <h2>Violation Information:</h2>
    <p>Violation Date: 01/15/2023</p>
    <p>Violation Reason: Parking in a no parking zone</p>
    <p>Violation Amount: $50.00</p>
    <h2>Payment Information:</h2>
    <form>
      <label for="amount">Amount:</label>
      <input type="number" id="amount" name="amount" value="50">
      <br><br>
      <label for="cardnumber">Card Number:</label>
      <input type="text" id="cardnumber" name="cardnumber">
      <br><br>
      <label for="cardname">Cardholder Name:</label>
      <input type="text" id="cardname" name="cardname">
      <br><br>
      <label for="expirationdate">Expiration Date:</label>
      <input type="text" id="expirationdate" name="expirationdate">
      <br><br>
      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv">
      <br><br>
      <input type="submit" value="Submit Payment">
    </form>
  </body>
</html>
