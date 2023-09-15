<?php

namespace App\Http\Services;

use Carbon\Carbon;

class ImageUploadService
{


    public function uploadFile($file, $name = null)
    {
        $folder = public_path();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;

        $filePath = '/' . 'uploads' . '/' . $year . '/' . $month . '/' . $day . '/';

        if ($name === null) {
            $fileName = time() . '.' . $file->extension();
        } else {
            $fileName = $name . '.' . $file->extension();
        }

        $file->move($folder . $filePath, $fileName);
        $file = $filePath . $fileName;
        return $file;
    }

    public function removeFile($file)
    {
        $file = ltrim($file, '/');
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
