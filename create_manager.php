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
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);

$sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($room_number, $floor, $beds, NOW(), NOW())";

$result = $conn->query($sql);
?>

<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
?>
<div id="main" class="container">
  <div class="row">
    <div class="col-12">
      <?php if($result) { ?>
        <h1>Stanza inserita con successo!</h1>
      <?php } else { ?>
        <h1>Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
      <?php } ?>
      <a href="index.php" class="btn btn-primary">Torna alla home</a>
    </div>
  </div>
</div>
<?php
include 'layout/footer.php';
$conn->close();
?>
