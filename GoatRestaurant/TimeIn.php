<!DOCTYPE html>
<html>
<head>
	<title>Employee Time-In/Time-Out System</title>
	<link rel="stylesheet" href="css/timein.css">
</head>
<body>
	<div class="container">
		<h1>Welcome to Goat 101</h1>
		<div id="datetime"></div>
		<form method="post" action="processes/process-time.php">
			<div class="employee-id">
				<label for="EmployeeID">Employee ID:</label>
				<input type="text" id="EmployeeID" name="EmployeeID">
			</div>
			<div class="timein-timeout">
				<input type="radio" id="timein" name="action" value="timein" checked>
  				<label for="timein">Time In</label>
  				<input type="radio" id="timeout" name="action" value="timeout">
  				<label for="timeout">Time Out</label>
			</div>
			<div class="buttons">
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
	<script>
		function updateTime() {
			var now = new Date();
			var datetime = document.getElementById('datetime');
			datetime.innerHTML = now.toLocaleString();
		}
		setInterval(updateTime, 1000);
	</script>
</body>
</html>