<?php

namespace App\Http\Services;

use App\Helpers\Constants;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageService
{
    public function sendToFolder(string $module, UploadedFile $image, string $folder = null, string $name = null): ?string
    {
        $module = in_array($module, config("jobnest.modules")) ? $module : Constants::GLOBAL;
        $folderPath ="assets/$module/custom/images" . ($folder ? '/' . Str::slug($folder, '_') : '');
        $folderPathPublic = public_path($folderPath);

        if (!is_dir($folderPathPublic)) {
            mkdir($folderPathPublic, 0755, true);
        }

        $imageName = ($name ? Str::slug($name) : Str::random(20)) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($folderPathPublic, $imageName);

        return $folderPath . '/' . $imageName;
    }
}
