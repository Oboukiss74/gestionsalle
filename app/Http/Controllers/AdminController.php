<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //profile Admin
    public function AdminProfile()  {
        return view('Utilisateur.admin.profile');

    }
}
