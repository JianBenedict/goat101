<!DOCTYPE html>
<html>
  <!-- view employee attendance -->
  <head>
    <title>Employee Schedule</title>
    <link rel="stylesheet" type="text/css" href="css/attendance.css">
    <script src="jscript/schedulescript.js"></script>
  </head>
  <body>
    <div class="container">
      <header>
        <h1>Employee Schedule</h1>
        <div id="datetime"></div>
      </header>

      <table>
        <thead>
          <tr>
            <th>Employee ID</th>
            <th>Time In</th>
            <th>Time Out</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
            $query = "SELECT * FROM employee_schedule";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0) {
              while($row = mysqli_fetch_assoc($query_run)) {
                echo "<tr><td>" . $row['employee_id'] . "</td><td>" . $row['time_in'] . "</td><td>" . $row['time_out'] . "</td></tr>";
              }
            } else {
              echo "<tr><td colspan='3' class='message'>No Record Found</td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>