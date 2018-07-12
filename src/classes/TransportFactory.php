<?php

namespace classes;

use classes\Train;
use classes\Bus;
use classes\Jet;

/*
 * An implementation of the factory pattern; to create the transport objects.
 */

class TransportFactory
{

  /*
   * String Property that contains the type of the transportation.
   */

  private $type;


  /*
   * Array Property that contains the properties of the diferentes types of transportation,
   * according to the structucre of the class of every one of them.
   */

  protected $properties;

  /*
   * Object Property that contains the object of the transport.
   */

  protected $transport;


  public function __construct($options){
    $this->type = $options['type'];
    $this->properties = $options['properties'];
    $this->create();
  }


  /**
   * Method thats create the transport objects.
   */

  public function create()
  {
      if($this->type == 'train')
      {
        $this->transport = new Train($this->properties);
      }
      elseif($this->type == 'bus')
      {
        $this->transport = new Bus($this->properties);
      }
      elseif($this->type == 'jet')
      {
        $this->transport = new Jet($this->properties);
      }
  }


  /**
   * Method thats return the transport object.
   *
   * @return Object.
   */

  public function getTransport(){
    return $this->transport;
  }

}
