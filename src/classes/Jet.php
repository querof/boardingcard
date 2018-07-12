<?php

namespace classes;


/*
 * Class thats create a object of type Jet.
 */

class Jet
{

  /*
   * String Property that contains the number of the jet.
   */

  protected $jetNumber;


  /*
   * String Property that contains the number of seat in the jet.
   */

  protected $seatNumber;


  /*
   * String Property that contains the number of the door in the airport.
   */

  protected $doorNumber;


  /*
   * String Property that contains the place where take the jet, airport in this case.
   */

  protected $place;


  public function __construct($options){
    $this->jetNumber = $options['jetNumber'];
    $this->seatNumber = $options['seatNumber'];
    $this->doorNumber = $options['doorNumber'];
    $this->place = $options['place'];
  }



  /**
   * Method thats return the jet number value;.
   *
   * @return String.
   */

  public function getJetNumber()
  {
    return $this->jetNumber;
  }


  /**
   * Method thats return the seat number value.
   *
   * @return String.
   */

  public function getSeatNumber()
  {
    return $this->seatNumber;
  }


  /**
   * Method thats return the door number value;.
   *
   * @return String.
   */

  public function getDoorNumber()
  {
    return $this->doorNumber;
  }


  /**
   * Method thats return the place value;.
   *
   * @return String.
   */

  public function getPlace()
  {
    return $this->place;
  }


  public function __toString(){
    return  'From  '.$this->getPlace().' take the flight # '.$this->getJetNumber().', and sit in seat # '.$this->getSeatNumber().'; to take this route: ';
  }

}
