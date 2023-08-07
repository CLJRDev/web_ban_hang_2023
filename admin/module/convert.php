<?php
  function format_date_vn($date){
    $parts=explode('-', $date);
    return $parts[2].'/'.$parts[1].'/'.$parts[0];
  }
  function format_date_db($date){
    $parts=explode('/', $date);
    return $parts[2].'-'.$parts[1].'-'.$parts[0];
  }
?>