<?php

namespace App\Http\DTO\News;

class CreateNewsDTO
{
    public function __construct(
        private string $content
    )
    {}

    public function getContent()
    {
        return $this->content;
    }
}

?>
