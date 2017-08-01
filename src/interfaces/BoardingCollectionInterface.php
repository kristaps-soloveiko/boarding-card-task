<?php

namespace src\interfaces;

/**
 * Interface BoardingCollectionInterface
 * @package src\core\interfaces
 */
interface BoardingCollectionInterface {

    /**
     * @return array
     */
    public function getBoardingCollection(): array;

    /**
     * @param array $boardingCollection
     * @return mixed
     */
    public function setBoardingCollection(array $boardingCollection);
}