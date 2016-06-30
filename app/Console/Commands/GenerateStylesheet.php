<?php namespace App\Console\Commands;

use App\Generator\LessGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Generator\SassGenerator;

/**
 * Class Generate
 * @package App\Console\Commands
 */
class GenerateStylesheet extends Command
{

    /**
     * The name of the command
     *
     * @var string
     */
    protected $name = 'generate:style';

    /**
     * The description of what the command should do
     *
     * @var string
     */
    protected $description = 'Generate a style file in the given type';

    /**
     * Configure the command
     */
    protected function configure()
    {
        $this->setName($this->name);
        $this->setDescription($this->description);

        $this->addArgument(
            'type',
            InputArgument::REQUIRED,
            'Which style type should we generate?'
        );

        $this->addOption('cache', null, null, 'Do not download the source HTML file with curl');
        $this->addOption('pretend', null, null, 'Do not write files');
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type       = $input->getArgument('type');
        $pretend    = $input->getOption('pretend');
        $cache      = $input->getOption('cache');
        
        if ($type === 'sass' || $type === 'scss') {
            SassGenerator::generate($type, [
                'pretend' => $pretend,
                'cache' => $cache
            ]);
        } elseif ($type === 'less') {
            LessGenerator::generate($type, [
                'pretend' => $pretend,
                'cache' => $cache
            ]);
        }
    }
}
