<?php

namespace Ayuco\Traits;

/**
 * Print traits.
 * Provides classes with print/echo function.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
trait PrintTrait
{
    /**
     * Prints message in command-line.
     * @since 1.0.0
     *
     * @param string $message Message to print.
     * @param array  $args    Message arguments. SPRINTF
     */
    protected function _print($message, $args = null)
    {
        if ($args === null) {
            echo $message;
            return;
        }
        echo call_user_func_array(
            'sprintf',
            array_merge(
                [$message],
                is_array($args) ? $args : [$args]
            )
        );
    }

    /**
     * Prints line break.
     * @since 1.0.0
     */
    protected function _lineBreak()
    {
        echo "\n";
    }
}