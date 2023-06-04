<?php
include_once '../classes/class-employee.php';
//include '../config/config.php';
$firstname = new employee();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h4>Search Result(s)</h4><table id="data-list">
<tr>
<th>#</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact Number</th>
<th>Address</th>
</tr>';
$data = $firstname->list_firstname_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
       <tr>
       <td>'.$EmployeeId.'</td>
       <td><a href="index.php?page=employees&subpage=profile&id='.$EmployeeId.'">'.$firstname.'</a></td>
       <td>'.$lastname.'</td>
       <td>'.$email.'</td>
       <td>'. $contactnumber.'</td>
       <td>'.$address.'</td>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>