<?php
include  'config/config.php';
include_once 'classes/class.user.php';
include_once 'classes/class-employee.php';
include_once 'processes/process-payroll.php';

 $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
 $subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
 $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
 $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';


$admin = new Admin();
$employee = new Employee();

?>
<!-- navbar for the main page -->


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <meta charset="UTF-8">
    <title>Index</title>
  </head>
  <body>
  <div class="header">
  <div class="header-links">
    <a href="index.php?page=Payroll">Payroll </a>
    <a href="index.php?page=Attendance">View Attendance</a>
    <a href="index.php?page=employees">  Employees Settings </a>
    <a href="index.php?page=settings"> Settings </a>
  </div>

  <div class="header-right">
    <a href="logout.php">Log-out</a>
  </div>
</div>

<?php
      switch($page){
                case 'settings';
                    require_once 'users-module/index.php';
                break;
                case 'employees':
                    require_once 'employees-module/index.php';
                break; 
                case 'Payroll':
                    require_once 'payroll-module/payroll.php';
                break; 
                case 'Attendance':
                  require_once 'attendance-module/view.php';
              break; 
                default:
                    require_once 'index.php';
                break; 
            }
        ?>
        </body>
</html>