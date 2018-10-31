<?php

namespace Trip\src\Boards;

/**
 * Class Flight
 *
 * @package Trip\src\Boards
 */
class Flight extends Boards
{
    const FLIGHT_MESSAGE_DEFAULT = "From %s, take flight %s to %s. Gate %s, Seat %s.";
    const BAGGAGE_NOT_ASSIGNED_MESSAGE = "Baggage will we automatically transferred from your last leg.";
    const BAGGAGE_ASSIGNED_MESSAGE = "Baggage drop at ticket counter %s.";

    /**
     * return results as per BoardInterface
     *
     * @return string
     */
    public function getMessage($boardingCard)
    {
        $message = sprintf(self::FLIGHT_MESSAGE_DEFAULT, $boardingCard ['transportNo'], $boardingCard ['from'], $boardingCard ['to'], $boardingCard ['gateNo'], $boardingCard ['seatNo']);
        if (! empty($boardingCard ['baggage'])) {
            $message .= "\n" . sprintf(self::BAGGAGE_ASSIGNED_MESSAGE, $boardingCard ['baggage']);
        } else {
            $message .= "\n" . self::BAGGAGE_NOT_ASSIGNED_MESSAGE;
        }
        return $message;
    }
}
