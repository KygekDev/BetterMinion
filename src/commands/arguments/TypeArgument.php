<?php

declare(strict_types=1);

namespace BetterMinion\src\commands\arguments;

use CortexPE\Commando\args\StringEnumArgument;
use Mcbeany\BetterMinion\minions\MinionType;
use pocketmine\command\CommandSender;

class TypeArgument extends StringEnumArgument
{
    public function __construct(string $name, bool $optional = false)
    {
        parent::__construct($name, $optional);
    }
    public function parse(string $argument, CommandSender $sender)
    {
        return MinionType::fromString($argument);
    }
    public function getEnumValues(): array
    {
        return array_map(function (MinionType $type) {
            return $type->name();
        }, MinionType::getAll());
    }
    public function getTypeName(): string
    {
        return "type";
    }
}