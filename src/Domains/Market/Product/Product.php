<?php

namespace App\Domains\Market\Product;

use App\Common\FileService\FileStorageRepository;
use App\Domains\Market\Image\Image;

class Product
{
    private FileStorageRepository $storage;
    public int $id;
    public string $name;
    private string $description;
    private Category $category;
    /**
     * @var array<Image>
     */
    private array $images;
    private string $imageFileName;

    /**
     * @param FileStorageRepository $fileStorageRepository
     */
    public function __construct(FileStorageRepository $fileStorageRepository)
    {
        $this->storage = $fileStorageRepository;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImageFileName(): string
    {
        return $this->imageFileName;
    }

    public function setImageFileName(string $imageFileName): void
    {
        $this->imageFileName = $imageFileName;
    }

    /**
     * Returns whether image was successfully updated or not.
     *
     * @return bool
     */
    public function updateImage(): bool
    {
        /*...*/
        try {
            if ($this->storage->fileExists($this->imageFileName) !== true) {
                $this->storage->deleteFile($this->imageFileName);
            }
            $this->storage->saveFile($this->imageFileName);
        } catch (\Exception $exception) {
            /*...*/
            return false;
        }
        /*...*/
        return true;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }
}