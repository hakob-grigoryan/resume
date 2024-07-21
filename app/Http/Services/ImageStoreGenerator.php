<?php

namespace App\Http\Services;

class ImageStoreGenerator
{
    public function imageStore($image)
    {
        return $image->store('public/assets/images');
    }

    public function createOriginalName($image)
    {
        return  $image->getClientOriginalName();
    }
}

?>
