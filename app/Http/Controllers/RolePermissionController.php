<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    //liste des permission
    
    public function AssignerRolePermissions()
    {
        $permissions = [
            'modifier.demande',
            'supprimer.demande',
            'soummetre.demande',
            'valider.demande',
            'refuser.demande',
            'voir.demande',
            'suivre.demande',
            'modifier.utilisateur',
            'supprimer.utilisateurs',
            'creer.utilisateurs',
            'voir.utilisateurs',
            'modifier.profile',
            'voir.profile',
            
        ];
        // Création des permissions
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
        // Création et assignation des rôles
        if (!Role::where('name', 'Admin')->exists()) {
            $roleSuperAdmin = Role::create(['name' => 'Admin']);
            $roleSuperAdmin->givePermissionTo(Permission::all());
        }
        if (!Role::where('name', 'Gestionnaire1')->exists()) {
            $roleAdmin = Role::create(['name' => 'Gestionnaire1']);
            $roleAdmin->givePermissionTo([
                'modifier.demande',
                'supprimer.demande',
                'ecrire.demande',
                'modifier.demande',
                'valider.demande',
                'refuser.demande',
                'creer.utilisateurs',
                'voir.utilisateurs'
            ]);
        }
        if (!Role::where('name', 'Utilisateur')->exists()) {
            $roleUser = Role::create(['name' => 'Utilisateur']);
            $roleUser->givePermissionTo(['modifier.profile', 'voir.profile','ecrire.demande','suivre.demande']);
        }

        return response()->json(['message' => 'Rôles et permissions créés avec succès !']);
    }
}
