<?php

namespace App\Policies;

use App\Categorias;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorias  $categorias
     * @return mixed
     */
    public function view(User $user, Categorias $categorias)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorias  $categorias
     * @return mixed
     */
    public function update(User $user, Categorias $categorias)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorias  $categorias
     * @return mixed
     */
    public function delete(User $user, Categorias $categorias)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorias  $categorias
     * @return mixed
     */
    public function restore(User $user, Categorias $categorias)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorias  $categorias
     * @return mixed
     */
    public function forceDelete(User $user, Categorias $categorias)
    {
        //
    }
}
