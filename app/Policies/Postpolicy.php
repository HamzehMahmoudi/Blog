<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class Postpolicy
{
    use HandlesAuthorization;

    public function change(User $user, Post $post){

        return $user->id == $post->user_id;
    }

    public function post(User $user){

        return $user->admin == 1;
    }
}
