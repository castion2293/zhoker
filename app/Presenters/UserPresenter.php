<?php

namespace App\Presenters;

class UserPresenter
{
    /**
     * determine user profile picture
     * @param boolean $img
     * @return string
     */
     public function userProfileImg($porfileImg)
     {
         if ($porfileImg)
            return $porfileImg;

         return 'https://s3-us-west-2.amazonaws.com/zhoker/profile_images/default-user-icon-profile.png';
     }

      /**
     * @param $cart
     * @return $image
     */
     public function getMealImage($cart)
     {
        return $cart->meals()->withTrashed()->first()->images->take(1);
     }

      /**
     * @param $cart
     * @return name
     */
     public function getMealName($cart)
     {
         return $cart->meals()->withTrashed()->first()->name;
     }

     /**
     * @param $cart
     * @return price
     */
     public function getMealPrice($cart)
     {
         return $cart->meals()->withTrashed()->first()->price;
     }
}