<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion;

use Mcbeany\BetterMinion\sessions\SessionManager;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

final class EventListener implements Listener
{
    /** 
     * @ignoreCancelled
     */
    public function onJoin(PlayerJoinEvent $event): void
    {
        SessionManager::getInstance()->createSession($event->getPlayer());
    }
    public function onQuit(PlayerQuitEvent $event): void
    {
        SessionManager::getInstance()->destroySession($event->getPlayer());
    }
}