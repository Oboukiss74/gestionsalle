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
        // dd($user->hasRole('Utilisateur'), $user->roles->pluck('name')->toArray());
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasPermissionTo('voir.demande');
        // return true;
    }
    public function mesdemandes(User $user): bool
    {
        return $user->hasPermissionTo('voir.mesdemande');
        // return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin')||$user->hasRole('Utilisateur');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Demandes $demandes): bool
    {
        return $user->hasPermissionTo('valider.demande') || $user->hasPermissionTo('refuser.demande');
    }
    public function traiterdemande(User $user, Demandes $demandes): bool
    {
        return $user->hasPermissionTo('modifier.ma.demande');
    }
    //rolle d'approvation
    public function approuve(User $user): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('DEPS') || $user->hasRole('DIP');
    }
    public function voirdemande(User $user, Demandes $demande): bool
    {
        return $user->hasRole(['SG']);
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny(User $user): bool
    {

        return $user->hasPermissionTo('supprimer.demande') ;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Demandes $demandes): bool
    {
        return false;
    }
    public function voirmesdemandes(User $user): bool
    {
        return $user->hasPermissionTo('voir.demande');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Demandes $demandes): bool
    {
        return false;
    }
}
