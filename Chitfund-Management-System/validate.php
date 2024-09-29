<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile_number = $_POST['mobile_number'];
    $password =$_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } 
    elseif (!preg_match('/^[0-9]{10}$/', $mobile_number)) {
        echo "Invalid mobile number format. Please enter a 10-digit number.";
    } 
    else {
        $conn = new mysqli("localhost", "root", "", "chitfunds");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT MAX(user_id) FROM user_details";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $nextUserNumber = $row['MAX(user_id)'] + 1;
        $sql = "INSERT INTO user_details (user_id,first_name, last_name, mobile_number, password) VALUES (?,?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nextUserNumber,$first_name, $last_name, $mobile_number, $password);

        if ($stmt->execute()) {
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
}
?>

