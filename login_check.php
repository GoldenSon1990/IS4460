<?php
session_start();

require_once 'db.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$username = $_POST['username'];
$password = $_POST['password'];

$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

$query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($query);
if (!$result) die($conn->error);

$rows = $result->num_rows;
if ($rows) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $result->close();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        header("Location: HP.php");
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid username or password.";
}

$conn->close();
?>
