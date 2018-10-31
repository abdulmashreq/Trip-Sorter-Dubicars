<?php

namespace Trip\src\Interfaces;

/**
 * Interface BoardInterface
 *
 * @package src\Interfaces
 */
interface BoardInterface
{

    /**
     * return results
     *
     * @return string
     */
    public function getMessage($cards);
}
