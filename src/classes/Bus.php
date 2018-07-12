<?php

namespace classes;


/*
 * Class thats create a object of type Bus.
 */

class Bus
{

  /*
   * String Property that contains the place where take the bus.
   */

  protected $place;


  /*
   * String Property that contains the number of seat in the Bus.
   */

  protected $seatNumber;


  public function __construct($options){
    $this->place = $options['place'];
    $this->seatNumber = $options['seatNumber'];
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


  /**
   * Method thats return the seat number value.
   *
   * @return String.
   */

  public function getSeatNumber()
  {
    return $this->seatNumber;
  }


  public function __toString(){
    return  'Get the bus on '.$this->getPlace().', and sit in seat #  '.$this->getSeatNumber().'; to take this route: ';
  }

}
