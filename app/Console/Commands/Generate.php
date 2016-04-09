<?php namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use App\Generator\StylesheetGenerator;

/**
 * Class Generate
 * @package App\Console\Commands
 */
class Generate extends Command {

    /**
     * The name of the command
     *
     * @var
     */
    protected $name = 'generate:style';

    /**
     * The description of what the command should do
     *
     * @var
     */
    protected $description = 'Generate a style file in the given type [Default: scss]';

    /**
     * Configure the command
     */
    protected function configure()
    {
        $this->setName($this->name);
        $this->setDescription($this->description);

        $this->addArgument(
            'type',
            InputArgument::OPTIONAL,
            'Which style type should we generate?',
            'scss'
        );
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');

        if ($type === 'scss' || $type === 'less') {
            StylesheetGenerator::generate($type);
            $output->writeln("<info>Wrote the " . strtoupper($type) . " file to: " . storage_path("output." . strtolower($type)) . "</info>");
        } else {
            $output->writeln("<error>Unknown file type {$type}</error>");
        }
    }
}