<?php
namespace App\Traits\web;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
trait file_storage
{
    function file_storage($file, $get_derctoriy)
    {
        if ($file) {
            //create name
            $time = Carbon::now();
            $derctoriy = '/' . $get_derctoriy . '/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
            $file_name_f = date_format($time, 'h') . date_format($time, 's') . rand(1, 9) . '.' . $file->extension();
            Storage::disk('public')->putFileAs($derctoriy, $file, $file_name_f);
            $file_path = 'attachments/' . $derctoriy . '/' . $file_name_f;
        } else {
            $file_path = null;
        }
        return $file_path;
    }
}

?>