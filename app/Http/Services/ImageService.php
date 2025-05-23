<?php

namespace App\Http\Services;

use App\Constants\App;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageService
{
    public function sendToFolder(string $module, UploadedFile $image, string $folder = null, string $name = null): ?string
    {
        $module = in_array($module, config("jobnest.modules")) ? $module : App::GLOBAL;
        $folderPath ="assets/$module/custom/images" . ($folder ? '/' . Str::slug($folder, '_') : '');
        $folderPathPublic = public_path($folderPath);

        if (!is_dir($folderPathPublic)) {
            mkdir($folderPathPublic, 0755, true);
        }

        $imageName = ($name ? Str::slug($name) : Str::random(20)) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($folderPathPublic, $imageName);

        return $folderPath . '/' . $imageName;
    }

    public function removeFromFolder(null|string|array $path): void
    {
        if (!!$path) {
            $path = array_values(array_filter(is_array($path) ? $path : [$path]));
            foreach ($path as $pathItem) {
                $pathItem = public_path($pathItem);
                if (file_exists($pathItem)) {
                    unlink($pathItem);
                }
            }
        }
    }
}
