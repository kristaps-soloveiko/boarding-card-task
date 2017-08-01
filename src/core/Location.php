<?php

namespace src\core;

use src\interfaces\LocationInterface;

/**
 * Class Location
 */
Class Location implements LocationInterface
{
    /**
     * @var
     */
    protected $x;

    /**
     * @var
     */
    protected $y;

    /**
     * @var
     */
    protected $name;

    /**
     * Location constructor.
     * @param float $x
     * @param float $y
     * @param string $name
     */
    public function __construct(float $x, float $y, string $name)
    {
        $this->x = $x;
        $this->y = $y;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getX() : float
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY() : float
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}