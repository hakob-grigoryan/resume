<?php

namespace App\Http\DTO\Notification;

class CreateNotificationDTO
{
    public function __construct(
        private string $name,
        private string $email,
        private string $phone,
        private string $message,
    ) {}

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getMessage()
    {
        return $this->message;
    }
}

?>
