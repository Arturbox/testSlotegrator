<?php

namespace App\Domains\Market\Image;

class Image
{
    
    private string $name;
    private ImageTypeEnum $type;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): ImageTypeEnum
    {
        return $this->type;
    }

    public function setType(ImageTypeEnum $type): void
    {
        $this->type = $type;
    }
}