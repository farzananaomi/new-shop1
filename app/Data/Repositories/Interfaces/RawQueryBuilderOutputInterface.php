<?php

namespace App\Data\Repositories\Interfaces;


interface RawQueryBuilderOutputInterface
{
    public function setEnableRawOutput($e);

    public function getRawOutputEnabled();

}