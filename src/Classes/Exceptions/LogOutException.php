<?php

namespace App\Classes\Exceptions;


class LogOutException
{
    protected string $details;

    public function __construct(string $details)
    {
        $this->details = $details;
    }
}
