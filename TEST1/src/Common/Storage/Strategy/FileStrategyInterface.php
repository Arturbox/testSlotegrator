<?php

namespace App\Common\FileService\Strategy;

interface FileStrategyInterface
{
    public function authorize(): bool;
    
    public function get(string $fileName): ?string;
    
}
