<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
?>
<div id="main" class="container">
  <div class="row">
    <div class="col-12">
      <h1>Creazione nuova stanza</h1>
        <form method="post" action="create_manager.php">
          <div class="form-group">
            <label for="room_number">Numero stanza:</label>
            <input class="form-control" type="text" placeholder="inserisci il numero della stanza" value="" name="room_number">
          </div>
          <div class="form-group">
            <label for="piano">Piano:</label>
            <input class="form-control" type="number" placeholder="inserisci il piano della stanza" value="" name="floor">
          </div>
          <div class="form-group">
            <label for="beds">Numero letti:</label>
            <input class="form-control" type="number" placeholder="inserisci il numero di letti della stanza" value="" name="beds">
          </div>
          <div class="form-group">
            <input type="submit" value="Crea" class="btn btn-success">
          </div>
        </form>
    </div>
  </div>
</div>

<?php
include 'layout/footer.php';
?>
