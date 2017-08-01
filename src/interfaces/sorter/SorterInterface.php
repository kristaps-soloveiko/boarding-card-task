<?php
/**
 * Created by PhpStorm.
 * User: Kristaps
 * Date: 01/08/2017
 * Time: 14:35
 */

namespace src\interfaces\sorter;


use src\interfaces\BoardingCollectionInterface;

/**
 * Interface Sorter
 * @package src\core\interfaces\sorter
 */
interface SorterInterface
{
    /**
     * @param BoardingCollectionInterface $boardingCollection
     * @return BoardingCollectionInterface
     */
    public function sort(BoardingCollectionInterface $boardingCollection) : BoardingCollectionInterface;
}