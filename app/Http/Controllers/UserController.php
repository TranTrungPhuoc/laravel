<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class UserController extends Controller
{
    public function index(): View
    {
        $main = $this->pcodedMainContainer();
        return view('admin/index', [ 'main' => $main ]);
    }

    public function tbody()
    {
        $str = '<tbody>';
        $users = DB::table('users')->get();
        $i=0;
        foreach ($users as $user) {
            $i++;
            $str .= '<tr>';
            $str .= '<td>'.$i.'</td>';
            $str .= '<td>'.$user->email.'</td>';
            $str .= '<td>Otto</td>';
            $str .= '<td>@mdo</td>';
            $str .= '</tr>';
        }
        $str .= '</tbody>';
        return $str;
    }
}