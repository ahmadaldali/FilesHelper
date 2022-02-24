<?php

namespace AhmadAldali\FilesHelper;

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
    public function fileUpload($file, $folder_name)
    {
        try {
            //generate a random name
            $file_name = Str::random(10);
            //get the extension
            $ext = strtolower($file->getClientOriginalExtension());
            //generated name + ext
            $full_file_name = $file_name . '.' . $ext;
            //path the folder + generated name + extension
            $full_path = $folder_name . '/' . $full_file_name;
            //save in app/storage/public/folder_name folder
            $file = Storage::disk('public')->put($full_path, File::get($file));
            //get the size file
            $size = Storage::disk('public')->size($full_path);
            //get the name/ name of uploaded image
            $origin_name = $file->getClientOriginalName();
            //return result
            $data = [
                'status' => true,
                'file' => $file,
                'origin_name' => $origin_name,
                'full_path' => 'storage/app/public/' . $full_path,
                'extension' => $ext,
                'size' => $size
            ];
            return $data;
        } catch (\Exception $e) {
            Log::info('error upload file/fileUploadTrait: ' . $e->getMessage());
            return null;
        } //catch

    } //method

}//class
