<?php

namespace src\interfaces;

/**
 * Interface BoardingCardInterface
 * @package src\core\interfaces
 */
interface BoardingCardInterface {

    /**
     * @return TransportationInterface
     */
    public function getTransportation() : TransportationInterface;

    /**
     * @return EntryPointInterface
     */
    public function getArrival() : EntryPointInterface;

    /**
     * @return EntryPointInterface
     */
    public function getDestination() : EntryPointInterface;
}