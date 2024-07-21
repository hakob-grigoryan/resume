<?php

namespace App\Http\Services\Education;
use App\Models\Education;
use Illuminate\Support\Facades\Storage;
use App\Http\DTO\Education\CreateEducationDTO;
use App\Http\DTO\Education\UpdateEducationDTO;


class EducationService
{
    public function store(CreateEducationDTO $educationDataDTO): bool
    {
        $ed = new Education();
        $ed->name = $educationDataDTO->getName();
        $ed->description = $educationDataDTO->getDescription();
        $ed->user_id = auth()->id();
        $ed->save();
        if($ed->save()){
            return true;
        }else{
            return false;
        }
    }

    public function update(UpdateEducationDTO $updateDataDTO, int $id): bool
    {
        $education = Education::find($id);
        $education->name = $updateDataDTO->getUpdateName();
        $education->description = $updateDataDTO->getUpdateDescription();
        $education->save();
        if($education->save()){
            return true;
        }else{
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $education = Education::query()->where('id', $id)->first();
            if (Storage::exists($education->name && $education->description)){
               Storage::delete($education->name && $education->description);
            }
            if($education->delete()){
                return true;
            }else{
                return false;
            }
    }






}

?>
