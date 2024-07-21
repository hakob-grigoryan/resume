<?php

namespace App\Http\DTO\Information;


class CreateInformationDTO
{
    public function __construct(
        private string $content,
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
