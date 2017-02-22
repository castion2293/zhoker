<?php

namespace App\Repositories;

use App\Image;

class ImageRepository
{
    protected $image;

    /**
     * ImageRepository constructor.
     * @param Image $image
     */
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
        return $this->image->find($id);
     }

    /**
     * @param Image $image
     * @return bool|null
     */
     public function delete(Image $image)
     {
         return $image->delete();
     } 
}