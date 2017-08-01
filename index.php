<?php

require_once (__DIR__ . '/vendor/autoload.php');
// Setup some random x y coordinates. They are unused in later stages
$xCoordinate = rand(1,100);
$yCoordinate = rand(1,100);
// Setup new coordinates for locations
$riga = new \src\core\Location($xCoordinate, $yCoordinate, 'Riga');
$frankfurt = new \src\core\Location($xCoordinate, $yCoordinate, 'Frankfurt');
$bali = new \src\core\Location($xCoordinate, $yCoordinate, 'Bali');
$thailand = new \src\core\Location($xCoordinate, $yCoordinate, 'Thailand');
$malta = new \src\core\Location($xCoordinate, $yCoordinate, 'Malta');
$dubai = new \src\core\Location($xCoordinate, $yCoordinate, 'Dubai');

// Setup entry points. Its basically the place where the passenger gets in and out
$rigaEntryPoint = new \src\core\EntryPoint($riga, 'Gate1');
$frankfurtEntryPoint = new \src\core\EntryPoint($frankfurt, 'Gate2');
$baliEntryPoint = new \src\core\EntryPoint($bali, 'Gate3');
$thailandEntryPoint = new \src\core\EntryPoint($thailand, 'Gate4');
$maltaEntryPoint = new \src\core\EntryPoint($malta, 'Gate5');
$dubaiEntryPoint = new \src\core\EntryPoint($dubai, 'Gate6');

// I will set only 1 type of vehicle, but as You can see, each transportation can have its own seat
$seat = new \src\core\Seat('ID101', 'chair', 'regular');
$transportation = new \src\core\Transportation('Airplane', 'Air Vehicle', $seat);

// Setup the actual boarding cards
$rigaFrankfurtBoardingCard = new \src\core\BoardingCard($transportation, $rigaEntryPoint, $frankfurtEntryPoint);
$frankfurtBaliBoardingCard = new \src\core\BoardingCard($transportation, $frankfurtEntryPoint, $baliEntryPoint);
$baliThailandBoardingCard = new \src\core\BoardingCard($transportation, $baliEntryPoint, $thailandEntryPoint);
$thailandMaltaBoardingCard = new \src\core\BoardingCard($transportation, $thailandEntryPoint, $maltaEntryPoint);
$maltaDubaiBoardingCard = new \src\core\BoardingCard($transportation, $maltaEntryPoint, $dubaiEntryPoint);

$boardingCollection = [
    $rigaFrankfurtBoardingCard,
    $frankfurtBaliBoardingCard,
    $baliThailandBoardingCard,
    $thailandMaltaBoardingCard,
    $maltaDubaiBoardingCard
];

// Lets shuffle just to prove the point that it works correctly
shuffle($boardingCollection);

$boardingCollectionObject = new \src\core\BoardingCollection($boardingCollection);

// Init the sorter
$sorter = new \src\core\engine\sorter\SimpleBoardingSorter();

// Init the gateway
$gateway = new \src\core\engine\BoardingGateway($boardingCollectionObject, $sorter);
$result = $gateway->getAsText();

// Print the result
print($result);