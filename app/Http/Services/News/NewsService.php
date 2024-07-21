<?php

namespace App\Http\Services\News;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use App\Http\DTO\News\CreateNewsDTO;
use App\Http\DTO\News\UpdateNewsDTO;



class NewsService
{
    public function store(CreateNewsDTO $newsDataDTO): bool
    {
        $news = new News();
        $news->content = $newsDataDTO->getContent();
        $news->user_id = auth()->id();
        $news->save();
        if($news->save()){
            return true;
        }else{
            return false;
        }
    }

    public function update(UpdateNewsDTO $updateDataDTO, int $id): bool
    {
          $news = News::find($id);
          $news->content = $updateDataDTO->getContent();
          $news->save();
        if($news->save()){
            return true;
        }else{
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $news = News::query()->where('id', $id)->first();
            if (Storage::exists($news->content)){
               Storage::delete($news->content);
            }
            if($news->delete()){
                return true;
            }else{
                return false;
            }
    }

}

?>
