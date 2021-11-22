<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\minions;

use Mcbeany\BetterMinion\entities\types\MiningMinion;
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
    use EnumTrait {
        __construct as private __enumConstruct;
    }
    private string $className;
    private function __construct(string $enumName, string $className)
    {
        $this->__enumConstruct($enumName);
        $this->className = $className;
    }
    public function getClassName(): string
    {
        return $this->className;
    }
    protected static function setup(): void
    {
        self::registerAll(
            new MinionType("mining", MiningMinion::class),
            /*new MinionType("farming"),
            new MinionType("lumberjack"),
            new MinionType("fishing"),
            new MinionType("combat")*/
        );
    }
    public static function fromString(string $name): MinionType
    {
        self::checkInit();
        if (!isset(self::$members[$name])) {
            throw new \InvalidArgumentException("Invalid minion type name: $name");
        }
        return self::$members[$name];
    }
}