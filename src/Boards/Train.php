<?php

namespace Trip\src\Boards;

/**
 * Class Train
 *
 * @package Trip\src\Boards
 */
class Train extends Boards
{
    const TRAIN_MESSAGE_DEFAULT = "Take train %s from %s to %s.";
    const SEAT_NOT_ASSIGNED_MESSAGE = "No seat assignment.";
    const SEAT_ASSIGNED_MESSAGE = "Sit in Seat %s.";

    /**
     * return results as per BoardInterface
     *
     * @return string
     */

    public function getMessage($boardingCard)
    {
        $message = sprintf(self::TRAIN_MESSAGE_DEFAULT, (! empty($boardingCard ['transportNo']) ? $boardingCard ['transportNo'] : ''), $boardingCard ['from'], $boardingCard ['to']);
        if (! empty($boardingCard ['seatNo'])) {
            $message .= sprintf(self::SEAT_ASSIGNED_MESSAGE, $boardingCard ['seatNo']);
        } else {
            $message .= self::SEAT_NOT_ASSIGNED_MESSAGE;
        }
        return $message;
    }
}
