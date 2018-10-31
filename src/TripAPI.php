<?php

namespace Trip\src;

class TripAPI
{
    const FINAL_MESSAGE = "You have arrived at your final destination";

    private $inputArray = array();
    private $tripArray = array();
    private $pivotArr = array();
    private $startingBoradingCard = '';

    public function __construct($inputArr)
    {
        $this->inputArray = $inputArr;
        $this->pivotArr = $this->getAllFromAndToIndex();
    }

    private function getAllFromAndToIndex()
    {
        $boardingCardFromIndexes = array();
        $boardingCardToIndexes = array();
        
        foreach ($this->inputArray as $index => $boardingCard) {
            $boardingCardFromIndexes [$boardingCard ['from']] = $index;
            $boardingCardToIndexes [$boardingCard ['to']] = $index;
        }
        return array(
                "fromIndexes" => $boardingCardFromIndexes,
                "toIndexes" => $boardingCardToIndexes
        );
    }

    private function getFirstBoardingCard()
    {
        foreach ($this->pivotArr ['fromIndexes'] as $fromPoint => $fromPointIndex) {
            if (! key_exists($fromPoint, $this->pivotArr ['toIndexes'])) {
                return $this->inputArray [$fromPointIndex];
            }
        }
        throw new TripAPIException("Invalid Configuration Exception");
    }

    public function sortBoardingCards()
    {
        $currentBoardingCard = $this->getFirstBoardingCard();
        
        array_push($this->tripArray, $currentBoardingCard);
        
        while (true) {
            if (! key_exists($currentBoardingCard ['to'], $this->pivotArr ['fromIndexes'])) {
                break;
            }
            
            $currentBoardingCard = $this->inputArray [$this->pivotArr ['fromIndexes'] [$currentBoardingCard ['to']]];
            array_push($this->tripArray, $currentBoardingCard);
        }
        
        return $this->tripArray;
    }

    public function getBoardingMessages()
    {
        $orderedBoadingCards = $this->sortBoardingCards();
        $boardingMessages = array();
        foreach ($orderedBoadingCards as $boardingCard) {
            $boardingMessageObj = $this->getClasses($boardingCard);
            array_push($boardingMessages, $boardingMessageObj->getMessage($boardingCard));
        }
        array_push($boardingMessages, self::FINAL_MESSAGE);
        return $boardingMessages;
    }

    public function getClasses($boardingCard)
    {
        switch ($boardingCard ['modeOfTransport']) {
            case 'Train':
                $classInstance = new Boards\Train();
                break;
            case 'Airport':
                $classInstance = new Boards\Airport();
                break;
            case 'Bus':
                $classInstance = new Boards\Bus();
                break;
            case 'Flight':
                $classInstance = new Boards\Flight();
                break;
            default:
                return '';
        }
        return $classInstance;
    }
}
