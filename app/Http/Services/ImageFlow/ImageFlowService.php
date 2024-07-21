<?php

namespace App\Http\Services\ImageFlow;
use App\Models\ImageFlows;
use App\Http\DTO\ImageFlow\CreateImageFlowDTO;
use App\Http\DTO\ImageFlow\UpdateImageFlowDTO;
use Illuminate\Support\Facades\Storage;


class ImageFlowService
{
    public function store(CreateImageFlowDTO $imageFlowDataDTO): bool
    {
        $img = new ImageFlows();
        $img->image_name = $imageFlowDataDTO->getImageName();
        $img->image_path = basename($imageFlowDataDTO->getImagePath());
        $img->image_full_path = $imageFlowDataDTO->getImagePath();
        $img->save();

        if($img->save()){
            return true;
        }else{
            return false;
        }

    }

    public function update(UpdateImageFlowDTO $updateDataDTO, int $id): bool
    {
         $img = ImageFlows::query()->where('id', $id)->first();
         $img->image_name = $updateDataDTO->getImageName();
         $img->image_path = basename($updateDataDTO->getImagePath());
         $img->image_full_path = $updateDataDTO->getImageFullPath();
         $img->save();

        if($img->save()){
            return true;
        }else{
            return false;
        }
    }


    public function delete(int $id): bool
    {
        $img = ImageFlows::query()->where('id', $id)->first();

        if(Storage::exists($img->image_full_path)){
          Storage::delete($img->image_full_path);
        }

        if($img->delete()){
            return true;
        }else{
            return false;
        }


    }

}

?>
