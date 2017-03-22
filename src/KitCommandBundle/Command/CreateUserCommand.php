<?php
namespace KitCommandBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class CreateUserCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this->setName('create:user')
            ->addArgument('username', InputArgument::REQUIRED, 'The name of user:')
            ->addArgument('password', InputArgument::OPTIONAL, 'The password of user:')
            ->setDescription('The command of create user')
            ->setHelp('--username=xxx, --password=***');
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $userManager = $this->getContainer()->get('kit.user_manager');
        $result = $userManager->create($input->getArgument('username'), $input->getArgument('password'));
        
        $output->writeln('create user,' . $result);
    }
}