<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Page</title>
    <link rel="stylesheet" href="css/users-index.css">
</head>
<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "employees-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<!-- navbar for the employee page -->
<body>
   =
    <div id="third-submenu">
        <div class="menu-left">
        Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
        </div>
        <div class="menu-right">
            <a href="index.php?page=employees&subpage=emplist">List Employee</a>
            <a href="index.php?page=employees&subpage=empcreate">New Employee</a>
            <a href="index.php?page=employees&subpage=empchart">Position Chart</a>

        </div>
    </div>
    <div id="subcontent">
        <?php
        switch($subpage){
            case 'empcreate':
                require_once 'employees-module/create-employees.php';
                break; 
            case 'empchart':
                require_once 'employees-module/piechartemployees.php';
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