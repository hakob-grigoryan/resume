<?php

namespace App\Http\Services\Skill;

use App\Models\User;
use App\Models\Skills;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ImageFlows;
use App\Models\Notification;
use App\Models\Settings;
use App\Models\Posts;
use App\Http\DTO\Skill\CreateSkillDTO;
use App\Http\DTO\Skill\UpdateSkillDTO;
use Illuminate\Support\Facades\Storage;

class SkillService
{
    public function store(CreateSkillDTO $skillDataDTO): bool
    {
        $skill = new Skills();
        $skill->image_name = $skillDataDTO->getImageName();
        $skill->image_path = basename($skillDataDTO->getImagePath());
        $skill->name = $skillDataDTO->getName();
        $skill->description = $skillDataDTO->getDescription();
        $skill->image_full_path = $skillDataDTO->getImagePath();
        $skill->user_id = auth()->id();

        return $skill->save();
    }

    public function update(UpdateSkillDto $updateDto, int $id): bool
    {
         $skill = Skills::query()->where('id', $id)->first();
         $skill->description = $updateDto->getDescription();
         $skill->name = $updateDto->getName();
         if($updateDto->getImageName() !== null && $updateDto->getImagePate() !== null && $updateDto->getImageFullPath() !== null  ){
            $skill->image_name = $updateDto->getImageName();
            $skill->image_path = basename($updateDto->getImagePate());
            $skill->image_full_path = $updateDto->getImageFullPath();
         }

        if($skill->save()){
            return true;
        }else{
            return false;
        }
    }

    public function collectData(int $id, string $imageName, string $imagePath)
    {
        $oldSkill = Skills::query()->where('id', $id)->first();

        if ($oldSkill && Storage::exists($oldSkill->image_full_path)) {
            Storage::delete($oldSkill->image_full_path);
        }

        $skillData['image_name'] = $imageName;
        $skillData['image_path'] = basename($imagePath);
        $skillData['image_full_path'] = $imagePath;

        return $skillData;
    }

    public function delete(int $id): bool
    {
        $skill = Skills::query()->where('id', $id)->first();

        if (Storage::exists($skill->image_full_path)){
           Storage::delete($skill->image_full_path);
        }
        if($skill->delete()){
            return true;
        }else{
            return false;
        }
    }
}

?>
