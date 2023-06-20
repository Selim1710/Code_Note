<?php
/*

//  Calculate duration between two times 
$time1 = Carbon::parse($request->time_start);
$time2 = Carbon::parse($request->time_end);
$workingHour = $time2->diffInHours($time1);


// add hour in php
$date_time = "2023-06-06 10:00:00";
$final_time = date("Y-m-d h:i:s", strtotime("$date_time +1 hours"));


// difference between two time in php
$time1 = new DateTime($emp_entry);
$time2 = new DateTime($first_shift_start_time);
$difference = $time1->diff($time2);
$return_time = $difference->format('%H:%I:%S');


// Manually add hour, minute, second in php
$time_1 = "2023-06-06 10:00:00";
$hour_1 = substr($time_1, 11, 2);
$min_1 = substr($time_1, 14, 2);
$sec_1 = substr($time_1, 17, 2);

$time_2 = "2023-06-06 12:00:00";
$hour = substr($time_2, 11, 2);
$min = substr($time_2, 14, 2);
$sec = substr($time_2, 17, 2);

$total_time = ($hour_2 - $hour_1) . ':' . ($min_2 - $min_1) . ':' . ($sec_2 - $sec_1);


// Date-Time Local Value showing
<input type="datetime-local" name="date_start" value="{{ date('Y-m-d\TH:i', strtotime($yourPassedVariableToView)) }}">