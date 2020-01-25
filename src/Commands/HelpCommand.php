<?php

namespace Ayuco\Commands;

use Ayuco\Command;
use Ayuco\Exceptions\NoticeException;

/**
 * Command that setups project.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package Ayuco
 * @version 1.0.3
 */
class HelpCommand extends Command
{
    /**
     * Command key.
     * @since 1.0.0
     * @var string
     */
    protected $key = 'help';

    /**
     * Command description.
     * @since 1.0.0
     * @var string
     */
    protected $description = 'Lists AYUCO available commands.';

    /**
     * Calls to command action.
     * @since 1.0.0
     *
     * @param array $args Action arguments.
     */
    public function call($args = [])
    {
        $commands = $this->listener->commands;
        ksort($commands);
            
        try {
            $this->_lineBreak();
            $this->_print('------------------------------');
            $this->_lineBreak();
            $this->_print('Available commands:');
            $this->_lineBreak();
            $this->_print('------------------------------');
            foreach ($commands as $command) {
                $this->_lineBreak();
                $this->_print('%s - %s', [
                    str_pad($command['handler']->key, 25, ' ', STR_PAD_RIGHT),
                    $command['handler']->description,
                ]);
                $this->_lineBreak();
            }
            $this->_print('------------------------------');
            $this->_lineBreak();
            $this->_print('More information available at https://github.com/10quality/ayuco');
            $this->_lineBreak();
            $this->_print('------------------------------');
            $this->_lineBreak();
        } catch (NoticeException $e) {
            throw new NoticeException('Command "help": Failed! ' . $e->getMessage());
        }
    }
}
