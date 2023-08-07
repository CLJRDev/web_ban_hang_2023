<?php
  session_start();
  session_destroy();
  header('location: dang_nhap.php', TRUE, 307);
?>