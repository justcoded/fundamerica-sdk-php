<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica\Resources;

class Holding extends Resource
{
    public $id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
