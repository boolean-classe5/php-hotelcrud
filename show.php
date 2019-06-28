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

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);

?>
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
?>

 <div id="main" class="container">
   <div class="row">
     <div class="col-4">
       <h1>Stanza id: <?php echo $id_stanza ?></h1>
       <?php
       if($result && $result->num_rows > 0) {
         $row = $result->fetch_assoc();
         ?>
         <div class="card">
           <div class="card-body">
             <h5 class="card-title">Stanza numero: <?php echo $row['room_number'] ?></h5>
             <p class="card-text">
               <ul>
                 <li><strong>Piano:</strong> <?php echo $row['floor'] ?></li>
                 <li><strong>Numero letti:</strong> <?php echo $row['beds'] ?></li>
                 <li><strong>Inserita il:</strong> <?php echo $row['created_at'] ?></li>
                 <li><strong>Aggiornata il:</strong> <?php echo $row['updated_at'] ?></li>
               </ul>
             </p>
             <a href="index.php" class="btn btn-primary">Vedi tutte le stanze</a>
           </div>
         </div>
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

 <?php include 'layout/footer.php';
 $conn->close();
 ?>
