<?php

namespace App\Domains\Market\Image;

enum ImageTypeEnum: string
{
    case AWS = 'aws';
    
    case Disk = 'disk';
    case UNKNOWN = 'unknown';
}
