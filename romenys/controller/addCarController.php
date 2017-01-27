<?php
  include("../include/menu.inc.php");

  $client_id = isset($_POST["client_id"])? $_POST["client_id"] : "";
  $name = isset($_POST["name"])? $_POST["name"]: "";

  if($client_id != "" && $name != "")
  {
    $db = connect();
		if($db)
    {
			$sql = 'INSERT INTO car(name,client_id) VALUES("'.$name.'",  "'.$client_id.'")';
			$result = mysqli_query($db,$sql);
    }
  }
  header("Location: ../view/clients.php");
 ?>
