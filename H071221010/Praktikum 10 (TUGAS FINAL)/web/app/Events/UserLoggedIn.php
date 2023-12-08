<?php

namespace App\Events;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;

class UserLoggedIn
{
    use SerializesModels;

    public $user;

    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }
}
