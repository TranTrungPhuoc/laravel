<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class DashboardController extends Controller
{
    public function index(): View
    {
        $main = 'Dashboard';

        return view('admin/index', ['main' => $main]);
    }
}