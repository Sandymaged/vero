<?php

namespace App\Policies;

use App\Model\Admin;
use App\Models\Merchant;
use App\Models\MerchantUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class MerchantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Admin|MerchantUser $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Admin|MerchantUser $user
     * @param \App\Models\User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Merchant $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param Admin|MerchantUser $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Admin|MerchantUser $user
     * @param \App\Models\User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Merchant $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Admin|MerchantUser $user
     * @param \App\Models\User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Merchant $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param Admin|MerchantUser $user
     * @param \App\Models\User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Merchant $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Admin|MerchantUser $user
     * @param \App\Models\User $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Merchant $model)
    {
        //
    }
}
