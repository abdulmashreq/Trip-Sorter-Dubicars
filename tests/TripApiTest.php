<?php

namespace Trip;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

final class TripTest extends TestCase
{
    protected function setUp()
    {
        $inputJson = file_get_contents('test.json');
        $inputArray = json_decode($inputJson, true);
        $this->Trip = new src\TripAPI($inputArray);
    }

    /**
    *@group TripSorting First Results
    */
    public function testTripFirstSorting(): void
    {
        $boardingResults = $this->Trip->sortBoardingCards();
        $message = 'Madrid';
        $this->assertEquals($message, $boardingResults[0]['from']);
    }

    /**
    *@group TripSorting Last Results
    */
    public function testTripLastSorting(): void
    {
        $boardingResults = $this->Trip->sortBoardingCards();
        $message = 'New York';
        $this->assertEquals($message, $boardingResults[3]['to']);
    }

    /**
    *@group TripSorting Messages 1
    */
    public function testTripSortingMessages1(): void
    {
        $boardingMessages = $this->Trip->getBoardingMessages();
        $message = 'Take train 78A from Madrid to Barcelona.Sit in Seat 45B.';
        $this->assertEquals($message, $boardingMessages[0]);
    }

    /**
    *@group TripSorting Messages 2
    */
    public function testTripSortingMessages2(): void
    {
        $boardingMessages = $this->Trip->getBoardingMessages();
        $message = 'Take the bus  from Barcelona to Gerona Airport.No seat assignment.';
        $this->assertEquals($message, $boardingMessages[1]);
    }

    /**
    *@group TripSorting Messages 3
    */
    public function testTripSortingMessages3(): void
    {
        $boardingMessages = $this->Trip->getBoardingMessages();
        $message = 'SK455';
        $this->assertContains($message, $boardingMessages[2]);
    }

    /**
    *@group TripSorting final Messages
    */
    public function testFinalMessages(): void
    {
        $boardingMessages = $this->Trip->getBoardingMessages();
        $message = 'You have arrived at your final destination';
        $this->assertEquals($message, $boardingMessages[4]);
    }
}
