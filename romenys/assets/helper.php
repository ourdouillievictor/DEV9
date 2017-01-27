<?php
function findClient($id)
{
  $db = connect();
  if($db)
  {
    $sql = 'SELECT id,firstname,lastname FROM client WHERE id='.$id.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        $client = new Client($row['firstname'],$row['lastname']);
        $client->setId($row['id']);

        $sqlcar = 'SELECT id,name,insurance_id FROM car WHERE client_id='.$id.'';
        $resultcar = mysqli_query($db,$sqlcar);
        if($resultcar)
        {
          while ($rowcar = mysqli_fetch_array($resultcar)) {
            $car = new Car($rowcar['name']);
            $car->setId($rowcar['id']);

            $sqlinsur = 'SELECT id,name,description FROM car_insurance WHERE id='.$rowcar['insurance_id'].'';
            $resultinsur = mysqli_query($db,$sqlinsur);
            if($resultinsur)
            {
              while ($rowinsur = mysqli_fetch_array($resultinsur)) {
                $insur = new Insurance($rowinsur['name'], $rowinsur['description']);
                $insur->setId($rowinsur['id']);
                $car->setInsurance($insur);
              }
            }
            $client->addCar($car);
          }
        }

        $sqlclientinsur = 'SELECT i.id,i.name,i.description FROM client_insurance AS ci, insurance AS i WHERE ci.client_id='.$row['id'].' AND ci.insurance_id = i.id';
        $resultclientinsur = mysqli_query($db,$sqlclientinsur);
        if($resultclientinsur)
        {
          while ($rowclientinsur = mysqli_fetch_array($resultclientinsur)) {
            $insur = new Insurance($rowclientinsur['name'], $rowclientinsur['description']);
            $insur->setId($rowclientinsur['id']);
            $client->addInsurance($insur);
          }
        }
        
        return $client;
      }
    }
  }
}

function findCar($id)
{
    $db = connect();
    if($db)
    {
      $sql = 'SELECT id,name,insurance_id FROM car WHERE id='.$id.'';
      $result = mysqli_query($db,$sql);
      if($result)
      {
        while ($row = mysqli_fetch_array($result)) {
          $car = new Car($row['name']);
          $car->setId($row['id']);

          $sqlinsur = 'SELECT id,name,description FROM car_insurance WHERE id='.$row['insurance_id'].'';
          $resultinsur = mysqli_query($db,$sqlinsur);
          if($resultinsur)
          {
            while ($rowinsur = mysqli_fetch_array($resultinsur)) {
              $insur = new Insurance($rowinsur['name'], $rowinsur['description']);
              $insur->setId($rowinsur['id']);
              $car->setInsurance($insur);
            }
          }
          return $car;
        }
      }
    }
  }
 ?>
