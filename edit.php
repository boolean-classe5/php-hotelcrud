<?php

include 'db_config.php';
include 'functions.php';

$conn = connect_db($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}
// recupero l'id della stanza da modificare dal paramentro in GET
$id_stanza = intval($_GET['id']);

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);

?>
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
?>

<div id="main" class="container">
  <div class="row">
    <div class="col-12">
      <h1>Modifica stanza id: <?php echo $id_stanza ?></h1>

      <?php
      if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="edit_manager.php">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <div class="form-group">
            <label for="room_number">Numero stanza:</label>
            <input class="form-control" type="text" placeholder="numero stanza"
              value="<?php echo $row['room_number'] ?>" name="room_number">
          </div>
          <div class="form-group">
            <label for="piano">Piano:</label>
            <input class="form-control" type="number" placeholder="piano"
              value="<?php echo $row['floor'] ?>" name="floor">
          </div>
          <div class="form-group">
            <label for="beds">Numero letti:</label>
            <input class="form-control" type="number" placeholder="numero letti"
              value="<?php echo $row['beds'] ?>" name="beds">
          </div>
          <div class="form-group">
            <input type="submit" value="Salva" class="btn btn-success">
          </div>
        </form>
        <?php
      } elseif($result) {
        echo "Non ci sono risultati";
      } else {
        echo "Si è verificato un errore";
      }
      ?>

    </div>
  </div>
</div>

<?php
include 'layout/footer.php';
$conn->close();
?>
