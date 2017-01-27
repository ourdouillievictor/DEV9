<?php
  include("../include/menu.inc.php");
?>
<div class="container">
  <?php
    if(isset($_GET["id"]))
    {
      echo '<h4>Choix de l\'assurance: </h4>';
      echo '<form class="" action="../controller/addInsuranceController.php" method="POST">';
        echo '<div class="form-group col-md-6">';
          echo '<input type="hidden" name="client_id" value="'.$_GET["id"].'">';

          $db = connect();
          if($db){
            $sql = "SELECT * FROM insurance";
            $result = mysqli_query($db,$sql);
            if($result)
            {
              echo '<label for="lastname">Assurance:</label><br>';
              echo '<select multiple name="insurance_id">';
                while($row = mysqli_fetch_array($result))
                {
                  echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                }
              echo '</select><br>';
            }
          }
          echo '<input class="btn btn-success" type="submit" name="OK">';
        echo '</div>';
      echo '</form>';
    }
   ?>
</div>
</body>
</html>
