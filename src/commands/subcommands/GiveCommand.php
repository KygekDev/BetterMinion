<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\commands\subcommands;

use BetterMinion\src\commands\arguments\TypeArgument;
use CortexPE\Commando\args\RawStringArgument;
use CortexPE\Commando\BaseSubCommand;
use pocketmine\command\CommandSender;

class GiveCommand extends BaseSubCommand
{
    protected function prepare(): void
    {
        $this->setPermission("betterminion.command");
        $this->registerArgument(0, new RawStringArgument("player"));
        $this->registerArgument(1, new TypeArgument("type"));
        $this->registerArgument(2, new RawStringArgument("target"));
    }
    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void
    {
    }
}