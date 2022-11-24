<?php

namespace App\Policies;

use App\Models\Clothes;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClothesPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user, Clothes $clothes)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->name != 'user';
    }


    public function update(User $user, Clothes $clothes)
    {
        return ($user->role->name != 'user') ;
    }


    public function delete(User $user, Clothes $clothes)
    {
       return  ($user->role->name != 'user');
    }


    public function restore(User $user, Clothes $clothes)
    {
        //
    }


    public function forceDelete(User $user, Clothes $clothes)
    {
        //
    }
}
