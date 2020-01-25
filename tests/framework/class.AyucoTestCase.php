<?php

use PHPUnit\Framework\TestCase;

/**
 * Extends PHPUnit test case to added default
 * testing environment configuration.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class AyucoTestCase extends TestCase
{
    /**
     * Ayuco builder.
     * @since 1.0.0
     * @var AyucoBuilder
     */
    protected $builder;

    /**
     * Environment configuration
     * @since 1.0
     * @var array
     */
    protected $env = [
        'plugin'    => [
                        'path'      => '/plugin/',
                        'namespace' => 'TestPlugin',
                    ],
        'theme'     => [
                        'path'      => '/theme/',
                        'namespace' => 'TestTheme',
                    ],
    ];

    /**
     * Constructs a test case with the given name.
     * @since 1.0.0
     *
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->builder = new AyucoBuilder();
    }

    /**
     * Returns the results of the execution of a command.
     * @since 1.0.3
     * 
     * @param string $command
     * @param bool   $log
     * 
     * @return string|null 
     */
    public function _execCommand( $command, $log = false )
    {
        $execution = exec('php ' . $this->builder->build() . ' ' . $command);
        if ($log)
            $this->log($execution);
        $this->builder->clear();
        return $execution;
    }

    /**
     * Asserts the execution of a command.
     * @since 1.0.0
     *
     * @param string $command Command to execute.
     * @param string $print   Last print message to compare to.
     * @param string $message PHPUNIT message.
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public function assertCommand($expected, $command, $message = 'Failed asseting command result.')
    {
        self::assertThat(
            $expected,
            self::identicalTo($this->_execCommand($command)),
            $message
        );
    }
}