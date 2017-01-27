    <?php
      include("../include/menu.inc.php");
    ?>
    <div class="container">
      <h4>Liste des clients: </h4>
      <ul class="list-inline">
        <li><a class="btn btn-success" href="client_create_edit_detail.php?mode=create">Ajouter un client</a></li>
      </ul>
      <table class="table">
        <thead>
          <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <?php
            $db = connect();
            if($db){
              $sql = "SELECT * FROM client";
              $result = mysqli_query($db,$sql);
              if($result)
              {
                while($row = mysqli_fetch_array($result))
                {
                  echo '<tr>';
                    echo '<td>'. $row["lastname"] .'</td>';
                    echo '<td>'. $row["firstname"] .'</td>';
                    echo '<td>';
                      echo '<ul class="list-inline">';
                        echo '<li><a class="btn btn-warning" href="client_create_edit_detail.php?mode=edit&id='. $row["id"] .'">Modifier</a></li>';
                        echo '<li><a class="btn btn-primary" href="client_create_edit_detail.php?mode=detail&id='. $row["id"] .'">Detail</a></li>';
                      echo '</ul>';
                    echo '</td>';
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
