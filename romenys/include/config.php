<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'oj55dm22&*');
define('DB', 'app_assurances');

function connect(){
  return mysqli_connect(HOST, USER, PASSWORD, DB); //bool
}
?>
