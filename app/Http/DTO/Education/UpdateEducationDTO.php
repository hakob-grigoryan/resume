<?php

namespace App\Http\DTO\Education;

class UpdateEducationDTO
{
    public function __construct(
        private string $name,
        private string $description,
    )
    {}

    public function getUpdateName()
    {
        return $this->name;
    }

    public function getUpdateDescription()
    {
        return $this->description;
    }
}

?>
