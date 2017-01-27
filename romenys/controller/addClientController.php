<?php
  include("../include/menu.inc.php");

  $firstname = isset($_POST["firstname"])? $_POST["firstname"] : "";
  $lastname = isset($_POST["lastname"])? $_POST["lastname"]: "";

  if($firstname != "" && $lastname != "")
  {
    $client = new Client($firstname,$lastname);
    $client->addInBDD();
  }
  header("Location: ../view/clients.php");
 ?>
