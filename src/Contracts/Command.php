<?php

namespace Ayuco\Contracts;

use Ayuco\Listener;

/**
 * Command interface.
 *
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 * @version 1.0.0
 */
interface Command
{
    /**
     * Sets command listener.
     * @since 1.0.0
     *
     * @param Listener $listener By reference listener.
     */
    public function setListener(Listener &$listener);

    /**
     * Calls to command action.
     * @since 1.0.0
     *
     * @param array $args Action arguments.
     */
    public function call($args = []);
}