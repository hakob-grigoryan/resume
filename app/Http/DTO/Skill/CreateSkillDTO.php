<?php

namespace App\Http\DTO\Skill;

class CreateSkillDTO
{
    public function __construct(
         private string $imageName,
         private string $imagePath,
         private string $name,
         private string $description,
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

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
}

?>
