<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use function GuzzleHttp\json_encode;

class ArticleStatsCommand extends Command
{
    protected static $defaultName = 'article:stats';
    protected static $defaultDescription = 'Return some article stats.';

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('slug', InputArgument::REQUIRED, 'The article\'s slug.')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'The autput format.', 'text')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $slug = $input->getArgument('slug');

        if ($slug) {
            $io->note(sprintf('You passed an argument: %s', $slug));
        }

        $data = [
            'slug' => $slug,
            'hearts' => rand(10, 100),
        ];

        switch ($input->getOption('format')) {
            case 'text':
                $rowes = [];
                foreach ($data as $key => $value) {
                    $rowes[] = [$key => $value];
                }
                $io->table(['Key', 'Value'], $rowes);
                break;
            case 'json':
                $io->write(json_encode($data));
                break;
            default:
                throw new \Exception('What kinf of crazy format is that?!');
           
        }
    }
}
