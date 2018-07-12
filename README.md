Board Cards Sort
================

A Test project created on July 11, 2018.

How to Run.

1.- Put in a web server with PHP 7.1.x.
2.- run index.php. Here you can see a test of the solution; you can changue the list if you want.
3.- considerations:

The boarding cards list is an array; this is an example:

array('from' => 'Aruba','to' => 'Amsterdam','transporType' => new TransportFactory(array('type' => 'train','properties'=>array('trainNumber'=>'6504-b','seatNumber'=>'w-101'))));

And the 'transporType' position, is an instance of TransportFactory.

How to Test.

./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/MapTest.php

Assumptions.

1.- Because the API will be used inside of an app; the incoming data like transport properties not will be validated. The origin will be maybe a database for instance.

Also for this same reason the API return and array; that is compatible with in list

2.- All the properties all alphanumeric.

3.- You can read in the description "The API is to be an internal PHP API so it will only communicate with other parts of a PHP application"; so is not an Rest API; and not need to take case of HTTP Status Codes for instance.

3.- Is a back-end solution, so it has a simple view. please if you need something more elaborated let me know.


Add another types of transportation.

The app implement the factory pattern to create three types of transport; so you only need o create the class of the new type of transport and modify the create method in the TransportFactory class.
