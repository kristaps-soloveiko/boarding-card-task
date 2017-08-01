# Board card sorting task

## Contents

* Requirements
* Architecture
* Code base
* Tests
* Usage
* Cometary

## Requirements

* PHP 7.x
* Composer (composer install has to be ran!)

## Architecture and code base

Im my opinion it's always better to split the objects into smallest units possible. We don't always understand the possible future requirements therefore its a small price to pay to reduce the probability of massive refactoring in a few years.
 I have created 6 different classes
 * BoardingCard - The actual card that contains all the properties needed for the task
 * BoardingCollection - An array of BoardingCards
 * Entry Point. This class was meant to be the actual Gate number, bus terminal number etc. I could not think of a better name on fly and even after finishing the task, I decided stick to that class name. 
 * Location - A city, country. It has an X/Y property. We could calculate the actual distances from there
 * Seat - A seat in a transportation vehicle
 * Transportation - A plane, a bus, a train.
 
 Each class is written under an interface with strict input output types.
 
 The main processor is the BoardingGateway. It calls the sorting in the construct method. You can see that it requires a sorter object, so it supports more than one sorter class. Might be useful in the future
 
 For the sake of the task, I made a simple sorting algorithm that sorts some more or less straight forward data. Check SimpleBoardingSorter

## Tests

There are two test files in the test directory
* GeneralTest - I tests if the construct methods sets the parameters correctly
* SortTest - There is only 1 test that checks if the sorting algorithm works. It proved to be extremely useful because I saved a lot of time when optimising code 
The tests can be executed from: __DIR/vendor/bin/phpunit__. Compatible with phpunit v5.6

## Usage

To save You some time, I created an index.php file, Run it on Your dev machine to see the API in action.

## Cometary

This task was quite interesting. It took me around 3.5 hours to finish mostly due to a phpunit issue on my local machine.
 After reviewing the code, I have the following conclusions:
 1) I could have written the sorting algorithm better. I am almost sure that with a few extra hours on google, it could be done better. My way takes too much CPU power
 2) The interfaces should be more documented. But honestly, this structure begs for a proper diagram to begin with
 3) I should have added some data providers for the unit tests. Most probably that there are some places that would choke on faulty data
 4) I should have added FAIL test methods
 5) The BoardingCardCollection constructor needs some type of validation
 6) There is no data validation whatsoever. The sort algorithm should raise exceptions on several spots if validation fails
 
 Even if You make a decision not to go forward with my application, feedback/critique will be greatly appreciated. Thank You and have a nice day!

