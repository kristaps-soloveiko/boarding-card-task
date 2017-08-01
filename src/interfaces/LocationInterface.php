<?php

namespace src\interfaces;

/**
 * Interface LocationInterface
 * @package src\core\interfaces
 */
interface LocationInterface {

    /**
     * @return float
     */
    public function getX() : float;

    /**
     * @return float
     */
    public function getY() : float;

    /**
     * @return string
     */
    public function getName() : string;
}