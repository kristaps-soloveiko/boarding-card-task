<?php

namespace src\interfaces;

/**
 * Interface TransportationInterface
 * @package src\core\interfaces
 */
interface TransportationInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return string
     */
    public function getType() : string;

    /**
     * @return SeatInterface
     */
    public function getSeat() : SeatInterface;
}