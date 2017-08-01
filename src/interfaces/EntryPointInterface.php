<?php

namespace src\interfaces;

/**
 * Interface EntryPointInterface
 * @package src\core\interfaces
 */
interface EntryPointInterface {

    /**
     * @return LocationInterface
     */

    public function getLocation() : LocationInterface;

    /**
     * @return string
     */
    public function getLocationName() : string;

    /**
     * @return string
     */
    public function getName() : string;

}