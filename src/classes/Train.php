<?php

namespace classes;


/*
 * Class thats create a object of type Train.
 */

class Train
{


  /*
   * String Property that contains the number of the train.
   */

  protected $trainNumber;


  /*
   * String Property that contains the number of seat in the train.
   */

  protected $seatNumber;


  public function __construct($options){
    $this->trainNumber = $options['trainNumber'];
    $this->seatNumber = $options['seatNumber'];
  }


  /**
   * Method thats return the train number value.
   *
   * @return String.
   */

  public function getTrainNumber()
  {
    return $this->trainNumber;
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
    return  'Take the train '.$this->getTrainNumber().', and sit in seat # '.$this->getSeatNumber().'; to take this route: ';
  }

}
