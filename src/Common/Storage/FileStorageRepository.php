<?php

namespace App\Common\FileService;

use App\Common\FileService\Context\FileContext;
use App\Common\FileService\Strategy\AwsS3Strategy;
use App\Common\FileService\Strategy\DiskStrategy;
use App\Domains\Market\Image\ImageTypeEnum;
use Exception;

final readonly class FileStorageRepository
{
    public function __construct(private FileContext $context)
    {
    }

    /**
     * @throws Exception
     */
    public function useStorage($storageType = ImageTypeEnum::UNKNOWN): void
    {
        if ($storageType === ImageTypeEnum::AWS) {
            $this->context->setStrategy(new AwsS3Strategy());
        } elseif ($storageType === ImageTypeEnum::Disk) {
            $this->context->setStrategy(new DiskStrategy());
        } else {
            throw new Exception('Storage type not supported');
        }
    }

    /**
     * Returns image URL or null.
     *
     * @param $fileName
     * @return string|null
     */
    public function getUrl($fileName): ?string
    {
        return $this->context->get($fileName);
    }

    public function fileExists(string $fileName): bool
    {
        return $this->context->exists($fileName);
    }

    /**
     * Deletes a file in the filesystem and throws an exception in case of errors.
     *
     * @param string $fileName
     * @return void
     */
    public function deleteFile(string $fileName): void
    {
    }

    /**
     * Saves a file in the filesystem and throws an exception in case of errors.
     *
     * @param string $fileName
     * @return void
     */
    public function saveFile(string $fileName): void
    {
    }
}
