<?php

namespace App\Common\FileService\Strategy;

class DiskStrategy implements FileStrategyInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function get(string $fileName): ?string
    {
        return null;
    }
}
