<?php

namespace App\Policies;

use App\Produtos;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdutosPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Produtos  $produtos
     * @return mixed
     */
    public function view(User $user, Produtos $produtos)
    {
        return true;
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
     * @param  \App\Produtos  $produtos
     * @return mixed
     */
    public function update(User $user, Produtos $produtos)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Produtos  $produtos
     * @return mixed
     */
    public function delete(User $user, Produtos $produtos)
    {
        return $user->adm;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Produtos  $produtos
     * @return mixed
     */
    public function restore(User $user, Produtos $produtos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Produtos  $produtos
     * @return mixed
     */
    public function forceDelete(User $user, Produtos $produtos)
    {
        //
    }
}
