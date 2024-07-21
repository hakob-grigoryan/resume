<?php

namespace App\Http\DTO\Settings;

class CreateSettingsDTO
{
    public function __construct(
        private string|null $tab_1,
        private string|null $tab_2,
        private string|null $tab_3,
        private string|null $tab_4,
        private string|null $facebook,
        private string|null $instagram,
        private string|null $twitter,
        private string|null $linkedin,
        private string|null $map_link,
    )
    {}

    public function getTab1()
    {
        return $this->tab_1;
    }

    public function getTab2()
    {
        return $this->tab_2;
    }

    public function getTab3()
    {
        return $this->tab_3;
    }

    public function getTab4()
    {
        return $this->tab_4;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function getInstagram()
    {
        return $this->instagram;
    }

    public function getTwitter()
    {
        return $this->twitter;
    }

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function getMapLink()
    {
        return $this->map_link;
    }
}

?>
