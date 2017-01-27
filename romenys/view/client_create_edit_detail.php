    <?php
      include("../include/menu.inc.php");
    ?>
    <div class="container">
      <?php
        if(isset($_GET["mode"]))
        {
          if($_GET["mode"] == 'create'){
            echo '<h4>Création</h4>';
            echo '<form class="" action="../controller/addClientController.php" method="POST">';
              echo '<div class="form-group col-md-6">';
                echo '<label for="firstname">Prénom:</label>';
                echo '<input class="form-control" type="text" name="firstname">';
                echo '<label for="lastname">Nom:</label>';
                echo '<input class="form-control" type="text" name="lastname">';
                echo '<input class="btn btn-success" type="submit" name="OK">';
              echo '</div>';
            echo '</form>';
          }elseif($_GET["mode"] == 'edit'){
            $client = findClient($_GET["id"]);
            echo '<h4>Modifications</h4>';
            echo '<form class="" action="../controller/editClientController.php" method="POST">';
              echo '<div class="form-group col-md-6">';
                echo '<input type="hidden" name="id" value="'.$client->getId().'">';
                echo '<label for="firstname">Prénom:</label>';
                echo '<input class="form-control" type="text" name="firstname" value="'.$client->getFirstname().'">';
                echo '<label for="lastname">Nom:</label>';
                echo '<input class="form-control" type="text" name="lastname" value="'.$client->getLastname().'">';
                echo '<input class="btn btn-success" type="submit" name="OK">';
              echo '</div>';
            echo '</form>';
          }elseif($_GET["mode"] == 'detail'){
            echo '<h4>Détail</h4>';

            $client = findClient($_GET["id"]);
            echo 'Prénom: '.$client->getFirstname().'<br>';
            echo 'Nom: '.$client->getLastname().'<br>';
          }

          if($_GET["mode"] == 'edit' || $_GET["mode"] == 'detail')
          {
            echo '<div class="col-md-12">';
              echo '<br><br>Voitures: ';
              echo '<a class="btn btn-success btn-sm" href="car_client_add.php?id='.$_GET["id"].'">Ajouter</a><br>';
              echo '<table class="table">';
                echo '<thead>';
                  echo '<tr>';
                    echo '<td>Nom</td>';
                    echo '<td>Assurance</td>';
                    echo '<td></td>';
                  echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                  foreach ($client->getCars() as $car) {
                    echo '<tr>';
                      echo '<td>'.$car->getName().'</td>';
                      $insurance = $car->getInsurance();
                      if(isset($insurance))
                      {
                        echo '<td>'.$insurance->getName().'</td>';
                        echo '<td><ul class="list-inline">';
                          echo '<li><a class="btn btn-warning" href="insurance_set_edit.php?id='. $car->getId() .'">Modifier l\'assurance</a></li>';
                        echo '</ul></td>';
                      }else{
                        echo '<td>Ce vehicule n\'est pas assurer</td>';
                        echo '<td><ul class="list-inline">';
                          echo '<li><a class="btn btn-success" href="insurance_set_edit.php?id='. $car->getId() .'">Assurer le véhicule</a></li>';
                        echo '</ul></td>';
                      }
                    echo '</tr>';
                  }
                echo '</tbody>';
              echo '</table>';
            echo '</div>';


            echo '<div class="col-md-12">';
              echo '<br><br>Assurances: ';
              echo '<a class="btn btn-success btn-sm" href="insurance_client_add.php?id='.$_GET["id"].'">Ajouter</a><br>';
              echo '<table class="table">';
                echo '<thead>';
                  echo '<tr>';
                    echo '<td>Name</td>';
                    echo '<td>description</td>';
                  echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                  foreach ($client->getInsurances() as $insur) {
                    echo '<tr>';
                      echo '<td>'.$insur->getName().'</td>';
                      echo '<td>'.$insur->getDescription().'</td>';
                    echo '</tr>';
                  }
                echo '</tbody>';
              echo '</table>';
            echo '</div>';
          }
        }
       ?>
    </div>
  </body>
</html>
