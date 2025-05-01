<?php

namespace App\Policies;

use App\Models\Demandes;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DemandesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Demandes $demandes): bool
    {
        return $user->hasPermissionTo('voir.demande');
        // return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->haspermissioTo('soummetre.demande', 'fairedemande');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Demandes $demandes): bool
    {
        return $user->hasPermissionTo('modifier.ma.demande');
    }
    public function traiterdemande(User $user, Demandes $demandes): bool
    {
        return $user->hasPermissionTo('modifier.ma.demande');
    }
    //rolle d'approvation
    public function approve(User $user, Demandes $demande): bool
    {
        return $user->hasRole('admin') || $user->hasRole('DEPS') || $user->hasRole('DIP');
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Demandes $demandes): bool
    {
        return $user->permissionTo('supprimer.demande');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Demandes $demandes): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Demandes $demandes): bool
    {
        return false;
    }
}
