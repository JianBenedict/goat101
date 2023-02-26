<?php
include 'config/config.php';
include 'classes/class.user.php';

 $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
 $subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
 $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
 $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';


?>


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
    <a href="index.php?page=dashboard">Homepage</a>
    <a href="#header2">View Payout</a>
    <a href="index.php?page=attendance">View Employees</a>
    <a href="index.php?page=database">Register Employee</a>
  </div>

  <div class="header-right">
    <a href="logout.php">Log-out</a>
  </div>
</div>

<?php
      switch($page){
                case 'database':
                    require_once 'empdatabase/database.php';
                break;
                case 'attendance':
                    require_once 'attendance/attendance.php';
                break; 
                case 'dashboard':
                    require_once 'homepage.php';
                break; 
                default:
                    require_once 'index.php';
                break; 
            }
        ?>
        </body>
</html>