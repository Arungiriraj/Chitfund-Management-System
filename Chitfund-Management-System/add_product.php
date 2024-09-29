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
$description = $_POST['description'];
$duration = $_POST['duration'];
$query = "SELECT MAX(product_id) FROM product_details";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$nextProductNumber = $row['MAX(product_id)'] + 1;
$sql1 = "INSERT INTO product_details (product_id, name, description, duration) VALUES ($nextProductNumber,'$name', '$description', '$duration')";
if ($conn->query($sql1) === TRUE) {
    header("Location: schemepage.php");
    exit();
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$conn->close();
?>
