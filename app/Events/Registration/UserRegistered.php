<?php namespace App\Events\Registration;

use App\Events\Event;
use App\User;

class UserRegistered extends Event
{

    /**
     * @var User
     */
    public  $user;

    /**
     * UserRegistered constructor.
     * @param User $user
     */
    public function __construct(User $user  )
    {
        //
        $this->user  = $user;
    }

}
