<?php
class Client
{
  private $_id;
  private $_firstname;
  private $_lastname;
  private $_cars = array();
  private $_insurances = array();

  function __construct($firstname, $lastname, $cars)
  {
    $this->_firstname = $firstname;
    $this->_lastname = $lastname;
  }

  function setId($id){$this->_id = $id;}
  function addCar($car){array_push($this->_cars, $car);}
  function addInsurance($insurances){array_push($this->_insurances, $insurances);}

  function getId(){return $this->_id;}
  function getFirstname(){return $this->_firstname;}
  function getLastname(){return $this->_lastname;}
  function getCars(){return $this->_cars;}
  function getInsurances(){return $this->_insurances;}

  function addInBDD()
  {
    $db = connect();
		if($db)
    {
			$sql = 'INSERT INTO client(firstname,lastname) VALUES("'.$this->_firstname.'",  "'.$this->_lastname.'")';
			$result = mysqli_query($db,$sql);
    }
  }

  function updateInBDD()
  {
    $db = connect();
    if($db)
    {
      $sql = 'UPDATE client SET firstname="'.$this->_firstname.'", lastname="'.$this->_lastname.'" WHERE id='.$this->_id.'';
      $result = mysqli_query($db,$sql);
    }
  }

}

class Car
{
  private $_id;
  private $_name;
  private $_insurance;

  function __construct($name="")
  {
    $this->_name = $name;
  }
  function setId($id){$this->_id = $id;}
  function setInsurance($insurance){$this->_insurance = $insurance;}
  function getId(){return $this->_id;}
  function getName(){return $this->_name;}
  function getInsurance(){return $this->_insurance;}

  function updateInsurranceInBDD()
  {
    $db = connect();
    if($db)
    {
      $sql = 'UPDATE car SET insurance_id='.$this->_insurance->getId().' WHERE id='.$this->_id.'';
      $result = mysqli_query($db,$sql);
    }
  }
}

class Insurance
{
  private $_id;
  private $_name;
  private $_description;

  function __construct($name="", $description="")
  {
    $this->_name = $name;
    $this->_description = $description;
  }
  function setId($id){$this->_id = $id;}
  function getId(){return $this->_id;}
  function getName(){return $this->_name;}
  function getDescription(){return $this->_description;}
}
 ?>
