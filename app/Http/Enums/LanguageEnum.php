<?php

namespace App\Http\Enums;

enum LanguageEnum: string
{
    case ARMENIAN = 'Armenian';
    case ENGLISH = 'English';
    case RUSSIAN = 'Russian';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}


?>
