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

    public function formIndex(): View
    {
        $main = $this->pcodedMainContainer();
        return view('admin/index', [ 'main' => $main ]);
    }

    public function formHtml()
    {
        $variable = ['Email', 'Password', 'Cfpassword', 'Phone'];

        $form = '';
        foreach ($variable as $key => $value) {
            $input = $this->input('text', strtolower($value), strtolower($value), strtolower($value));
            $span = $this->span('error error_'.strtolower($value));

            $formGroup = $this->label('form-label', $this->changeText(strtolower($value))) . $input . $span;

            $form .= $this->div('col-md-6', $this->div('form-group fill', $formGroup ));
        }

        return $this->div('row', $form);
    }

    public function tbodyHtml()
    {
        $users = DB::table('users')->get();

        $tr = '';
        foreach ($users as $key => $user) {
            $tr .= $this->tr( $this->td( ($key+1) ) . $this->td($user->email) . $this->td('Otto') . $this->td('@mdo') );
        }

        return $this->tbody($tr);
    }
}