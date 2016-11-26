<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ChefRepository;

use App\Services\ImageService;

class ChefProfileService
{
    /**
     * ChefService constructor.
     */
    public function __construct(UserRepository $userRepo, ChefRepository $chefRepo, ImageService $imageService)
    {
        $this->userRepo = $userRepo;
        $this->chefRepo = $chefRepo;

        $this->imageService = $imageService;
    }

    /**
     * @return chef_id
     */
    public function index()
    {
        return $this->userRepo->getChef_id();
    }

    /**
     * @param $id
     * @return chef
     */
    public function edit($id)
    {
        return $this->chefRepo->findChefById($id);
    }

    /**
     * @param $request, $id
     * @return chef
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