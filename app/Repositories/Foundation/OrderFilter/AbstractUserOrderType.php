<?php

namespace App\Repositories\Foundation\OrderFilter;

use App\Repositories\Foundation\DateTrait;

abstract class AbstractUserOrderType
{
    use DateTrait;

    abstract public function getQueryBuilder($builder);
}