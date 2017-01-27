<?php
  include("../include/menu.inc.php");

  $id = isset($_POST["id"])? $_POST["id"] : "";
  $insurance_id = isset($_POST["insurance_id"])? $_POST["insurance_id"] : "";

  if($id != "" && $insurance_id != "" && $id != "")
  {
    $car = new Car();
    $car->setId($id);
    $insur = new Insurance();
    $insur->setId($insurance_id);

    $car->setInsurance($insur);

    $car->updateInsurranceInBDD();
  }
  header("Location: ../view/clients.php");
 ?>
