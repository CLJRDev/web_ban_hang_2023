<?php
  function format_date_vn($date){
    $parts=explode('-', $date);
    return $parts[2].'/'.$parts[1].'/'.$parts[0];
  }
  function format_date_db($date){
    $parts=explode('/', $date);
    return $parts[2].'-'.$parts[1].'-'.$parts[0];
  }
  function format_vn_number($number){
    return number_format($number,0,",",".");
  }
?>