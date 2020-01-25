<?php

use Ayuco\Listener;
/**
 * Tests command options.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class OptionsTest extends AyucoTestCase
{
    /**
     * Inits options command on every test.
     * @since 1.0.3
     */
    public function setUp()
    {
        $this->builder->register(OptionsCommand::class);
    }
    /**
     * Tests command with no options.
     * @since 1.0.3
     */
    public function testEmpty()
    {
        $this->assertCommand('[]', 'options');
    }
    /**
     * Tests command with single flag options.
     * @since 1.0.3
     */
    public function testSingleFlag()
    {
        $this->assertCommand('{"debug":true,"echo":true}', 'options --debug --echo');
    }
    /**
     * Tests command with options associated with values.
     * @since 1.0.3
     */
    public function testAssociated()
    {
        $this->assertCommand('{"title":"yo","echo":"test"}', 'options --title=yo --echo=test');
    }
    /**
     * Tests command associated strings.
     * @since 1.0.3
     */
    public function testAssociatedString()
    {
        $this->assertCommand('{"message":"full message"}', 'options --message="full message"');
    }
    /**
     * Tests command associated strings with escaped quotes.
     * @since 1.0.3
     */
    public function testAssociatedStringSingleQuotes()
    {
        $this->assertCommand('{"message":"full \"yo\" message"}', 'options --message="full \"yo\" message"');
    }
    /**
     * Tests command associated JSON strings.
     * @since 1.0.3
     */
    public function testAssociatedJson()
    {
        $this->assertCommand('{"message":"{\"name\":\"John Doe\",\"flag\":true}"}', 'options --message="{\"name\":\"John Doe\",\"flag\":true}"');
    }
    /**
     * Tests command with multiple options.
     * @since 1.0.3
     */
    public function testMultiple()
    {
        $this->assertCommand('{"echo":true,"message":"echo test","type":"3"}', 'options --echo --message="echo test" --type=3');
    }
    /**
     * Tests command with options and arguments.
     * @since 1.0.3
     */
    public function testWithArguments()
    {
        $this->assertCommand('{"debug":true}', 'options activate --debug test');
    }
}