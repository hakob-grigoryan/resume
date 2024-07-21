<?php

namespace App\Http\DTO\Information;


class UpdateInformationDTO
{
    public function __construct(
        private string $name,
        private string $content
    )
    {}
    public function getName()
    {
        return $this->name;
    }

    public function getContent()
    {
        return $this->content;
    }
}

?>
