<?php

namespace App\Http\DTO\ImageFlow;


class CreateImageFlowDTO
{
    public function __construct(
         private string $imageName,
         private string $imagePath,
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


}

?>
