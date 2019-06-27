<?php

include 'db_config.php';
include 'functions.php';

$conn = connect_db($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

if(empty($_POST)) {
  echo "si è verificato un errore";
  exit();
}

//recupero i dati ricevuti in POST
$id = intval($_POST['id']);
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id";

$result = $conn->query($sql);

?>
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
?>

<div id="main" class="container">
  <div class="row">
    <div class="col-12">
      <?php var_dump($result); ?>
    </div>
  </div>
</div>
<?php
include 'layout/footer.php';
$conn->close();
?>
