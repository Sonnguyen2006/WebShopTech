<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserManagement extends Controller
{
    public function index(){
        $user = UserModel::all();
        return view("admin.user_management",compact("user"));
        
    }
    
}
