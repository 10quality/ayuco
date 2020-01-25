<?php
use Ayuco\Command;

/**
 * Testing command arguments.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class ArgsCommand extends Command
{
    /**
     * Command key.
     * @since 1.0.3
     * @var string
     */
    protected $key = 'args';
    /**
     * Calls to command action.
     * @since 1.0.3
     *
     * @param array $args Action arguments.
     */
    public function call($args = [])
    {
        unset($args[0]); // Ayuco file
        unset($args[1]); // Command name
        $this->_print(json_encode($args));
    }
}