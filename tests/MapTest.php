<?php

namespace test;

require_once( __DIR__."/../src/autoloader.php");

use PHPUnit\Framework\TestCase;
use classes\Map as Map;
use classes\TransportFactory as TransportFactory;

final class MapTest extends TestCase
{
    public function testSortList(): void
    {

        $cards= array();

        $cards[] = array('from' => 'Aruba','to' => 'Amsterdam','transporType' => new TransportFactory(array('type' => 'train','properties'=>array('trainNumber'=>'6504-b','seatNumber'=>'w-101'))));

        $cards[] = array('from' => 'Istanbul','to' => 'Dubai','transporType' => new TransportFactory(array('type' => 'bus','properties'=>array('place'=>'Aiport of Instanbul ','seatNumber'=>'12342'))));

        $cards[] = array('from' => 'Marruecos','to' => 'Istanbul','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'aa156-b','place'=>'Aiport Amsterdam','seatNumber'=>'12342','doorNumber'=>'6'))));

        $cards[] = array('from' => 'Amsterdam','to' => 'Madrid','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'MDR890-k','place'=>'Aiport Amsterdam','seatNumber'=>'12342','doorNumber'=>'9'))));

        $cards[] = array('from' => 'Punto Fijo','to' => 'Caracas','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'VV1','place'=>'Aiport Las Piedras','seatNumber'=>'W1','doorNumber'=>'1'))));

        $cards[] = array('from' => 'Madrid','to' => 'Marruecos','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'MRR-1','place'=>'Aiport Barajas','seatNumber'=>'W1','doorNumber'=>'1'))));

        $cards[] = array('from' => 'Caracas','to' => 'Aruba','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'CSS-1','place'=>'Aiport Maiquetia','seatNumber'=>'W1','doorNumber'=>'1'))));


        $map = new map($cards);

        $list_sorted = implode(' ',$map->getList());

        $list_test = 'From  Aiport Las Piedras take the flight # VV1, and sit in seat # W1; to take this route:  from: Punto Fijo to: Caracas From  Aiport Maiquetia take the flight # CSS-1, and sit in seat # W1; to take this route:  from: Caracas to: Aruba Take the train 6504-b, and sit in seat # w-101; to take this route:  from: Aruba to: Amsterdam From  Aiport Amsterdam take the flight # MDR890-k, and sit in seat # 12342; to take this route:  from: Amsterdam to: Madrid From  Aiport Barajas take the flight # MRR-1, and sit in seat # W1; to take this route:  from: Madrid to: Marruecos From  Aiport Amsterdam take the flight # aa156-b, and sit in seat # 12342; to take this route:  from: Marruecos to: Istanbul Get the bus on Aiport of Instanbul , and sit in seat #  12342; to take this route:  from: Istanbul to: Dubai Baggage will we automatically transferred from your last leg. You have arrived at your final destination.';

        $this->assertEquals($list_sorted,$list_test);

    }

    public function testGetStart(): void
    {
        $cards= array();

        $cards[] = array('from' => 'Aruba','to' => 'Amsterdam','transporType' => new TransportFactory(array('type' => 'train','properties'=>array('trainNumber'=>'6504-b','seatNumber'=>'w-101'))));

        $cards[] = array('from' => 'Istanbul','to' => 'Dubai','transporType' => new TransportFactory(array('type' => 'bus','properties'=>array('place'=>'Aiport of Instanbul ','seatNumber'=>'12342'))));

        $cards[] = array('from' => 'Marruecos','to' => 'Istanbul','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'aa156-b','place'=>'Aiport Amsterdam','seatNumber'=>'12342','doorNumber'=>'6'))));

        $cards[] = array('from' => 'Amsterdam','to' => 'Madrid','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'MDR890-k','place'=>'Aiport Amsterdam','seatNumber'=>'12342','doorNumber'=>'9'))));

        $cards[] = array('from' => 'Punto Fijo','to' => 'Caracas','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'VV1','place'=>'Aiport Las Piedras','seatNumber'=>'W1','doorNumber'=>'1'))));

        $cards[] = array('from' => 'Madrid','to' => 'Marruecos','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'MRR-1','place'=>'Aiport Barajas','seatNumber'=>'W1','doorNumber'=>'1'))));

        $cards[] = array('from' => 'Caracas','to' => 'Aruba','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'CSS-1','place'=>'Aiport Maiquetia','seatNumber'=>'W1','doorNumber'=>'1'))));


        $map = new map($cards);
        $sorted = $map->getCards();

        $start = $map->getStart($sorted['to']);

        $this->assertEquals($start,'Punto Fijo');
    }
    
}
