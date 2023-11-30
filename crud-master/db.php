<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'crud_master'
) or die(mysqli_error($conn));
?>