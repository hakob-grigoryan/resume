<?php

namespace App\Http\DTO\ImageFlow;


class UpdateImageFlowDTO
{
    public function __construct(
         private string $imageName,
         private string $imagePath,
         private string $imageFullPath
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

    public function getImageFullPath()
    {
        return $this->imageFullPath;
    }

}

?>
