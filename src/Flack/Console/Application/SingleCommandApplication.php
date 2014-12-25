<?php

namespace Flack\Console\Application;

use Flack\Console\Command\UploadCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;

class SingleCommandApplication extends Application
{

    /**
     * Gets the name of the command, usuall based on input. We're overriding the
     * default behavior and setting it based on a constant since this is a
     * single-command application.
     *
     * @param InputInterface $input The input interface
     * @return string The command name
     */
    protected function getCommandName(InputInterface $input)
    {
        return 'upload';
    }

    /**
     * Gets the default commands that should always be available.
     *
     * @return array An array of default Command instances
     */
    protected function getDefaultCommands()
    {
        // Keep the core default commands to have the HelpCommand
        // which is used when using the --help option
        $defaultCommands = parent::getDefaultCommands();
        $defaultCommands[] = new UploadCommand();
        return $defaultCommands;
    }

    /**
     * Overridden so that the application doesn't expect the command name to be
     * the first argument.
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        // clear out the normal first argument, which is the command name
        $inputDefinition->setArguments();
        return $inputDefinition;
    }
}
