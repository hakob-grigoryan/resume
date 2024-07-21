<?php

namespace App\Http\Services\Notification;

use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\Notification\NotificationService;
use App\Http\DTO\Notification\CreateNotificationDTO;

class NotificationService
{
    public int $symbolOne = 1

    public function store(CreateNotificationDTO $notificationDataDTO): bool
    {
        $notification = new Notification();
        $notification->name = $notificationDataDTO->getName();
        $notification->email = $notificationDataDTO->getEmail();
        $notification->phone = $notificationDataDTO->getPhone();
        $notification->message = $notificationDataDTO->getMessage();

        if($notification->save()){
            return true;
        }else{
            return false;
        }
    }

    public function update(int $id): bool
    {
        $notification = Notification::find($id);

        if($notification){
            $notification->status = $this->symbolOne;

            if($notification->save()){
                return true;
            }else{
                return false;
            }
        }
    }
}

?>
