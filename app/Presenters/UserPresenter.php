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
}