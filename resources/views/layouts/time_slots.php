<?php
/*
function show_time_slots($start_time, $end_time, $duration, $break){

  $time_slots = array();
  $start_time = strtotime($start_time);
  $end_time = strtotime($end_time);
  $add_mins  = $duration * 60;
  while ($start_time <= $end_time)
  {
    $time_slots[] = date("H:i", $start_time);
    $start_time += $add_mins;
  }
  $time_slots = array_diff( $time_slots, $break );
  return $time_slots;

}
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$duration = $_POST['duration'];
$break = $_POST['break'];
$time_slots = show_time_slots($start_time, $end_time, $duration, $break);
header('Content-Type: application/json');
echo json_encode($time_slots);*/
?>