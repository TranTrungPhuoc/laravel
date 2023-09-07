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

    public function formView(): View
    {
        $main = $this->pcodedMainContainer();
        return view('admin/index', [ 'main' => $main ]);
    }

    public function formPrivate()
    {
        $variable = ['Email', 'Password', 'Confirm Password', 'Phone'];

        $form = '';
        foreach ($variable as $key => $value) {
            print_r($value);
            $form .= $this->div('col-md-6', $this->div('form-group fill'));
        }

        return $this->div('row', $form);
    }

    public function tbodyPrivate()
    {
        $users = DB::table('users')->get();

        $tr = '';
        foreach ($users as $key => $user) {
            $tr .= $this->tr( $this->td( ($key+1) ) . $this->td($user->email) . $this->td('Otto') . $this->td('@mdo') );
        }

        return $this->tbody($tr);
    }
}