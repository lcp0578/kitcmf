<?php
namespace KitAdminBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class PullCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
        // the name of the command (the part after "bin/console")
        ->setName('pull:data')
    
        // the short description shown while running "php bin/console list"
        ->setDescription('Pull data.')
    
        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp("This command allows pull data...");
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'start pull',
            '..........',
        ]);
        $service = $this->getContainer()->get('kit_controller.data_default');
        $result = $service->receiveAction();
//         $output->writeln('result:', $result);
        file_put_contents('command.log', '['.date('Y-m-d H:i:s').']' . json_encode($result) . "\r\n", FILE_APPEND);
        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');
    
        // outputs a message without adding a "\n" at the end of the line
        $output->write('You are about to ');
        $output->write('create a user.');
        $output->writeln([
            'end pull !'
        ]);
    }
}