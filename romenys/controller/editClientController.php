<?php
  include("../include/menu.inc.php");

  $id = isset($_POST["id"])? $_POST["id"] : "";
  $firstname = isset($_POST["firstname"])? $_POST["firstname"] : "";
  $lastname = isset($_POST["lastname"])? $_POST["lastname"]: "";

  if($firstname != "" && $lastname != "" && $id != "")
  {
    $client = new Client($firstname,$lastname);
    $client->setId($id);
    $client->updateInBDD();
  }
  header("Location: ../view/clients.php");
 ?>
