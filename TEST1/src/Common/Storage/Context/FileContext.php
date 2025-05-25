<?php

namespace App\Common\FileService\Context;

use App\Common\FileService\Strategy\FileStrategyInterface;

class FileContext
{
    private FileStrategyInterface $strategy;

    public function setStrategy(FileStrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function get(string $fileName): ?string
    {
        return $this->strategy->get($fileName);
    }

    public function exists(string $fileName): bool
    {
        return (bool)$this->strategy->get($fileName);
    }

    public function delete(string $fileName): bool
    {
        return (bool)$this->strategy->delete($fileName);
    }
}
