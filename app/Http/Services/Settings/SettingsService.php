<?php

namespace App\Http\Services\Settings;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use App\Http\DTO\Settings\CreateSettingsDTO;
use App\Http\DTO\Settings\UpdateSettingsDTO;


class SettingsService
{
    public function store(CreateSettingsDTO $settingsDataDTO): bool
    {
        $settings = new Settings();
        $settings->tab_1 = $settingsDataDTO->getTab1();
        $settings->tab_2 = $settingsDataDTO->getTab2();
        $settings->tab_3 = $settingsDataDTO->getTab3();
        $settings->tab_4 = $settingsDataDTO->getTab4();
        $settings->facebook = $settingsDataDTO->getFacebook();
        $settings->instagram = $settingsDataDTO->getInstagram();
        $settings->twitter = $settingsDataDTO->getTwitter();
        $settings->linkedin = $settingsDataDTO->getLinkedin();
        $settings->map_link = $settingsDataDTO->getMapLink();
        $settings->save();
        if($settings->save()){
            return true;
        }else{
            return false;
        }
    }

    public function update(UpdateSettingsDTO $updateDataDTO, int $id): bool
    {
        $settings = Settings::find($id);
        $settings->tab_1 = $updateDataDTO->getTab1();
        $settings->tab_2 = $updateDataDTO->getTab2();
        $settings->tab_3 = $updateDataDTO->getTab3();
        $settings->tab_4 = $updateDataDTO->getTab4();
        $settings->facebook = $updateDataDTO->getFacebook();
        $settings->instagram = $updateDataDTO->getInstagram();
        $settings->twitter = $updateDataDTO->getTwitter();
        $settings->linkedin = $updateDataDTO->getLinkedin();
        $settings->map_link = $updateDataDTO->getMapLink();
        $settings->save();
        if($settings->save()){
            return true;
        }else{
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $settings = Settings::find($id);
        if($settings->delete()){
            return true;
        }else{
            return false;
        }
    }

}

?>
