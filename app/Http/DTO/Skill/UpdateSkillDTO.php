<?php

namespace App\Http\DTO\Skill;

class UpdateSkillDTO
{
    public function __construct(
         private string $description,
         private string $name,
         private null|string $imageName,
         private null|string $imagePate,
         private null|string $imageFullPath,
    )
    {}


    public function getDescription()
    {
        return $this->description;
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
