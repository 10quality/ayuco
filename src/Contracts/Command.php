<?php

namespace Ayuco\Contracts;

use Ayuco\Listener;

/**
 * Command interface.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
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