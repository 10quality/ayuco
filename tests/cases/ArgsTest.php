<?php

use Ayuco\Listener;
/**
 * Testing command arguments.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class ArgsTest extends AyucoTestCase
{
    /**
     * Inits args command on every test.
     * @since 1.0.3
     */
    public function setUp()
    {
        $this->builder->register(ArgsCommand::class);
    }
    /**
     * Tests command with no args.
     * @since 1.0.3
     */
    public function testEmpty()
    {
        $this->assertCommand('[]', 'args');
    }
    /**
     * Tests with arguments.
     * @since 1.0.3
     */
    public function testArguments()
    {
        $this->assertCommand('{"2":"activate","3":"test"}', 'args activate test');
    }
    /**
     * Tests with arguments with options.
     * @since 1.0.3
     */
    public function testArgumentsWithOptions()
    {
        $this->assertCommand('{"2":"activate","3":"test"}', 'args activate test --debug');
    }
    /**
     * Tests with arguments with options in between.
     * @since 1.0.3
     */
    public function testArgumentsWithOptionsInBetween()
    {
        $this->assertCommand('{"2":"activate","3":"test"}', 'args activate --debug test');
    }
}