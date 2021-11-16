<?php

declare(strict_types=1);

namespace Mcbeany\BetterMinion\sessions;

class Session
{
    private bool $removeMode = false;
    private int $minionCount;
    public function isInRemoveMode(): bool
    {
        return $this->removeMode;
    }
    public function toggleRemoveMode(): bool
    {
        $this->removeMode = !$this->removeMode;
        return $this->isInRemoveMode();
    }
    public function getMinionCount(): int
    {
        return $this->minionCount;
    }
    public function setMinionCount(int $count): void
    {
        $this->minionCount = $count;
    }
}