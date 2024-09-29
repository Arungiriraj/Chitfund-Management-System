<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $schemepage= $_POST["modal_title"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile = $_POST["mobile_number"];
    $nominee_name = $_POST["nominee_name"];
    $nominee_relationship = $_POST["nominee_relationship"];
    $permanent_address = $_POST["address"];
    $account_holder_name = $_POST["acc_name"];
    $bank_name = $_POST["bank_name"];
    $account_number = $_POST["acc_number"];
    $branch = $_POST["branch"];
    $ifsc_code = $_POST["ifsc"];
    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        echo "Invalid mobile number format. Please enter a 10-digit number.";
    } 
        $conn = new mysqli("localhost", "root", "", "chitfunds");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT user_id FROM user_details WHERE first_name='$first_name' AND last_name='$last_name'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $user_id=$row['user_id'];
        $sql = "INSERT INTO personal_details (user_id,first_name, last_name, mobile_number, nominee_name, nominee_relationship, permantent_address,account_holder_name,bank_name,account_number,branch,ifsc_code,scheme_name) VALUES ('$user_id','$first_name','$last_name','$mobile','$nominee_name','$nominee_relationship','$permanent_address','$account_holder_name','$bank_name','$account_number','$branch','$ifsc_code','$schemepage')";
        $result = $conn->query($sql);
        $conn->close();
}
?>

