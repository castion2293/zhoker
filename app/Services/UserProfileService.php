<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CartRepository;
use App\Repositories\UserOrderRepository;

use App\Services\ImageService;

class UserProfileService
{
    protected $userRepo;
    protected $cartRepo;
    protected $userOrderRepo;

    protected $imageService;

    /**
     * ChefService constructor.
     */
    public function __construct(UserRepository $userRepo, CartRepository $cartRepo, UserOrderRepository $userOrderRepo, ImageService $imageService)
    {
        $this->userRepo = $userRepo;
        $this->cartRepo = $cartRepo;
        $this->userOrderRepo = $userOrderRepo;

        $this->imageService = $imageService;
    }

    /**
    * @param null
    * @return user
    */
    public function indexUser($id = null)
    {
        return $this->userRepo->findUserById($id);
    }

    /**
    * @param $user
    * @return cart
    */
    public function indexCart($user)
    {
        return $this->userRepo->forCartNotCheck($user);
    }

    /**
    * @param $user, $seq
    * @return userorder
    */
    public function indexUserOrder($user, $seq, $qty=null)
    {
        return $this->userRepo->forUserOrder($user, $seq, $qty);
    }

    /**
    * @param $user, $request
    * @return null
    */
    public function update($user, $request)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        
        if ($request->hasFile('user_profile_img')) {
            $user->user_profile_img = $this->imageService->update($request->user_profile_img, $user->user_profile_img, '/profile_images/');
        }

        $this->userRepo->save($user);
    }

    /**
    * @param $user, $request
    * @return boolean
    */
    public function resetPassword($user, $request)
    {
        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            return $user->save();
        } else {
            return false;
        }
    }
}