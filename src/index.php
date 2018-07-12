<?php

/*
 * Manual test file.
 */

namespace src;

require_once("autoloader.php");

use classes\Map as Map;
use classes\TransportFactory as TransportFactory;


$cards= array();

$cards[] = array('from' => 'Aruba','to' => 'Amsterdam','transporType' => new TransportFactory(array('type' => 'train','properties'=>array('trainNumber'=>'6504-b','seatNumber'=>'w-101'))));

$cards[] = array('from' => 'Istanbul','to' => 'Dubai','transporType' => new TransportFactory(array('type' => 'bus','properties'=>array('place'=>'Aiport of Instanbul ','seatNumber'=>'12342'))));

$cards[] = array('from' => 'Marruecos','to' => 'Istanbul','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'aa156-b','place'=>'Aiport Amsterdam','seatNumber'=>'12342','doorNumber'=>'6'))));

$cards[] = array('from' => 'Amsterdam','to' => 'Madrid','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'MDR890-k','place'=>'Aiport Amsterdam','seatNumber'=>'12342','doorNumber'=>'9'))));

$cards[] = array('from' => 'Punto Fijo','to' => 'Caracas','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'VV1','place'=>'Aiport Las Piedras','seatNumber'=>'W1','doorNumber'=>'1'))));

$cards[] = array('from' => 'Madrid','to' => 'Marruecos','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'MRR-1','place'=>'Aiport Barajas','seatNumber'=>'W1','doorNumber'=>'1'))));

$cards[] = array('from' => 'Caracas','to' => 'Aruba','transporType' => new TransportFactory(array('type' => 'jet','properties'=>array('jetNumber'=>'CSS-1','place'=>'Aiport Maiquetía','seatNumber'=>'W1','doorNumber'=>'1'))));


$map = new map($cards);

$sorted = $map->getCards();

$list = $map->getList();
echo json_encode($list);
?>
<table border="1">
  <tr>
    <th>
      #
    </th>
    <th>
      Trip
    </th>
  </tr>
  <?php for($i=0;$i<count($list);$i++): ?>
    </count($list);$i++)>
      <tr>
        <td>
          <?=$i+1?>
        </td>
        <td>
            <?=$list[$i]?>
        </td>
      </tr>
  <?php endfor ?>
</table>
<?php

echo '<pre>';
print_r($map->getSorted($map->getStart($sorted['to']),$sorted['from']));

echo '</pre>';
?>
