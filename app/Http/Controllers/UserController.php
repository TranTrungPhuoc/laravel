<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class UserController extends Controller
{
    public function index(): View
    {
        // $users = DB::table('users')->get();

        // foreach ($users as $user) {
        //     echo $user->email;
        // }

        $main = 'User';

        return view('admin/index', [
            'main' => $main
            // 'main' => User::findOrFail($id)
        ]);
    }
}