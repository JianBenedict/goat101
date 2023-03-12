<?php

// Function to calculate attendance status, hours worked, and payroll based on time_in and time_out
function calculate($time_in, $time_out) {
    $status = "";
    $payroll = 0;
    $hours_worked = 0;
    $time_in = strtotime($time_in);
    $time_out = strtotime($time_out);
    if ($time_in == false || $time_out == false) {
        $status = "Invalid time";
    } else if ($time_in > strtotime("8:00 AM")) {
        $status = "Late";
        $hours_worked = min(($time_out - $time_in) / 3600, 8); // Limit to 8 hours
        $payroll = (int) ($hours_worked * 35); // Pay $35 per hour worked
    } else if ($time_out <= strtotime("5:00 PM")) {
        $status = "On time";
        $hours_worked = min(($time_out - $time_in) / 3600, 8); // Limit to 8 hours
        $payroll = (int) ($hours_worked * 40); // Pay $35 per hour worked
    } else {
        $status = "Absent";
        $payroll = 0;
    }
    return array($status, $hours_worked, $payroll);
}

?>