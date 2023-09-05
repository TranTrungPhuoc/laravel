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

    public function card(): View
    {
        $str = '<div class="card">';
        $str .= $this->cardHeader();
        $str .= $this->cardBody();
        $str .= '</div>';
        return $str;
    }

    public function cardHeader(): View
    {
        $str = '<div class="card-header">';
        $str .= '<h5>Basic Table</h5>';
        $str .= '<span class="d-block m-t-5">use class <code>table</code> inside table element</span>';
        $str .= '</div>';
        return $str;
    }

    public function thead(): View
    {
        $str = '<thead>';
        $str .= '<tr>';
        $str .= '<th>#</th>';
        $str .= '<th>First Name</th>';
        $str .= '<th>Last Name</th>';
        $str .= '<th>Username</th>';
        $str .= '</tr>';
        $str .= '</thead>';
        return $str;
    }

    public function tbody(): View
    {
        $str = '<tbody>';
        $users = DB::table('users')->get();
        $i=0;
        foreach ($users as $user) {
            $i++;
            $str .= '<tr>';
            $str .= '<td>'+ $i +'</td>';
            $str .= '<td>'+ $user->email +'</td>';
            $str .= '<td>Otto</td>';
            $str .= '<td>@mdo</td>';
            $str .= '</tr>';
        }
        $str .= '</tbody>';
        return $str;
    }

    public function cardBody(): View
    {
        $str = '<div class="card-body table-border-style">';
        $str .= '<div class="table-responsive">';
        $str .= '<table class="table">';
        $str .= $this->thead();
        $str .= $this->tbody();
        $str .= '</table></div></div>';
        return $str;
    }

    public function pageHeader() : View
    {
        $str = '<div class="page-header">';
        $str .= '<div class="page-block">';
        $str .= '<div class="row align-items-center">';
        $str .= '<div class="col-md-12">';
        $str .= '<div class="page-header-title">';
        $str .= '<h5 class="m-b-10">Bootstrap Basic Tables</h5></div>';
        $str .= '<ul class="breadcrumb">';
        $str .= '<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>';
        $str .= '<li class="breadcrumb-item"><a href="#!">Bootstrap Table</a></li>';
        $str .= '<li class="breadcrumb-item"><a href="#!">Basic Tables</a></li>';
        $str .= '</ul></div></div></div></div>';
        return $str;
    }

    public function row() : View
    {
        $str = '<div class="row">';
        $str .= '<div class="col-md-12">';
        $str .= $this->card();
        $str .= '</div></div>';
        return $str;
    }

    public function pcodedMainContainer(): View
    {
        $str = '<section class="pcoded-main-container">';
        $str .= '<div class="pcoded-content">';
        $str .= $this->pageHeader();
        $str .= $this->row();
        $str .= '</div></section>';
        return $str;
    }
}