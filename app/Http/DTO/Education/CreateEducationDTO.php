<?php

namespace App\Http\DTO\Education;

class CreateEducationDTO
{
    public function __construct(
        private string $name,
        private string $description,
    )
    {}

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
