<?php
  include("../include/menu.inc.php");
?>
<div class="container">
  <?php
    if(isset($_GET["id"]))
    {
      echo '<h4>Choix de l\'assurance: </h4>';
      echo '<form class="" action="../controller/addCarController.php" method="POST">';
        echo '<div class="form-group col-md-6">';
          echo '<input type="hidden" name="client_id" value="'.$_GET["id"].'">';
          echo '<label for="name">Nom du vehicule:</label>';
          echo '<input class="form-control" type="text" name="name">';
          echo '<input class="btn btn-success" type="submit" name="OK">';
        echo '</div>';
      echo '</form>';
    }
   ?>
</div>
</body>
</html>
