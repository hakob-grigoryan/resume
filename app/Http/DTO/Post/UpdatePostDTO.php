<?php

namespace App\Http\DTO\Post;

class UpdatePostDTO
{
    public function __construct(
         private string $links,
         private string $name,
         private null|string $imageName,
         private null|string $imagePate,
         private null|string $imageFullPath,
    )
    {}

    public function getLinks()
    {
        return $this->links;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function getImagePate(): ?string
    {
        return $this->imagePate;
    }

    public function getImageFullPath(): ?string
    {
        return $this->imageFullPath;
    }

}

?>
