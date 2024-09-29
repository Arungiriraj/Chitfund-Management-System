<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $host = "localhost"; 
    $username = "root"; 
    $password_db = ""; 
    $database = "chitfunds"; 
    $conn = new mysqli($host, $username, $password_db, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM user_details WHERE mobile_number='$phone' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['role'] = $row['role'];
        
        if ($_SESSION['role'] === 'admin') {
            header('Location: adminpage.html');
        } 
        else {
            header('Location: userpage.html');
        }
    } 
    else {
        echo "Invalid username or password. <a href='login.php'>Try again</a>";
    }
    
    $conn->close();
}
?>

