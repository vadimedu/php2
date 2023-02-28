<?php

namespace GeekBrains\LevelTwo\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUser extends Command {
    public function __construct($UserRepository)
    {
        parent::__construct();
        }

    protected function configure(): void
{
$this
// Указываем имя команды;
// мы будем запускать команду,
// используя это имя
->setName('users:create')
// Описание команды
->setDescription('Creates new user')
// Перечисляем аргументы команды
->addArgument(
// Имя аргумента;
// его значение будет доступно
// по этому имени
'first_name',
// Указание того,
// что аргумент обязательный
InputArgument::REQUIRED,
// Описание аргумента
'First name'
)
// Описываем остальные аргументы
->addArgument('last_name', InputArgument::REQUIRED, 'Last name')
->addArgument('username', InputArgument::REQUIRED, 'Username')
->addArgument('password', InputArgument::REQUIRED, 'Password');
}
// Метод, который будет запущен при вызове команды
// В метод будет передан объект типа InputInterface,
// содержащий значения аргументов;
// и объект типа OutputInterface,
// имеющий методы для форматирования и вывода сообщений
protected function execute(
InputInterface $input,
OutputInterface $output
) {
    $output->writeln('Create user command started');
    return Command::SUCCESS;
}
}