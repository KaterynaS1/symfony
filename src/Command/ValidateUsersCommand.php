<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsCommand(name: 'app:validate-users')]
class ValidateUsersCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $em,
        private ValidatorInterface $validator
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach ($this->em->getRepository(User::class)->findAll() as $user) {
            foreach ($this->validator->validate($user) as $error) {
                $output->writeln(
                    'User #' . $user->getId() . ' → ' .
                    $error->getPropertyPath() . ': ' . $error->getMessage()
                );
            }
        }

        return Command::SUCCESS;
    }
}
