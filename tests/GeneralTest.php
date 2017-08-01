<?php

require_once ('TestCase.php');

/**
 * Class GeneralBuildTest
 * For Trivial methods, I will only create Success tests. I see no reason to create
 * fail tests for __construct methods with strict arguments.
 * IMO developers should use advanced IDE's that clearly show mismatched types
 */
class GeneralTest extends TestCase
{

    /**
     * Tests that the construct setup works as expected
     */
    public function testBoardingCardConstructSuccess()
    {
        // We need to stub the Location object.
        $transportation = $this->getMockBuilder('src\core\Transportation')
            ->disableOriginalConstructor()
            ->getMock();

        $arrival = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $destination = $this->getMockBuilder('src\core\EntryPoint')
            ->disableOriginalConstructor()
            ->getMock();

        $object = new \src\core\BoardingCard($transportation, $arrival, $destination);

        $this->assertEquals($transportation, $object->getTransportation());
        $this->assertEquals($arrival, $object->getArrival());
        $this->assertEquals($destination, $object->getDestination());
    }

    /**
     * Tests that the construct setup works as expected
     */
    public function testEntryPointConstructSuccess()
    {
        $name = 'Gate-25';
        // We need to stub the Location object.
        $location = $this->getMockBuilder('src\core\Location')
            ->disableOriginalConstructor()
            ->getMock();

        $object = new \src\core\EntryPoint($location, $name);

        $this->assertEquals($location, $object->getLocation());
        $this->assertEquals($name, $object->getName());
    }

    /**
     * Tests that the construct setup works as expected
     */
    public function testLocationConstructSuccess()
    {
        $x = 5.1512;
        $y = 10.123;
        $name = 'London';

        $locationObject = new \src\core\Location($x, $y, $name);
        $this->assertEquals($x, $locationObject->getX());
        $this->assertEquals($y, $locationObject->getY());
        $this->assertEquals($name, $locationObject->getName());
    }

    /**
     * Tests that the construct setup works as expected
     */
    public function testSeatConstructSuccess()
    {
        $id = 'B-101';
        $type = 'Regular';
        $name = 'Chair';

        $object = new \src\core\Seat($id, $type, $name);

        $this->assertEquals($id, $object->getId());
        $this->assertEquals($type, $object->getType());
        $this->assertEquals($name, $object->getName());
    }

    /**
     * Tests that the construct setup works as expected
     */
    public function testTransportationConstructSuccess()
    {
        $name = 'Bus';
        $type = 'Land Vehicle';
        // We need to stub the Seat object.
        $seat = $this->getMockBuilder('src\core\Seat')
            ->disableOriginalConstructor()
            ->getMock();

        $object = new \src\core\Transportation($name, $type, $seat);

        $this->assertEquals($name, $object->getName());
        $this->assertEquals($type, $object->getType());
        $this->assertEquals($seat, $object->getSeat());
    }


}
