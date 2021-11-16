<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\minions;

use pocketmine\nbt\tag\CompoundTag;

final class MinionInformation
{
    private string $owner;
    private MinionType $type;
    private int $level;
    private MinionUpgrade $upgrade;
    public static function new(string $owner,
                               MinionType $type,
                               int $level,
                               MinionUpgrade $upgrade): self
    {
        $information = new MinionInformation();
        $information->owner = $owner;
        $information->type = $type;
        $information->level = $level;
        $information->upgrade = $upgrade;
        return $information;
    }
    public function getOwner(): string
    {
        return $this->owner;
    }
    public function getType(): MinionType
    {
        return $this->type;
    }
    public function getLevel(): int
    {
        return $this->level;
    }
    public function getUpgrade(): MinionUpgrade
    {
        return $this->upgrade;
    }
    public function increamentLevel(): void
    {
        $this->level++;
    }
    public function nbtSerialize(): CompoundTag
    {
        return CompoundTag::create()
            ->setString("owner", $this->owner)
            ->setString("type", $this->type->name())
            ->setInt("level", $this->level)
            ->setTag("upgrade", $this->upgrade->nbtSerialize());
    }
    public static function nbtDeserialize(CompoundTag $nbt): self
    {
        return MinionInformation::new(
            $nbt->getString("owner"),
            MinionType::fromString($nbt->getString("type")),
            $nbt->getInt("level"),
            MinionUpgrade::nbtDeserialize($nbt->getTag("upgrade"))
        );
    }
}