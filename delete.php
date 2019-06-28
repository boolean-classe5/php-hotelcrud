<?php

include 'db_config.php';
include 'functions.php';

$conn = connect_db($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

$id_stanza = intval($_GET['id']);
$sql = "DELETE FROM stanze WHERE id = ";
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
        <h1>Stanza cancellata</h1>
      <?php } else { ?>
        <h1>Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
     <?php } ?>
     <a href="index.php" class="btn btn-primary">Torna alla home</a>
    </div><!-- .col-12 -->
  </div><!-- .row -->
</div><!-- .container -->
 <?php include 'layout/footer.php';
 $conn->close();
 ?>
