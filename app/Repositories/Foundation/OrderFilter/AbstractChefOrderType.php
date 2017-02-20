<?php

namespace App\Repositories\Foundation\OrderFilter;

use App\Repositories\Foundation\DateTrait;

abstract class AbstractChefOrderType
{
    use DateTrait;

    abstract public function getQueryBuilder($builder);
}