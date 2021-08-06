<?php

declare(strict_types=1);

namespace FundAmerica\Resources;

class BackgroundCheck extends Resource
{
    public $id;
    public $cleared;
    public $identity_check;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
