<?php

namespace src\core;

/**
 * Class EntryPoint
 */
Class EntryPoint implements \src\interfaces\EntryPointInterface
{
    /**
     * @var \src\interfaces\LocationInterface
     */
    protected $location;

    /**
     * @var string
     */
    protected $name;

    /**
     * EntryPoint constructor.
     * @param \src\interfaces\LocationInterface $location
     * @param string $name
     */
    public function __construct(\src\interfaces\LocationInterface $location, string $name)
    {
        $this->location = $location;
        $this->name = $name;
    }

    /**
     * @return \src\interfaces\LocationInterface
     */
    public function getLocation(): \src\interfaces\LocationInterface
    {
        return $this->location;
    }

    /**
     * @return \src\interfaces\LocationInterface
     */
    public function getLocationName(): string
    {
        return $this->location->getName();
    }

    /**
     * @param \src\interfaces\LocationInterface $location
     */
    public function setLocation(\src\interfaces\LocationInterface $location)
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }


}