<?php 
namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper
{
    /**
     * @param $filename
     * @param $foldername
     * @return string
     */
    public static function imageUpload($filename, $foldername): string
    {
        $extension = $filename->extension();
        $originalImageName = $filename->getClientOriginalName();
        $imageName = explode('.'.$extension, $originalImageName);
        $image_slugged = Str::slug($imageName[0]);
        $isFileExist = Storage::exists($foldername.'/'.$image_slugged.'.'.$extension);
        if ($isFileExist) {
            $imagePath = $filename->storeAs($foldername, $image_slugged.'-'.Str::random(5).'.'.$extension);
        } else {
            $imagePath = $filename->storeAs($foldername, $image_slugged.'.'.$extension);
        }
        return $imagePath;
    }
 }