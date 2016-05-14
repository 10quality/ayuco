<?php

namespace Ayuco;

use Ayuco\Commands\HelpCommand;
use Ayuco\Exceptions\NoticeException;
use Ayuco\Traits\PrintTrait;

/**
 * Ayuco Listener.
 * Acts as a Command-line interface.
 * Listens to comand line inputs to execute predifine commands.
 *
 * @author Alejandro Mostajo <http://www.10quality.com>
 * @package Ayuco
 * @copyright MIT
 * @version 1.0.1
 */
class Listener
{
    use PrintTrait;

    /**
     * Command-line arguments.
     * @since 1.0.0
     * @var array
     */
    protected $argv;

    /**
     * List of available commands for execution.
     * @since 1.0.0
     * @var array
     */
    protected $commands = [];

    /**
     * Input handler.
     * @since 1.0.0
     * @var mixed
     */
    protected $input;

    /**
     * Default constructor.
     * @since 1.0.0
     * @since 1.0.1 HelpCommands included on construct.
     *
     * @global array $argv Command-line arguments.
     */
    public function __construct()
    {
        global $argv;
        $this->argv = $argv;
        $this->input = fopen('php://stdin', 'r');
        // Auto register help command.
        $this->register(new HelpCommand);
    }

    /**
     * Listens to command-lines.
     * Echos any resulting message.
     * Static constructor.
     * @since 1.0.0
     *
     * @return Listener
     */
    public static function listen()
    {
        $listener = new self();
        $listener->interpret();
        return $listener;
    }

    /**
     * Returns command-line input.
     * @since 1.0.0
     *
     * @return string
     */
    public function getInput()
    {
        return trim(fgets($this->input));
    }

    /**
     * Registers command.
     * @since 1.0.0
     *
     * @param Command $command Command to register.
     *
     * @return Listener for chaining.
     */
    public function register(Command $command)
    {
        $command->setListener($this);
        $this->commands[$command->key] = [
            'handler'       => $command,
            'inExecution'   => false,
        ];
        return $this;
    }

    /**
     * Returns command handler.
     * @since 1.0.0
     *
     * @param string $commandKey Command key.
     *
     * @return Command
     */
    public function get($commandKey)
    {
        if (!array_key_exists($commandKey, $this->commands))
            return;
        return $this->commands[$commandKey]['handler'];
    }

    /**
     * Interprets arguments and calls function.
     * @since 1.0.0
     */
    public function interpret()
    {
        try {
            if (empty($this->argv) || count($this->argv) <= 1)
                throw new NoticeException('No command given.');

            $this->call($this->argv[1]);

        } catch (NoticeException $e) {
            $this->notify($e->getMessage());
        }
        exit;
    }

    /**
     * Executes a command by key.
     * @since 1.0.0
     *
     * @param string $commandKey Command key.
     */
    protected function call($commandKey)
    {
        if (!array_key_exists($commandKey, $this->commands))
            throw new NoticeException('Command "' . $commandKey .'" not found.');

        $this->commands[$commandKey]['inExecution'] = true;
        $this->commands[$commandKey]['handler']->call($this->argv);
    }

    /**
     * Notifies message to command-line.
     * @since 1.0.0
     *
     * @param string $message Message.
     */
    protected function notify($message)
    {
        if (!empty($message))
            print($message);
        $this->_lineBreak();
    }

    /**
     * Getter magic function.
     * READ-ONLY properties.
     * @since 1.0.1
     *
     * @param string $property Property name.
     *
     * @return mixed
     */
    public function __get($property)
    {
        if ($property === 'commands')
            return $this->$property;
        return;
    }
}