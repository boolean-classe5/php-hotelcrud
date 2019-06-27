<?php

include 'db_config.php';
include 'functions.php';

$conn = connect_db($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

$sql = "SELECT * FROM stanze";
$result = $conn->query($sql);

?>

<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>
    <div id="main" class="container">
      <div class="row">
        <div class="col-12">
          <h1>Tutte le stanze dell'hotel</h1>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Room Number</th>
                <th class="text-center">Floor</th>
                <th class="text-center">Beds</th>
                <th class="text-right">Created At</th>
                <th class="text-right">Updated At</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td class="text-center"><?php echo $row['id'] ?></td>
                      <td class="text-center"><?php echo $row['room_number'] ?></td>
                      <td class="text-center"><?php echo $row['floor'] ?></td>
                      <td class="text-center"><?php echo $row['beds'] ?></td>
                      <td class="text-right"><?php echo $row['created_at'] ?></td>
                      <td class="text-right"><?php echo $row['updated_at'] ?></td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="show.php?id=<?php echo $row['id'] ?>"
                            type="button" class="btn btn-primary">
                            Visualizza
                          </a>
                          <a href="edit.php?id=<?php echo $row['id'] ?>"
                            type="button" class="btn btn-secondary">
                            Modifica
                          </a>
                          <a href="#" type="button" class="btn btn-danger">Cancella</a>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }
                } elseif($result) {
                  echo "Non ci sono risultati";
                } else {
                  echo "Si è verificato un errore";
                }
               ?>
             </tbody>
          </table>
        </div><!-- .col-12 -->
      </div><!-- .row -->
    </div><!-- .container -->

<?php include 'layout/footer.php';
$conn->close();
?>
