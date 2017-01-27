    <?php
      include("../include/menu.inc.php");
    ?>
    <div class="container">
      <h4>Liste des assurances vehicule: </h4>
      <table class="table">
        <thead>
          <tr>
            <td>Nom</td>
            <td>Description</td>
          </tr>
        </thead>
        <tbody>
          <?php
            $db = connect();
            if($db){
              $sql = "SELECT * FROM car_insurance";
              $result = mysqli_query($db,$sql);
              if($result)
              {
                while($row = mysqli_fetch_array($result))
                {
                  echo '<tr>';
                    echo '<td>'. $row["name"] .'</td>';
                    echo '<td>'. $row["description"] .'</td>';
                  echo '</tr>';
                }
              }
            }
           ?>
        </tbody>
      </table>
      <br>
      <br>
      <hr>
      <br>
      <br>
      <h4>Autres assurances: </h4>
      <table class="table">
        <thead>
          <tr>
            <td>Nom</td>
            <td>Description</td>
          </tr>
        </thead>
        <tbody>
          <?php
            $db = connect();
            if($db){
              $sql = "SELECT * FROM insurance";
              $result = mysqli_query($db,$sql);
              if($result)
              {
                while($row = mysqli_fetch_array($result))
                {
                  echo '<tr>';
                    echo '<td>'. $row["name"] .'</td>';
                    echo '<td>'. $row["description"] .'</td>';
                  echo '</tr>';
                }
              }
            }
           ?>
        </tbody>
      </table>


    </div>
  </body>
</html>
