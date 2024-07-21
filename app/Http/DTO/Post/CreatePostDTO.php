<?php

namespace App\Http\DTO\Post;

class CreatePostDTO
{
    public function __construct(
         private string $imageName,
         private string $imagePath,
         private string $links,
         private string $name,
    )
    {}

    public function getImageName()
    {
        return $this->imageName;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function getName()
    {
        return $this->name;
    }
}

?>
