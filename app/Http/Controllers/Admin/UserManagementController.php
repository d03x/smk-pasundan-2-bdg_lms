<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(){
        return inertia('admin/user-management/index');
    }
    public function siswa(){
        $user = User::whereHas('siswa')->paginate(5);
        return inertia('admin/user-management/siswa', ['users'=>$user]);
    }
}
