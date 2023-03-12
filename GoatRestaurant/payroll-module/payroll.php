<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Employee Attendance</title>
	<link rel="stylesheet" type="text/css" href="css/payroll.css">
</head>
<body>
	<?php
  
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "test";
		$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
		$options = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
		    $pdo = new PDO($dsn, $user, $password, $options);
		} catch (\PDOException $e) {
		    throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}

		// Fetch attendance data from the database
		$sql = "SELECT employee_id, time_in, time_out FROM employee_schedule";
		$stmt = $pdo->query($sql);

		// Display attendance data in a HTML table
		echo "<table>";
		echo "<tr><th>EmployeeId</th><th>Status</th><th>Hours Worked</th><th>Payout</th></tr>";
		while ($row = $stmt->fetch()) {
			echo "<tr>";
			echo "<td>".$row["employee_id"]."</td>";
			

			// Call the function to calculate attendance status, hours worked, and payroll based on time_in and time_out
			list($status, $hours_worked, $payout) = calculate($row["time_in"], $row["time_out"]);

			echo "<td>".$status."</td>";
			echo "<td>".$hours_worked."</td>";
			echo "<td>".$payout."</td>";
			echo "</tr>";
		}
		echo "</table>";

		// Close the database connection
		$pdo = null;
	?>

</body>
</html>