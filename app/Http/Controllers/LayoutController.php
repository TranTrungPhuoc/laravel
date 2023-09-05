<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class LayoutController extends Controller
{
    public function index(): View
    {
        return view('index');
    }
}