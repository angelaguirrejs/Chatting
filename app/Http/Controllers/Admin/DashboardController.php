<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $registered_users = User::whereHas('roles', function($query) {
            $query->where('name', 'simple');
        })->count();

        return view('admin.dashboard', compact('registered_users'));
    }
}
