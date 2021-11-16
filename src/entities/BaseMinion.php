<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\entities;

use Mcbeany\BetterMinion\minions\MinionInformation;
use pocketmine\entity\Human;
use pocketmine\inventory\SimpleInventory;
use pocketmine\item\Item;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

abstract class BaseMinion extends Human 
{
    private MinionInformation $minionInfo;
    private SimpleInventory $minionInv;
    protected int $waitTick = 0, $workTick = 0;
    protected function initEntity(CompoundTag $nbt): void
    {
        parent::initEntity($nbt);
        $this->minionInfo = MinionInformation::nbtDeserialize($this->namedtag->getCompoundTag("information"));
        $this->minionInv = new SimpleInventory($this->getMinionInformation()->getLevel());
        $invTag = $this->namedtag->getListTag("minionInv");
        if ($invTag !== null and $invTag instanceof ListTag) { // uhhh VS Code
            $this->minionInv->setContents(array_map(function (CompoundTag $tag): Item {
                return Item::nbtDeserialize($tag);
            }, $invTag->getValue()));
        }
    }
    public function saveNBT(): CompoundTag
    {
        $nbt = parent::saveNBT();
        $nbt->setTag("minionInfo", $this->getMinionInformation()->nbtSerialize());
        $nbt->setTag("minionInv", new ListTag(array_map(function (Item $item): CompoundTag {
            return $item->nbtSerialize();
        }, $this->getMinionInventory()->getContents())));
        return $nbt;
    }
    protected function getMinionInformation(): MinionInformation
    {
        return $this->minionInfo;
    }
    protected function getMinionInventory(): SimpleInventory
    {
        return $this->minionInv;
    }
}