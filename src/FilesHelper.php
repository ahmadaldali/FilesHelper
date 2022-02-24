<?php

namespace AhmadAldali\FilesHelper;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FilesHelper
{

    /**
     * @todo: save the uploaded file in the server
     * and get information about the file
     * 
     */
    public static function fileUpload($file, $folder_name)
    {
        try {
            //no uploaded file
            if (!$file) throw new Exception('No File Found');
            //generate a random name
            $file_name = Str::random(10);
            //get the name/ name of uploaded image
            $origin_name = $file->getClientOriginalName();
            //get the extension
            $ext = strtolower($file->getClientOriginalExtension());
            //generated name + ext
            $full_file_name = $file_name . '.' . $ext;
            //path the folder + generated name + extension
            $full_path = $folder_name . '/' . $full_file_name;
            //save in storage/app/public/folder_name folder
            $file = Storage::put($full_path, File::get($file));
            if (!$file) throw new Exception('Error Saving');
            //get the size file
            $size = Storage::size($full_path);
            //return result
            $data = [
                'file' => $file,
                'origin_name' => $origin_name,
                'full_path' => '/storage/app/public/' . $full_path,
                'extension' => $ext,
                'size' => $size
            ];
            return $data;
        } catch (\Exception $e) {
            Log::info('error upload file/fileUploadTrait: ' . $e->getMessage());
            return null;
        } //catch
    } //fileUpload

}//class
