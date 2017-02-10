<?php

namespace App\Presenters;

class ChefPresenter
{
    /**
     * determine chef profile picture
     * @param boolean $img
     * @return string
     */
     public function chefProfileImg($porfileImg)
     {
         if ($porfileImg)
            return $porfileImg;

         return 'https://s3-us-west-2.amazonaws.com/zhoker/profile_images/default-user-icon-profile.png';
     }

      /**
     * determine store name
     * @param boolean $storeName
     * @return string
     */
     public function chefStoreName($storeName)
     {
         if (count($storeName))
            return $storeName;
        
         return 'Your store Name';
     }

      /**
     * determine store description
     * @param boolean $storeDes
     * @return string
     */
     public function chefStoreDes($storeDes)
     {
         if (count($storeDes))
            return $storeDes;

         return 'Nobu San Diego, launched in November 2007, is yet another canvas for Chef Nobu Matsuhisa to display his legendary dishes, such as Black Cod with Miso and Yellowtail Jalapeno. The restaurant which is nestled in the perennially hip and centrally located Hard Rock Hotel also features          unique creations by Executive Chef David Meade who has honed his skills in Nobu Miami and New York. Nobu San Diego delivers equally on food, impeccable service and ambiance that is sophisticated yet lively. The Rockwell Group designed space is full of elements like the onyx sushi           bar        and the fish basket pendant lights which are evocative of its sister properties.
                Conveniently located across from the Convention Center, Nobu San Diego is open for dinner nightly at the sushi bar or dining room and for drinks at the bar lounge. A private dining room is available to accommodate private parties for a sit-down dinner or a cocktail reception.';
     }
}