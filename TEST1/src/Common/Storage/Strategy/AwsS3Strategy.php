<?php

namespace App\Common\FileService\Strategy;

use App\Common\FileService\Adapter\AwsS3Adapter;

class AwsS3Strategy implements FileStrategyInterface
{
    public function authorize(): bool
    {
        $adapter = new AwsS3Adapter();

        return $adapter->isAuthorized();
    }

    public function get(string $fileName): ?string
    {
        if (!$this->authorize()) {
            return null;
        }

        $adapter = new AwsS3Adapter();

        try {
            return (string)$adapter->getUrl($fileName);
        } catch (\Exception) {
            return null;
        }
    }
}