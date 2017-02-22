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

    protected $user;
    protected $cart;
    protected $userOrder;

    /**
     * UserProfileService constructor.
     * @param UserRepository $userRepo
     * @param CartRepository $cartRepo
     * @param UserOrderRepository $userOrderRepo
     * @param \App\Services\ImageService $imageService
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
    * @return $this
    */
    public function findUser()
    {
        $this->user = $this->userRepo->findUserById();

        return $this;
    }

    /**
    * @param null
    * @return $user
    */
    public function getUser()
    {
        return $this->user;
    }

    /**
    * @param $user
    * @return $this
    */
    public function findCartByUser($user)
    {
        count($user) ?: $user = $this->user;

        $this->cart = $this->userRepo->forCartNotCheck($user);

        return $this;
    }

    /**
    * @param 
    * @return $cart
    */
    public function getCart()
    {
        return $this->cart;
    }

    /**
    * @param $user, $qty
    * @return $this
    */
    public function findUserOrderByUser($user, $qty=null)
    {
        count($user) ?: $user = $this->user;

        $this->userOrder = $this->userRepo->forUserOrder($user,null, $qty);

        return $this;
    }

     /**
    * @param 
    * @return $userOrder
    */
    public function getUserOrder()
    {
        return $this->userOrder;
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