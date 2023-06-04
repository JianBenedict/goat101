<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/users-main.css">
	<title>Employee List</title>
</head>

<span id= "search-result">
  
<body>

<div id="download-buttons">
    <form method="POST" action="reports-module/excell-employees.php">
        <button class="excel-button">Download Excel</button>
    </form>

    <form method="POST" action="reports-module/pdf-employee.php">
        <button class="pdf-button">Download PDF  </button>
    </form>
</div>

  <table id="data-list">
    <thead>
      <tr>
         <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Position</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count= 1;
      if($employee->list_employee() != false){
        foreach($employee->list_employee() as $value){
          extract($value);
      ?>
          <tr>
            <td><?php echo $EmployeeId;?></td>
            <td><a href="index.php?page=employees&subpage=profile&id=<?php echo $EmployeeId;?>"><?php echo $firstname;?></a></td>
            <td><?php echo $lastname;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $contactnumber;?></td>
            <td><?php echo $address;?></td>
            <td><?php echo $type;?></td>
          </tr>
      <?php
          $count++;
        }
      }else{
        echo "<tr><td colspan='5'>No Record Found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>



