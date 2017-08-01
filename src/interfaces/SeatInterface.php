<?php

namespace src\interfaces;

/**
 * Interface SeatInterface
 * @package src\core\interfaces
 */
interface SeatInterface
{
    /**
     * @return string
     */
    public function getId() : string;

    /**
     * @return string
     */
    public function getType() : string;

    /**
     * @return string
     */
    public function getName() : string;
}