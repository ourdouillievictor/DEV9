<?php
  include("../include/menu.inc.php");

  $client_id = isset($_POST["client_id"])? $_POST["client_id"] : "";
  $insurance_id = isset($_POST["insurance_id"])? $_POST["insurance_id"]: "";

  if($client_id != "" && $insurance_id != "")
  {
    $db = connect();
		if($db)
    {
			$sql = 'INSERT INTO client_insurance(client_id,insurance_id) VALUES("'.$client_id.'",  "'.$insurance_id.'")';
			$result = mysqli_query($db,$sql);
    }
  }
  header("Location: ../view/clients.php");
 ?>
