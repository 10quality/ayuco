<?php

namespace Ayuco;

use Ayuco\Contracts\Command as Contract;
use Ayuco\Traits\PrintTrait;

/**
 * Command base abstract clase.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
abstract class Command implements Contract
{
    use PrintTrait;

    /**
     * Listener.
     * @since 1.0.0
     * 
     * @var \Ayuco\Listener
     */
    protected $listener;

    /**
     * Command key.
     * @since 1.0.0
     * 
     * @var string
     */
    protected $key = '';

    /**
     * Command description.
     * Displayed on help command.
     * @since 1.0.1
     * 
     * @var string
     */
    protected $description = '';

    /**
     * Command options added via specia arguments arguments.
     * @since 1.0.3
     * 
     * @var array
     */
    protected $options = [];

    /**
     * Sets command listener.
     * @since 1.0.0
     *
     * @param \Ayuco\Listener &$listener By reference listener.
     */
    public function setListener(Listener &$listener)
    {
        $this->listener = $listener;
    }

    /**
     * Sets command options.
     * @since 1.0.0
     *
     * @param array options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * Calls to command action.
     * @since 1.0.0
     *
     * @param array $args Action arguments.
     */
    public function call($args = [])
    {
        // TODO
    }

    /**
     * Getter function call.
     * @since 1.0.0
     * @since 1.0.1 changed comparison to switch for more properties.
     *
     * @param string $property Property name.
     *
     * @return mixed
     */
    public function __get($property)
    {
        switch ($property) {
            case 'key':
            case 'description':
                return $this->$property;
        }
        return;
    }

    /**
     * Cast to string.
     * @since 1.0.0
     *
     * @return string
     */
    public function __toString()
    {
        return $this->key;
    }
}