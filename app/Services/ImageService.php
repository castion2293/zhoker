<?php

namespace App\Services;

use App\Services\Foundation\ImageTrait;

use App\Repositories\ChefRepository;
use App\Repositories\ImageRepository;

class ImageService
{
    use ImageTrait;

    protected $chefRepo;
    protected $imageRepo;

    protected $chef;
    protected $images;

    /**
     * ImageService constructor.
     * @param ChefRepository $chefRepo
     * @param ImageRepository $imageRepo
     */
    public function __construct(ChefRepository $chefRepo, ImageRepository $imageRepo)
    {
        $this->chefRepo = $chefRepo;
        $this->imageRepo = $imageRepo;
    }

    /**
     * @param $id
     * @return $this
     */
    public function findChef($id)
    {
        $this->chef = $this->chefRepo->findChefById($id);

        return $this;
    }

    /**
     * @return mixed
     */
     public function getChef()
     {
         return $this->chef;
     }

    /**
     * $id
     * @return $this
     */     
    public function findImageById($id)
    {
        $this->images = $this->imageRepo->findImageById($id);

        return $this;
    }

    /**
     * @param $chef
     * @param null $qty
     * @return $this
     */
     public function findImageByChef($chef, $qty = null)
     {
         if (count($qty))
            $this->images = $this->chefRepo->forImagesPaginate($chef, $qty);
         else
            $this->images = $this->chefRepo->forImages($chef);

         return $this;
     }

    /**
     * @return mixed
     */
     public function getImage()
     {
         return $this->images;
     }

    /**
     * @param $request
     */
    public function uploadImage($request)
    {
        $files =$request->file('file');

        $count = 0;//counter
        foreach($files as $file) {

            $image_path = $this->save($file, '/images/', $count, 'resize'); //resize imgage
            $ori_image_path = $this->save($file, '/images/', $count, 'original'); //original imgage
           
            $this->chef->images()->create([
                'image_path' => $image_path,
                'ori_image_path' => $ori_image_path,
            ]);

            $count++;
        }
    }

    /**
     * @param $images_id
     */
    public function deleteImage($images_id)
    {
        foreach($images_id as $id)
        {
            $image = $this->imageRepo->findImageById($id);
            $this->delete($image->image_path);
            $this->delete($image->ori_image_path);

            $this->imageRepo->delete($image);
        }
    }
}