<?php

namespace App\Http\Services\Information;
use App\Models\Information;
use Illuminate\Support\Facades\Storage;
use App\Http\DTO\Information\CreateInformationDTO;
use App\Http\DTO\Information\UpdateInformationDTO;


class InformationService
{
    public function store(CreateInformationDTO $infoDataDTO): bool
    {
        $info = new Information();
        $info->name = $infoDataDTO->getName();
        $info->content =$infoDataDTO->getContent();
        $info->user_id = auth()->id();
        $info->save();
        if($info->save()){
            return true;
        }else{
            return false;
        }
    }

     public function update(UpdateInformationDTO $updateDataDTO, int $id): bool
     {
        $info = Information::find($id);
        $info->name = $updateDataDTO->getName();
        $info->content =$updateDataDTO->getContent();
        $info->save();
        if($info->save()){
            return true;
        }else{
            return false;
        }
     }

     public function delete(int $id): bool
     {
         $info = Information::query()->where('id', $id)->first();
             if (Storage::exists($info->name && $info->content)){
                Storage::delete($info->name && $info->content);
             }
             if($info->delete()){
                 return true;
             }else{
                 return false;
             }
     }

}

?>
