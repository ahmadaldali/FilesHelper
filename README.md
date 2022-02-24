# Files Helper 
## _Make dealing with Files easier_

Files Helper is a package that allow you to deal with files easiler.
It will contains some methods like:
- Upload a new file (image, video, txt, pdf, etc ..)  /  _COMPLETED_.
- Upload a new file (image, video, txt, pdf, etc ..) with determine the driver storage.
- Remove a file.


_Any Suggestion?_

## Installation
Install the package in your application.

```sh
cd your_project
composer require ahmadaldali/helper-files
```

## Usage

- Upload File.\
  You can upload your file, by passing it with the stored folder name.
```sh
use AhmadAldali\FilesHelper\FilesHelper;
$response =  FilesHelper::fileUpload($your_file,'folder_name');
```

## Notes
1. The fill will be stored in your_folder inside the storage/app/public
2. if it is uploaded successfully, you can the result as following, any failure happens you will get null response.
```sh
{
    "file": bool,
    "origin_name": "xxxx.ext",
    "full_path": "the full stored path with a file's random name",
    "extension": "txt | pdf | png | etc .. ",
    "size": in Bytes
}
```


## License

MIT

