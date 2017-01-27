<?php
  include("../include/menu.inc.php");
?>
<div class="container">
  <?php
    if(isset($_GET["id"]))
    {
      $car = findCar($_GET["id"]);
      echo '<h4>Choix de l\'assurance pour le vehicule: '.$car->getName().'</h4>';
      echo '<form class="" action="../controller/editCarInsuranceController.php" method="POST">';
        echo '<div class="form-group col-md-6">';
          echo '<input type="hidden" name="id" value="'.$car->getId().'">';
          $insur = $car->getInsurance();

          $db = connect();
          if($db){
            $sql = "SELECT * FROM car_insurance";
            $result = mysqli_query($db,$sql);
            if($result)
            {
              echo '<label for="lastname">Assurance:</label><br>';
              echo '<select multiple name="insurance_id">';
                if(isset($insur))
                {
                  echo '<option value="0">non Assurer</option>';
                }
                else {
                  echo '<option selected="selected" value="0">non Assurer</option>';
                }
                while($row = mysqli_fetch_array($result))
                {
                  if(isset($insur) && $row["id"] == $insur->getId())
                  {
                    echo '<option selected="selected" value="'.$row["id"].'">'.$row["name"].'</option>';

                  }else {
                    echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                  }
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
