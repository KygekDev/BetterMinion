<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\minions;

use pocketmine\nbt\tag\CompoundTag;

final class MinionUpgrade
{
    private bool $autoSmelt,
                 $autoSell,
                 $compact,
                 $expand;
    public static function new(bool $autoSmelt = false, bool $autoSell = false, bool $compact = false, bool $expand = false): self
    {
        $upgrade = new self();
        $upgrade->autoSmelt = $autoSmelt;
        $upgrade->autoSell = $autoSell;
        $upgrade->compact = $compact;
        $upgrade->expand = $expand;
        return $upgrade;
    }
    public function isAutoSmelt(): bool
    {
        return $this->autoSmelt;
    }
    public function isAutoSell(): bool
    {
        return $this->autoSell;
    }
    public function isCompact(): bool
    {
        return $this->compact;
    }
    public function isExpand(): bool
    {
        return $this->expand;
    }
    public function setAutoSmelt(bool $autoSmelt = true): void
    {
        $this->autoSmelt = $autoSmelt;
    }
    public function setAutoSell(bool $autoSell = true): void
    {
        $this->autoSell = $autoSell;
    }
    public function setCompact(bool $compact = true): void
    {
        $this->compact = $compact;
    }
    public function setExpand(bool $expand = true): void
    {
        $this->expand = $expand;
    }
    public function nbtSerialize(): CompoundTag
    {
        return CompoundTag::create()
            ->setByte("autoSmelt", $this->autoSmelt ? 1 : 0)
            ->setByte("autoSell", $this->autoSell ? 1 : 0)
            ->setByte("compact", $this->compact ? 1 : 0)
            ->setByte("expand", $this->expand ? 1 : 0);
    }
    public static function nbtDeserialize(CompoundTag $nbt): self
    {
        return self::new(
            $nbt->getByte("autoSmelt") === 1,
            $nbt->getByte("autoSell") === 1,
            $nbt->getByte("compact") === 1,
            $nbt->getByte("expand") === 1
        );
    }
}