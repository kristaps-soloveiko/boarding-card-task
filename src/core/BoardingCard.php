<?php

namespace src\core;

/**
 * Class BoardingCard
 */
Class BoardingCard implements \src\interfaces\BoardingCardInterface
{
    protected $transportation;
    protected $arrival;
    protected $destination;

    /**
     * BoardingCard constructor.
     * @param \src\interfaces\TransportationInterface $transportation
     * @param \src\interfaces\EntryPointInterface $arrival
     * @param \src\interfaces\EntryPointInterface $destination
     */
    public function __construct(
        \src\interfaces\TransportationInterface $transportation,
        \src\interfaces\EntryPointInterface $arrival,
        \src\interfaces\EntryPointInterface $destination
    ) {
        $this->transportation = $transportation;
        $this->arrival = $arrival;
        $this->destination = $destination;
    }

    /**
     * @return \src\interfaces\TransportationInterface
     */
    public function getTransportation(): \src\interfaces\TransportationInterface
    {
        return $this->transportation;
    }

    /**
     * @param \src\interfaces\TransportationInterface $transportation
     */
    public function setTransportation(\src\interfaces\TransportationInterface $transportation)
    {
        $this->transportation = $transportation;
    }

    /**
     * @return \src\interfaces\EntryPointInterface
     */
    public function getArrival(): \src\interfaces\EntryPointInterface
    {
        return $this->arrival;
    }

    /**
     * @param \src\interfaces\EntryPointInterface $arrival
     */
    public function setArrival(\src\interfaces\EntryPointInterface $arrival)
    {
        $this->arrival = $arrival;
    }

    /**
     * @return \src\interfaces\EntryPointInterface
     */
    public function getDestination(): \src\interfaces\EntryPointInterface
    {
        return $this->destination;
    }

    /**
     * @param \src\interfaces\EntryPointInterface $destination
     */
    public function setDestination(\src\interfaces\EntryPointInterface $destination)
    {
        $this->destination = $destination;
    }


}