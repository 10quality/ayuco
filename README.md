# Ayuco

Command-line interface for the Wordpress-MVC framework.

Ayuco works outside this framework aswell, and can be used to execute command written in PHP.

## Usage

```php
use Ayuco\Listener;
```

Create a listener variable:
```php
$ayuco = new Listener();

// or without initial use
$ayuco = new Ayuco\Listener()
```

Register your commands.
```php
$ayuco->register($command1)
    ->register($command2);
```

Start interpreting or listening:
```php
$ayuco->interpret();
```

Use in command line:
```bash
php filename command_key arguments
```

If `filename` is `ayuco.php` and `command_key` is `clear_cache`, command will be:

```bash
php ayuco.php clear_cache
```

### Create a custom command

Create your own class command by extending from Ayuco base command class:
```php
use Ayuco\Command;

class MyCommand extends Command
{
    protected $key = 'command_key';

    public function call($args = [])
    {
        // TODO command action.
    }
}
```

Example for a clear cache command.

```php
use Ayuco\Command;

class ClearCacheCommand extends Command
{
    protected $key = 'clear_cache';

    public function call($args = [])
    {
        Cache::flush(); // Example
    }
}
```

Registration in listener would be:
```php
$ayuco->register(new ClearCacheCommand);
```

## Requirements

* PHP >= 5.4

## Coding guidelines

PSR-4.

## LICENSE

The MIT License (MIT)

Copyright (c) 2016 10Quality - http://www.10quality.com