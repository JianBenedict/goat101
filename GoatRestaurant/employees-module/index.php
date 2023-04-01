<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Page</title>
    <link rel="stylesheet" href="css/users-index.css">
</head>
<!-- navbar for the employee page -->
<body>
   =
    <div id="third-submenu">
        <div class="menu-left">
            <h1>  </h1>
        </div>
        <div class="menu-right">
            <a href="index.php?page=employees&subpage=emplist">List Employee</a>
            <a href="index.php?page=employees&subpage=empcreate">New Employee</a>
        </div>
    </div>
    <div id="subcontent">
        <?php
        switch($subpage){
            case 'empcreate':
                require_once 'employees-module/create-employees.php';
                break; 
            case 'modify':
                require_once 'link1';
                break; 
            case 'profile':
                require_once 'employees-module/emp-profile.php';
                break;
            case 'emplist':
                require_once 'employees-module/main.php';
                break;
        }
        ?>
    </div>
</body>
</html>