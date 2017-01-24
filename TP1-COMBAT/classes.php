<?php
DEFINE("COEFF_EXP", 0.4);
  $player1 = new Player("Tony");
  $player2 = new Player("Victor");
  $game = new Game($player1, $player2);
  $game->Fight();

  class Player
  {
    private $_strength;
    private $_experience;
    private $_name;
    private $_health;

    function __construct($name, $strength=5, $experience=1) {
      $this->_name = $name;
      $this->_strength = $strength;
      $this->_experience = $experience;
      $this->_health = 100; //par defaut
    }

    //SETTER ET GETTER
    function setName($name){$this->_name = $name;}
    function setStrength($strength){$this->_power = $power;}
    function setHealth($health){$this->_health = $health;}

    function getName(){return $this->_name;}
    function getStrength(){return $this->_strength;}
    function getHealth(){return $this->_health;}

    //METHODES
    function isDead()
    {
      return $this->_health <= 0;
    }
    function attack($opponent)
    {
      $opponent->incurAttack($this->_strength)
    }

    //Appelée lorsqu'un user subit un degat
    function incurAttack($opponent)
    {
      $this->_health = $this->_health - $opponent->getStrength();
    }
  }

  class Game
  {
    private $_player1;
    private $_player2;

    function __construct($player1, $player2)
    {
      $this->_player1 = $player1;
      $this->_player2 = $player2;
    }

    function Fight()
    {
      while (!$this->_player1->isDead() && !$this->_player2->isDead()) {
        $this->_player1->attack($this->_player2);
        $this->_player2->attack($this->_player1);
      }
      if($this->_player1->isDead())
      {
        echo 'le joueur 2 a gagner';
      }
      elseif($this->_player2->isDead()) {
        echo 'le joueur 1 a gagner';
      }
    }
  }
 ?>
