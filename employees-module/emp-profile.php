<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="css/updatestyle.css">
  </head>
  <!-- update employee profile -->
  <body>
    <div class="wrapper">
      <h1>Update Profile</h1>
      <form method="POST" action="processes/process-employee.php?action=update">
        <input type="hidden" id="EmployeeId" class="input" name="EmployeeId" value="<?php echo $employee->get_EmployeeId($id);?>">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" class="input" name="firstname"  value="<?php echo $employee->get_firstname($id);?>">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" class="input" name="lastname" value="<?php echo $employee->get_lastname($id);?>" >
        <label for="contactnumber">Contact Number:</label>
        <input type="text" id="contactnumber" class="input" name="contactnumber" value="<?php echo $employee->get_contactnumber($id);?>" placeholder="Your Contact Number..">
        <label for="email">Email:</label>
        <input type="text" id="email" class="input" name="email" value="<?php echo $employee->get_email($id);?>" placeholder="Your email..">
        <input type="hidden" name="action" value="update">
        <label for="address">Address:</label>
        <input type="text" id="address" class="input" name="address" value="<?php echo $employee->get_address($id);?>" placeholder="Your address..">
        <input type="hidden" name="action" value="update">
        <input type="submit" value="Update"> 
      </form>
      <form action="processes/process-employee.php?action=delete" method="POST">
        <input type="hidden" name="EmployeeId" value="<?php echo $employee->get_EmployeeId($id); ?>">
        <input type="submit" style = "background-color: crimson;" value="Delete Employee"> 
      </form>
    </div>
  </body>
</html>