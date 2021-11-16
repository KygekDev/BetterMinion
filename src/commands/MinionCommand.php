<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\commands;

use CortexPE\Commando\BaseCommand;
use Mcbeany\BetterMinion\commands\subcommands\GiveCommand;
use Mcbeany\BetterMinion\commands\subcommands\RemoveCommand;
use pocketmine\command\CommandSender;

class MinionCommand extends BaseCommand
{
    protected function prepare(): void
    {
        $this->registerSubCommand(new GiveCommand("give", "Give player a minion spawner"));
        $this->registerSubCommand(new RemoveCommand("remove", "Switch to minion removing mode"));
    }
    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void
    {
    }
}