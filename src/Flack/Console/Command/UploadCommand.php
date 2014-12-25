<?php

namespace Flack\Console\Command;

use StdClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UploadCommand extends Command
{

    const REMOTE_HOST = 'bluehost';
    const REMOTE_PATH = '~/www/other/img';
    const REMOTE_DOMAIN = '~/www/other/img';
    const REMOTE_BASE_URL = 'http://flackend.com/other/img/';

    /**
     * Configures the command. Sets the command name, description, arguments,
     * and options.
     */
    public function configure()
    {
        $this
            ->setName('upload')
            ->setDescription('Upload a file to a server over SSH.')
            ->addArgument('file-path', InputArgument::REQUIRED, 'Path to the file that is to be uploaded.');
    }

    /**
     * This is the "main" method of the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $this->processFilePath($input->getArgument('file-path'));
        $output->writeln("<comment>Starting upload of {$file->fileName}.</comment>");
        exec('scp "' . $file->fullPath . '" ' . self::REMOTE_HOST . ':' . self::REMOTE_PATH);
        exec('printf ' . $file->url . ' | pbcopy');
        $output->writeln("<comment>Finished! Uploaded to {$file->url}.</comment>");
    }

    /**
     * Returns an object with info about the file.
     *
     * @refactor This should be pulled out as it's own class. Maybe Flack\LocalFile.
     * @param  string $filePath The path to the file we're uploading.
     * @return stdClass
     */
    private function processFilePath($filePath)
    {
        $file = new StdClass;
        $file->fullPath = $filePath;
        $file->fileName = basename($filePath);
        $file->url = self::REMOTE_BASE_URL . $file->fileName;
        return $file;
    }
}
