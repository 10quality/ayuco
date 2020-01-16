<?php

use PHPUnit\Framework\TestCase;

/**
 * Extends PHPUnit test case to added default
 * testing environment configuration.
 *
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 * @version 1.0.2
 */
class AyucoTestCase extends TestCase
{
    /**
     * Ayuco builder.
     * @since 1.0
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
     * @since 1.0
     *
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->builder = new AyucoBuilder();
        $this->env['plugin']['path'] = ENV_PATH . $this->env['plugin']['path'];
        $this->env['theme']['path'] = ENV_PATH . $this->env['theme']['path'];
    }

    /**
     * Asserts the execution of a command.
     * @since 1.0
     *
     * @param string $command Command to execute.
     * @param string $print   Last print message to compare to.
     * @param string $message PHPUNIT message.
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public function assertCommand($command, $print = '', $message = 'Failed asseting command result.')
    {
        $execution = exec('php ' . $this->builder->build() . ' ' . $command);
        $this->builder->clear();
        //$this->builder->log($execution);

        self::assertThat(
            $execution == $print,
            self::isTrue(),
            $message
        );
    }
}