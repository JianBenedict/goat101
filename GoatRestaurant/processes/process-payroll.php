<?php
// the function to get the total payroll and the employee status

function calculate($time_in, $time_out) {
    $status = "";
    $payroll = 0;
    $hours_worked = 0;
    $time_in = strtotime($time_in);
    $time_out = strtotime($time_out);
    $expected_hours = 8;
    
    if ($time_in == false || $time_out == false) {
        $status = "Invalid time";
    } else if ($time_in > strtotime("8:00 AM")) {
        $status = "Late";
        $hours_worked = min(($time_out - $time_in) / 3600, 8); 
        $payroll = (int) ($hours_worked * 40); 
    } else if ($time_out <= strtotime("5:00 PM")) {
        if (($time_out - $time_in) / 3600 < $expected_hours) {
            $status = "UnderTime";
        } else {
            $status = "On Schedule";
        }
        $hours_worked = min(($time_out - $time_in) / 3600, 8); 
        $payroll = (int) ($hours_worked * 40);
    } else if ($hours_worked < $time_out) {
        $status = "OverTime";
        $hours_worked = min(($time_out - $time_in) / 3600, 24); 
        $payroll = (int) max (($hours_worked * 40) / 3600, 320); 
    } else {
        $status = "Absent";
        $payroll = 0;
    }
    return array($status, $hours_worked, $payroll);
}

?>