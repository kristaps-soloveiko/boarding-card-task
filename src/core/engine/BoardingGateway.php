<?php
/**
 * Created by PhpStorm.
 * User: Kristaps
 * Date: 01/08/2017
 * Time: 14:31
 */

namespace src\core\engine;


use src\interfaces\BoardingCollectionInterface;
use src\interfaces\sorter\SorterInterface;

/**
 * Class BoardingGateway
 * @package src\core\engine
 */
class BoardingGateway
{
    /**
     * @var BoardingCollectionInterface
     */
    protected $boardingCollection;

    /**
     * @var BoardingCollectionInterface
     */
    protected $sortingResult;

    /**
     * @var SorterInterface
     */
    protected $sorter;

    /**
     * BoardingGateway constructor.
     * @param BoardingCollectionInterface $boardingCollection
     * @param SorterInterface $sorter
     */
    public function __construct(BoardingCollectionInterface $boardingCollection, SorterInterface $sorter)
    {
        $this->boardingCollection = $boardingCollection;
        $this->sorter = $sorter;
        // Lets sort the list and save the result
        $this->sortingResult = $this->sorter->sort($boardingCollection);
    }

    /**
     * @return BoardingCollectionInterface
     */
    public function getResultObject() : BoardingCollectionInterface
    {
        return $this->sortingResult;
    }

    /**
     * @return string
     */
    public function getAsText() : string
    {
        /**
         * Take train 78A from Madrid to Barcelona. Sit in seat 45B.
         * Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
         * From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.
         * Baggage drop at ticket counter 344.
         * From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.
         * Baggage will we automatically transferred from your last leg.
         * You have arrived at your final destination
         */
        $text = '';
        $boardingCards = $this->sortingResult->getBoardingCollection();
        $i = 1;
        foreach ($boardingCards as $card) {
            $text .= "{$i}) Take {$card->getTransportation()->getName()} from {$card->getArrival()->getLocationName()} to " .
                "{$card->getDestination()->getLocationName()}. Sit in seat {$card->getTransportation()->getSeat()->getId()} <br> ";
            $i++;
        }

        return $text;
    }

    /**
     * @return array
     */
    public function getAsArray() : array
    {
        // TODO: Implement and re-thing the naming
    }
}