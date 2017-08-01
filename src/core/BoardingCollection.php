<?php

namespace src\core;

/**
 * Class BoardingCollection
 */
Class BoardingCollection implements \src\interfaces\BoardingCollectionInterface
{
    /**
     * @var array
     */
    protected $boardingCollection;

    /**
     * BoardingCollection constructor.
     * @param array $boardingCollection
     */
    public function __construct(array $boardingCollection)
    {
        $this->boardingCollection = $boardingCollection;
    }

    /**
     * @return array
     */
    public function getBoardingCollection(): array
    {
        return $this->boardingCollection;
    }

    /**
     * @param array $boardingCollection
     */
    public function setBoardingCollection(array $boardingCollection)
    {
        $this->boardingCollection = $boardingCollection;
    }


}