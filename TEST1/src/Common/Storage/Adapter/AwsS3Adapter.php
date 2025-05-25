<?php

namespace App\Common\FileService\Adapter;

use AwsS3\AwsUrlInterface;
use AwsS3\Client\AwsStorageInterface;
use Exception;

class AwsS3Adapter implements AwsStorageInterface
{
    public function isAuthorized(): bool
    {
        return true;
    }

    public function getUrl(string $fileName): AwsUrlInterface
    {
        try {
            return new class implements AwsUrlInterface {
                public function __toString(): string
                {
                    return 'https://example.com/file.jpg';
                }
            };
        } catch (Exception) {
            throw new Exception('Error getting file url');
        }
    }
}