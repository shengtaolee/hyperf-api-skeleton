<?php

declare(strict_types=1);

/**
 * UserRegistered.php
 * Create by phpstorm
 * Author: santo
 * Date: 2021-07-27
 */

namespace App\Event;


class UserRegistered
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}