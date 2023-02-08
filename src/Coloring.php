<?php

namespace Ayuco;

use PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor;

/**
 * Command base abstract clase.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.4
 */
class Coloring
{
    /**
     * Singletone coloring class.
     * @since 1.0.4
     * 
     * @var \PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor
     */
    protected static $handler;

    /**
     * Returns text with color applied if supported.
     * @since 1.0.4
     * 
     * @param string|array $style
     * @param string       $text
     * 
     * @return string
     */
    public static function apply($style, $text)
    {
        if (!isset(static::$handler))
            static::$handler = new ConsoleColor;
        return static::$handler->apply($style, $text);
    }

    /**
     * Returns coloring handler.
     * @since 1.0.4
     * 
     * @return \PHP_Parallel_Lint\PhpConsoleColor\ConsoleColor
     */
    public static function handler()
    {
        if (!isset(static::$handler))
            static::$handler = new ConsoleColor;
        return static::$handler;
    }
}