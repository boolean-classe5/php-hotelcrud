<?php

function connect_db($servername, $username, $password, $dbname) {
  $conn = new mysqli($servername, $username, $password, $dbname);
  return $conn;
}

?>
