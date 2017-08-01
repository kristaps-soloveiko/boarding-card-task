<?php

class SortTest extends TestCase
{
    public function testBasicSortingSuccess()
    {
        // I will define 5 locations and see if the sorting algorithm can return them in the correct order
        // We need to stub the Location object.
        // In this part - arrival means that the transportation will arrive to the point to pick up the passenger
        $transportation = $this->getMockBuilder('src\core\Transportation')
            ->disableOriginalConstructor()
            ->getMock();

        // RIGA TO FRANKFURT
        $rixToFraArrival = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $rixToFraArrival->method('getLocationName')->willReturn('Riga');

        $rixToFraDestination = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $rixToFraDestination->method('getLocationName')->willReturn('Frankfurt');

        // FRANKFURT TO MUSCAT
        $fraToMuscatArrival = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $fraToMuscatArrival->method('getLocationName')->willReturn('Frankfurt');

        $fraToMuscatDestination = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $fraToMuscatDestination->method('getLocationName')->willReturn('Muscat');

        // MUSCAT TO YEMEN. Yes, I like to travel :)
        $muscatToYemenArrival = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $muscatToYemenArrival->method('getLocationName')->willReturn('Muscat');

        $muscatToYemenDestination = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $muscatToYemenDestination->method('getLocationName')->willReturn('Yemen');

        // YEMEN TO SOMALIA.
        $yemenToSomaliaArrival = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $yemenToSomaliaArrival->method('getLocationName')->willReturn('Yemen');

        $yemenToSomaliaDestination = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $yemenToSomaliaDestination->method('getLocationName')->willReturn('Somalia');

        // SOMALIA TO DUBAI.
        $somaliaToDubaiArrival = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $somaliaToDubaiArrival->method('getLocationName')->willReturn('Somalia');

        $somaliaToDubaiDestination = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $somaliaToDubaiDestination->method('getLocationName')->willReturn('Dubai');


        $boardingCollectionArray = [
            new \src\core\BoardingCard($transportation, $rixToFraArrival, $rixToFraDestination),
            new \src\core\BoardingCard($transportation, $fraToMuscatArrival, $fraToMuscatDestination),
            new \src\core\BoardingCard($transportation, $muscatToYemenArrival, $muscatToYemenDestination),
            new \src\core\BoardingCard($transportation, $yemenToSomaliaArrival, $yemenToSomaliaDestination),
            new \src\core\BoardingCard($transportation, $somaliaToDubaiArrival, $somaliaToDubaiDestination),
        ];

        // Lets shuffle for more fun, so we always pass random values
        shuffle($boardingCollectionArray);

        // We need a collection array. TODO: We should validate the input data there
        $boardingCollection = new \src\core\BoardingCollection($boardingCollectionArray);

        // Lets pick a sorter algorithm and  start the gateway for further operations
        $sorter = new \src\core\engine\sorter\SimpleBoardingSorter();
        $gateway = new \src\core\engine\BoardingGateway($boardingCollection, $sorter);
        // Get the results
        $sortedResult = $gateway->getResultObject()->getBoardingCollection();

        // Lets check if we have the correct order of the boarding cards
        // RIGA - FRANKFURT
        $this->assertEquals($sortedResult[0]->getArrival()->getLocationName(), 'Riga');
        $this->assertEquals($sortedResult[0]->getDestination()->getLocationName(), 'Frankfurt');

        // FRANKFURT TO MUSCAT
        $this->assertEquals($sortedResult[1]->getArrival()->getLocationName(), 'Frankfurt');
        $this->assertEquals($sortedResult[1]->getDestination()->getLocationName(), 'Muscat');

        // MUSCAT TO YEMEN
        $this->assertEquals($sortedResult[2]->getArrival()->getLocationName(), 'Muscat');
        $this->assertEquals($sortedResult[2]->getDestination()->getLocationName(), 'Yemen');

        // YEMEN TO SOMALIA.
        $this->assertEquals($sortedResult[3]->getArrival()->getLocationName(), 'Yemen');
        $this->assertEquals($sortedResult[3]->getDestination()->getLocationName(), 'Somalia');

        // SOMALIA TO DUBAI.
        $this->assertEquals($sortedResult[4]->getArrival()->getLocationName(), 'Somalia');
        $this->assertEquals($sortedResult[4]->getDestination()->getLocationName(), 'Dubai');



    }
}
