<?php

namespace App\Services\Foundation;

use App\Jobs\SaveImagetoS3;
use App\Jobs\DeleteImagetoS3;
use Storage;
use Image;

trait ImageTrait
{
    /**
     * @param $image
     * @param $path
     * @param $counter
     * @param $action
     * @return string
     */
    public function save($image, $path, $counter, $action)
    {
        $filename = $action . time() . $counter . '.' . $image->getClientOriginalExtension();
        $filePath = $path . $filename;

        $imageFile = $this->streamImage($image, $action);

        dispatch(new SaveImagetoS3($filePath, $imageFile));

        return 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
    }

    /**
     * @param $image
     * @param $oldFilename
     * @param $path
     * @return string
     */
    public function update($image, $oldFilename, $path)
    {
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $filePath = $path . $filename;

        $imageResize = $this->streamImage($image);
        
        Storage::disk('s3')->put($filePath, $imageResize, 'public');
        
        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');

        $oldpath = substr($oldFilename, $leng);
        Storage::disk('s3')->delete($oldpath);

        return 'https://s3-us-west-2.amazonaws.com/zhoker' . $filePath;
    }

    /**
     * @param $Filename
     */
    public function delete($Filename)
    {
        $leng = strlen('https://s3-us-west-2.amazonaws.com/zhoker');
        $Filepath = substr($Filename, $leng);

        dispatch(new DeleteImagetoS3($Filepath));
    }

    /**
     * @param $image
     * @param null $action
     * @return mixed
     */
    protected function streamImage($image, $action = null)
    {
        if ($action == 'resize') {
            return Image::make($image)->fit(1024, 575)
                                 ->stream()
                                 ->__toString();
        }

        return Image::make($image)->stream()
                                 ->__toString();
    }
}