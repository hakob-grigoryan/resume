<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
use App\Models\ImageFlows;
use App\Models\Settings;
use App\Http\Requests\Notification\NotificationRequest;
use App\Http\Services\Notification\NotificationService;
use App\Http\DTO\Notification\CreateNotificationDTO;

class UserController extends Controller
{
    public function __construct(protected NotificationService $notificationService){}

    public function index()
    {
        $userInfo = User::query()->where('id', auth()->id())->first();
        $userInfo->load(['posts','educations','skills','information','news',]);
        $myImg = ImageFlows::query()->first();
        $settings = Settings::query()->first();

        return view('index', compact('userInfo','myImg','settings'));
    }

    public function store(NotificationRequest $request)
    {
        $notificationDataDTO = new CreateNotificationDTO(
            $request->name,
            $request->email,
            $request->phone,
            $request->message
        );
        $notification = $this->notificationService->store($notificationDataDTO);

        if($notification){
            return redirect()->back();
        }else{
            return abort(404);
        }
    }


    public function updateStatus(Request $request)
    {
         $notificationStatus = $this->notificationService->update($request->id);

         if($notificationStatus){
            return redirect()->back();
         }else{
            return abort(404);
         }
    }
}

