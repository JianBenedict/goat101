<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $employee_id = $_POST["EmployeeID"];
    $action = $_POST["action"];


    date_default_timezone_set('Asia/Manila');
    $datetime = date("h:i A");

  
    $stmt = $conn->prepare("SELECT * FROM employee_schedule WHERE employee_id = :employee_id");
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
       
        $stmt = $conn->prepare("UPDATE employee_schedule SET time_out = :datetime WHERE employee_id = :employee_id");
        $stmt->bindParam(':datetime', $datetime);
        $stmt->bindParam(':employee_id', $employee_id);
    } else {
    
        $stmt = $conn->prepare("INSERT INTO employee_schedule (employee_id, time_in) VALUES (:employee_id, :datetime)");
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':datetime', $datetime);
    }

    try {
        $stmt->execute();
        echo "" . strtolower($action) . " recorded successfully. ";
        header("Location: ../timein.php");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


$conn = null;
?> 