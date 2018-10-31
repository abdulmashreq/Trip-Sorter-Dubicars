<?php

namespace Trip\src\Boards;

/**
 * Class Boards
 *
 * @package Trip\src\Boards
 */
abstract class Boards implements \Trip\src\Interfaces\BoardInterface
{
    const BUS_MESSAGE_DEFAULT = "Take the bus %s from %s to %s.";
    const AIRPORT_BUS_MESSAGE_DEFAULT = "Take the airport bus %s from %s to %s.";
    const TRAIN_MESSAGE_DEFAULT = "Take train %s from %s to %s.";
    const FLIGHT_MESSAGE_DEFAULT = "From %s, take flight %s to %s. Gate %s, Seat %s.";
    const SEAT_NOT_ASSIGNED_MESSAGE = "No seat assignment.";
    const SEAT_ASSIGNED_MESSAGE = "Sit in Seat %s.";
    const BAGGAGE_NOT_ASSIGNED_MESSAGE = "Baggage will we automatically transferred from your last leg.";
    const BAGGAGE_ASSIGNED_MESSAGE = "Baggage drop at ticket counter %s.";

    /**
     * constructor
     */
    public function __construct()
    {
    }
}
