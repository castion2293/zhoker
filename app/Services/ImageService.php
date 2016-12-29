<?php

namespace App\Services;

use App\Jobs\SaveImagetoS3;
use App\Jobs\DeleteImagetoS3;
// use Storage;

class ImageService
{
    /**
     * ImageService constructor.
     */
    public function __construct()
    {
        
    }

    public function save($image, $path, $counter)
    {
        $filename = time() . $counter . '.' . $image->getClientOriginalExtension();
        $filePath = $path . $filename;

        dispatch(new SaveImagetoS3($filePath, $image));

        return 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
    }

    public function update($image, $oldFilename, $path)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $s3 = Storage::disk('s3');
        $filePath = $path . $filename;
        $s3->put($filePath, file_get_contents($image), 'public');

        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');

        $oldpath = substr($oldFilename, $leng);
        $s3->delete($oldpath);

        return 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
    }

    public function delete($Filename)
    {
        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');
        $Filepath = substr($Filename, $leng);

        dispatch(new DeleteImagetoS3($Filepath));
    }
}