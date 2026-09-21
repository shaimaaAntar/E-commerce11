<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class frontEndController extends Controller
{
    public function home(){
//
//        $role = Role::create(['name' => 'user']);
//        $permission = Permission::create(['name' => 'edit']);
        return view('frontend.index') ;
    }
}
