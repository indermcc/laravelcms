<?php

function getFormatedDate($date) {
  return $date->format('d-m-Y h:i');
}

function gA($model,$exit=true) {
  $args = func_get_args();
  $args = [$args[0]->getAttributes()];
  call_user_func_array('dump',$args);
  if($exit)
    die();
}

function ce($var,$exit=true) {
  echo "<pre>";
  print_r($var);
  echo "</pre>";
  if($exit)
    exit;
}

function aI($arr,$index,$default=null) {
  return isset($arr[$index]) ? $arr[$index] : $default;
}

?>
