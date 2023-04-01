<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/users-main.css">
	<title>Admin List</title>
</head>
<body>
<div id="subcontent">
  <table id="data-list">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact Number</th>
      </tr>
    </thead>
    <tbody>
      <!-- view admin list -->
      <?php
      $count = 1;
      if($admin->list_admin() != false){
        foreach($admin->list_admin() as $value){
          extract($value);
      ?>
          <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $firstname;?></td>
            <td><?php echo $lastname;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $contactnumber;?></td>
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