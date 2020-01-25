<?php
use Ayuco\Command;

/**
 * Testing command that prints captured commands.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class OptionsCommand extends Command
{
    /**
     * Command key.
     * @since 1.0.3
     * @var string
     */
    protected $key = 'options';
    /**
     * Calls to command action.
     * @since 1.0.3
     *
     * @param array $args Action arguments.
     */
    public function call($args = [])
    {
        $this->_print(json_encode($this->options));
    }
}