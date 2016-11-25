<?php

namespace App\Services;

use Storage;

class ImageService
{
    /**
     * ImageService constructor.
     */
    public function __construct()
    {
        
    }

    public function save($image)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $s3 = Storage::disk('s3');
        $filePath = '/images/' . $filename;
        $s3->put($filePath, file_get_contents($image), 'public');

        return 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
    }

    public function update($image, $oldFilename)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $s3 = Storage::disk('s3');
        $filePath = '/images/' . $filename;
        $s3->put($filePath, file_get_contents($image), 'public');

        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');

        $oldpath = substr($oldFilename, $leng);
        $s3->delete($oldpath);

        return 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
    }

    public function delete($Filename)
    {
        $s3 = Storage::disk('s3');
        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');
        $Filepath = substr($Filename, $leng);
        $s3->delete($Filepath);
    }
}