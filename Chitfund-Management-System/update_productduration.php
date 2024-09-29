<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chitfunds";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['name'];
$duration = $_POST['duration'];
$sql1 = "UPDATE product_details SET duration='$duration' WHERE name='$name'";
if ($conn->query($sql1) === TRUE) {
    header("Location: schemepage.php");
    exit();
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$conn->close();
?>
