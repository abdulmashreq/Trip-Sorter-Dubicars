<?php

namespace Trip\src\Boards;

/**
 * Class Bus
 *
 * @package Trip\src\Boards
 */
class Bus extends Boards
{
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
