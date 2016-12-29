<?php

namespace App\Repositories;

use App\Image;

class ImageRepository
{
    protected $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * @param $id
     * @return image
     */
     public function findImageById($id)
     {
        return $this->image->findOrFail($id);
     }

    /**
     * @param $image
     * @return 
     */
     public function delete(Image $image)
     {
         return $image->delete();
     } 
}