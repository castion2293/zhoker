<?php

namespace App\Presenters\Lang;

class LangPresenter_en implements LangPresenterInterface
{
    public function desktop()
    {
        return [
            'index' => [
                'title1' => 'Eating',
                'title2' => 'Tasty and Fresh',
                'order' => 'Order Now',
            ],
            
        ];
    }
}