<?php

namespace App\Http\Services\Post;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ImageFlows;
use App\Models\Notification;
use App\Models\Settings;
use App\Models\Posts;
use Illuminate\Support\Facades\Storage;
use App\Http\DTO\Post\CreatePostDTO;
use App\Http\DTO\Post\UpdatePostDTO;


class PostService
{
    public function store(CreatePostDTO $postDataDTO): bool
    {
    $post = new Posts();
      $post->image_name = $postDataDTO->getImageName();
      $post->image_pate = basename($postDataDTO->getImagePath());
      $post->links = $postDataDTO->getLinks();
      $post->name = $postDataDTO->getName();
      $post->image_full_path = $postDataDTO->getImagePath();
      $post->user_id = auth()->id();
      $post->save();
      if($post->save()){
          return true;
      }else{
          return false;
      }
    }

    public function update(UpdatePostDto $updateDto, int $id): bool
    {
       $post =  Posts::query()->where('id', $id)->first();
       $post->links = $updateDto->getLinks();
       $post->name = $updateDto->getName();
       if($updateDto->getImageName() !== null && $updateDto->getImagePate() !== null && $updateDto->getImageFullPath() !== null  ){
           $post->image_name = $updateDto->getImageName();
           $post->image_pate = basename($updateDto->getImagePate());
           $post->image_full_path = $updateDto->getImageFullPath();
       }

       if($post->save()){
            return true;
       }else{
            return false;
       }
    }

    public function collectData(int $id, string $imageName, string $imagePath)
    {
        $oldPost = Posts::query()->where('id', $id)->first();

      if ($oldPost && Storage::exists($oldPost->image_full_path))
      {
        Storage::delete($oldPost->image_full_path);
      }
        $postData['image_name'] = $imageName;
        $postData['image_pate'] = basename($imagePath);
        $postData['image_full_path'] = $imagePath;

        return $postData;
    }

    public function delete(int $id): bool
    {
        $post = Posts::query()->where('id', $id)->first();

        if (Storage::exists($post->image_full_path)){
           Storage::delete($post->image_full_path);
        }
        if($post->delete()){
            return true;
        }else{
            return false;
        }
    }

}

?>
