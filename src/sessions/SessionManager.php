<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\sessions;

use Mcbeany\BetterMinion\entities\BaseMinion;
use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;

final class SessionManager
{
    use SingletonTrait;
    /** @var Session[] $sessions */
    private array $sessions = [];
    public function createSession(Player $player): void
    {
        $session = new Session();
        $session->setMinionCount(self::caculateMinionCount($player));
        $this->sessions[$player->getName()] = $session;
    }
    public function destroySession(Player $player): void
    {
        unset($this->sessions[$player->getName()]);
    }
    public function getSession(Player $player): Session
    {
        if (!isset($this->sessions[$player->getName()])) {
            $this->createSession($player);
        }
        return $this->sessions[$player->getName()];
    }
    public static function caculateMinionCount(Player $player): int
    {
        $minionCount = 0;
        foreach ($player->getServer()->getWorldManager()->getWorlds() as $world) {
            foreach ($world->getEntities() as $entity) {
                if ($entity instanceof BaseMinion) {
                    if ($entity->getMinionInformation()->getOwner()->equals($player->getUniqueId())) {
                        $minionCount++;
                    }
                }
            }
        }
        return $minionCount;
    }
}