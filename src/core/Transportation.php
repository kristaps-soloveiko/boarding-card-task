<?php

namespace src\core;

use src\interfaces\SeatInterface;

/**
 * Class Transportation
 */
Class Transportation implements \src\interfaces\TransportationInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var \src\interfaces\SeatInterface
     */
    protected $seat;

    /**
     * Transportation constructor.
     * @param string $name
     * @param string $type
     * @param \src\interfaces\SeatInterface $seat
     */
    public function __construct(string $name, string $type, \src\interfaces\SeatInterface $seat)
    {
        $this->name = $name;
        $this->type = $type;
        $this->seat = $seat;
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

    /**
     * @return mixed
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSeat() : SeatInterface
    {
        return $this->seat;
    }

    /**
     * @param mixed $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }


}