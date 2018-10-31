<?php

namespace Trip\src\Boards;

/**
 * Class Bus
 *
 * @package Trip\src\Boards
 */
class Bus extends Boards
{
    const BUS_MESSAGE_DEFAULT = "Take the bus %s from %s to %s.";
    const SEAT_NOT_ASSIGNED_MESSAGE = "No seat assignment.";
    const SEAT_ASSIGNED_MESSAGE = "Sit in Seat %s.";

    /**
     * return results as per BoardInterface
     *
     * @return string
     */
    public function getMessage($boardingCard)
    {
        $message = sprintf(self::BUS_MESSAGE_DEFAULT, (! empty($boardingCard ['transportNo']) ? $boardingCard ['transportNo'] : ''), $boardingCard ['from'], $boardingCard ['to']);
        if (! empty($boardingCard ['seatNo'])) {
            $message .= sprintf(self::SEAT_ASSIGNED_MESSAGE, $boardingCard ['seatNo']);
        } else {
            $message .= self::SEAT_NOT_ASSIGNED_MESSAGE;
        }
        return $message;
    }
}
