<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            abort(403, 'Role tidak ditemukan.');
        }

        return match ($user->role->name) {
            'Admin'    => redirect()->route('dashboard.admin'),
            'Staff'    => redirect()->route('dashboard.staff'),
            'Manager'  => redirect()->route('dashboard.manager'),
            'Employee' => redirect()->route('dashboard.employee'),
            default    => abort(403),
        };
    }
}