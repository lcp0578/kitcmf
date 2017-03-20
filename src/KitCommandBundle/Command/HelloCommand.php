<?php
namespace KitCommandBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
/**
 * 
 */
class HelloCommand extends Command
{
    protected function configure()
    {
        $this->setName('kit:hello')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of user')
            ->setDescription('kitcmf hello command')
            ->setHelp('This command is a test');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'kitcmf hello command',
            '========',
            '***********',
            ''
        ]);
        $output->writeln('whoa!');
        
        $output->write('lcpeng');
        $output->write('lcp0578', true);
        $output->write('kit kit', true);
        $output->write('username:' . $input->getArgument('username'));
    }
}