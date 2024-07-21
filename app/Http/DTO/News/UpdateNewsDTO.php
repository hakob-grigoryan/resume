<?php

namespace App\Http\DTO\News;

class UpdateNewsDTO
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
