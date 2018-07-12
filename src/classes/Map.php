<?php

namespace classes;


/*
 * Class thats Take the card list Order according to the departures and destinations
 */

class Map
{

  /*
   * Property that contains list of cards without sort.
   */

  private $cards;


  public function __construct($table){
    $this->cards = array_reduce($table,array($this,"fillTable"));
  }


  /**
   * Method thats return the cards property value.
   *
   * @return Array of list boarding cards and transport objects.
   */

  public function getCards(){
    return $this->cards;
  }


  /**
   * Method thats return the the start point of the list.
   *
   * @return String with name of the first departure city.
   */

  public function getStart($nodes){

      foreach($nodes as $k => $v)
        if( $nodes[$k]=='' ) return $k;
  }


  /**
   * Method thats sort the list.
   *
   * @return Array with boarding cards sorted.
   */

  public function getSorted($start,$nodes ){

    $sorted = array();

    while($nodes[$start]){
      $node = $nodes[$start];
      $sorted[] = $node;
      $start = $node['to'];

      }

    return $sorted;
  }


  /**
   * Method thats return a human friendly list sorted.
   *
   * @return Array with a human friendly list.
   */

  public function getList()
  {
    $arr = array();
    $cards = $this->getCards();

    $arrCards = $this->getSorted($this->getStart($cards['to']),$cards['from']);

    for($i=0;$i<count($arrCards);$i++)
            $arr[$i] = $arrCards[$i]['transporType']->getTransport().' from: '.$arrCards[$i]['from'].' to: '.$arrCards[$i]['to'];

    $arr[count($arr)] = 'Baggage will we automatically transferred from your last leg.';
    $arr[count($arr)] = 'You have arrived at your final destination.';

    return $arr;
  }


  /**
   * Method thats fill an array and the firts a last city of the trip;
   * is used for find the order and the list of boarding cards
   *
   * @return Array with cards.
   */

  private function fillTable($pv, $cv){

          $pv['from'][$cv['from']] = $cv;
          $pv['to'][$cv['to']] = $cv;

          if(!isset($pv['from'][$cv['to']]) )  $pv['from'][$cv['to']]= false;
          if(!isset($pv['to'][$cv['from']]))  $pv['to'][$cv['from']]= false;

          return $pv;
  }
}
