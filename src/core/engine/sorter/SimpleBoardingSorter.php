<?php

namespace src\core\engine\sorter;

use src\interfaces\BoardingCollectionInterface;
use src\interfaces\sorter\SorterInterface;

/**
 * Class SimpleBoardingSorter
 * @package src\core\engine\sorter
 */
class SimpleBoardingSorter implements SorterInterface
{
    protected $sortedArray;
    protected $possibleStartLocation;

    /**
     * @param BoardingCollectionInterface $boardingCollectionObject
     * @return BoardingCollectionInterface
     */
    public function sort(BoardingCollectionInterface $boardingCollectionObject) : BoardingCollectionInterface
    {
        // Extract the collection array
        $boardCollection = $boardingCollectionObject->getBoardingCollection();
        // Setup a new array where we will store the sorted boards
        $sortedBoardCollectionArray = [];
        // We separate the arrivals from the destinations
        $arrivals = [];
        $destinations = [];
        // Put the location names in the array with the assoc keys
        foreach ($boardCollection as $key => $boardCard) {
            $arrivals[$key] = $boardCard->getArrival()->getLocationName();
            $destinations[$key] = $boardCard->getDestination()->getLocationName();
        }

        // We need to get the difference between them to determine the starting point of the trip.
        $stopKeys = array_diff($arrivals, $destinations);

        // Go threw each stop key and find the next stop. We have the current destination, we just need to
        // find the next board card, that starts in the particular destination
        foreach ($stopKeys as $stopKey => $locationName) {
            while (count($sortedBoardCollectionArray) != count($boardCollection)) {
                $stop = $boardCollection[$stopKey]->getDestination()->getLocationName();
                $sortedBoardCollectionArray[] = $boardCollection[$stopKey];
                $stopKey = array_search($stop, $arrivals);
            }

            // If the road trip has a missing stop, it can be caught and processed here
            if ($locationName != end($stopKeys)) {
                // We can do a lot of things here. Additional re calculations etc...
            }
        }

        $boardingCollectionObject->setBoardingCollection($sortedBoardCollectionArray);
        return $boardingCollectionObject;
    }
}