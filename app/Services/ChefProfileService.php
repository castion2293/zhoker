<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;

use App\Services\ImageService;

class ChefProfileService
{
    protected $user;
    protected $chef;

    /**
     * ChefProfileService constructor.
     * @param UserRepository $userRepo
     * @param ChefRepository $chefRepo
     * @param \App\Services\ImageService $imageService
     */
    public function __construct(UserRepository $userRepo, ChefRepository $chefRepo, ImageService $imageService)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;

        $this->imageService = $imageService;
    }

    /**
     * @return $this
     */
    public function findUser()
    {
        $this->user = $this->userRepo->findUserById();

        return $this;
    }

    /**
     * @return $user
     */
    public function getUser()
    {
        return $this->user;
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
     * @param 
     * @return $chef
     */
    public function getChef()
    {
        return $this->chef;
    }

    /**
     * @param $request
     * @param $id
     * @return \App\Chef
     */
     public function update($request, $id)
     {
        
        $chef = $this->chefRepo->findChefById($id);

        $chef->address = $request->input('address');
        $chef->city = $request->input('city');
        $chef->state = $request->input('state');
        $chef->zip_code = $request->input('zip_code');
        $chef->store_name = $request->input('store_name');
        $chef->store_description = $request->input('store_description');

        if ($request->hasFile('profile_img')) {
            $chef->profile_img = $this->imageService->update($request->file('profile_img'), $chef->profile_img, '/profile_images/');
        }

        $this->chefRepo->save($chef);
        
        return $chef;
     }
}