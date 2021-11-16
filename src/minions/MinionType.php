<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\minions;

use pocketmine\utils\EnumTrait;

/**
 * This doc-block is generated automatically, do not modify it manually.";
 * This must be regenerated whenever registry members are added, removed or changed.";
 * @see build/$selfName";
 * @generate-registry-docblock";
 *
 * @method static MinionType MINING()
 * @method static MinionType FARMING()
 * @method static MinionType LUMBERJACK()
 * @method static MinionType FISHING()
 * @method static MinionType COMBAT()
 */

final class MinionType
{
    use EnumTrait;
    protected static function setup(): void
    {
        self::registerAll(
            new MinionType("mining"),
            new MinionType("farming"),
            new MinionType("lumberjack"),
            new MinionType("fishing"),
            new MinionType("combat")
        );
    }
    public static function fromString(string $str): self
    {
        return new self($str);
    }
}