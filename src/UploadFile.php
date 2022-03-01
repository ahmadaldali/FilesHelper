<?php

namespace AhmadAldali\FilesHelper;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UploadFile extends FilesHelper
{
    /**
     * @todo: save the uploaded file in the server
     * and get information about the file
     * 
     */
    public static function fileUpload($file, $folder_name, $disk=null)
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
            //if the disk is null, the the default disk will be local
            $storage = ($disk == null) ?
                        Storage::disk('local') :
                        Storage::disk($disk);

            //save the file according the disk drive storage
            $file = $storage->put($full_path, File::get($file));
            if (!$file) throw new Exception('Error Saving');
            //get the size file
            $size = $storage->size($full_path);
            //get the file's path with the disk drive storage
            $full_stored_path =  str_replace(base_path(),"" , $storage->path($full_path)); //with disc
            //get the path within public folder in the project
            $web_public_path =  str_replace(base_path().'/public',"" , $storage->url($full_path)); //with disc
            //return the result
            $data = [
                'origin_name' => $origin_name,//origin name of the file
                'full_stored_path' => $full_stored_path, //path within the server
                'web_public_path' => $web_public_path,//path for web when use public storage
                'stored_path' => '/'.$full_path,//path without storage drive
                'extension' => $ext,//extension
                'size' => $size,//file's size
            ];
            return $data;
        } catch (\Exception $e) {
            Log::info('error upload file: ' . $e->getMessage());
            return null;
        } //catch
    } //fileUpload

}//class
