# Files Helper 
## _Make dealing with Files easier_

Files Helper is a package that allows you to deal with files easier.
It will contain some methods like:
- Upload a new file (image, video, txt, pdf, etc ..)  /  _COMPLETED_.
- Upload a new file (image, video, txt, pdf, etc ..) with determining the driver storage /  _COMPLETED_.
- Remove a file.


_Any Suggestion?_

## Installation
Install the package in your application.

```sh
cd your_project
composer require ahmadaldali/helper-files
```

## Usage

- Upload File (Testing with local and public drivers) .\
  You can upload your file, by passing it with the stored folder name, and the disc.\
  The disk or the storage driver is optional and the default driver is "local".

```sh
use AhmadAldali\FilesHelper\UploadFile;

$response =  UploadFile::fileUpload($your_file,'folder_name');
OR
$response =  UploadFile::fileUpload($your_file,'folder_name', $disk);
```

## Notes
1. The file will be stored in your_folder inside determined storage driver.
2. If you would use public disc, don't forget to create symolink with public folder.
3. full_stored_path = storage driver (disk) + stored_path.
4. if it is uploaded successfully, you can see the result as follows, any failure happens you will get a null response.

```sh
{
    "origin_name": "xxxx.ext",
    "full_stored_path": "the full stored path inside the storage folder", 
    "web_public_path": "path inside the public when create symlink",
    "stored_path": "path of the file and containg folder inside the disk",
    "extension": "txt | pdf | png | etc .. ",
    "size": in Bytes
}
```

Ex:
```sh
$response = UploadFile::fileUpload($request->file,'ahmad_folder','public');
{
    "origin_name": "Screenshot from 2022-02-23 22-13-11.png",
    "full_stored_path": "/storage/app/public/ahmad_folder/pax6QLXLp5.png",
    "web_public_path": "/myfiles/ahmad_folder/pax6QLXLp5.png",
    "stored_path": "/ahmad_folder/pax6QLXLp5.png",
    "extension": "png",
    "size": 239276
}
```


## License

MIT

