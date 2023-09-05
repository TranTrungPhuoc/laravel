<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function card()
    {
        $str = '<div class="card">';
        $str .= $this->cardHeader();
        $str .= $this->cardBody();
        $str .= '</div>';
        return $str;
    }

    public function cardHeader()
    {
        $str = '<div class="card-header">';
        $str .= '<h5>Basic Table</h5>';
        $str .= '<span class="d-block m-t-5">use class <code>table</code> inside table element</span>';
        $str .= '</div>';
        return $str;
    }

    public function thead()
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

    public function cardBody()
    {
        $str = '<div class="card-body table-border-style">';
        $str .= '<div class="table-responsive">';
        $str .= '<table class="table">';
        $str .= $this->thead();
        $str .= $this->tbody();
        $str .= '</table></div></div>';
        return $str;
    }

    public function pageHeader()
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

    public function row()
    {
        $str = '<div class="row">';
        $str .= '<div class="col-md-12">';
        $str .= $this->card();
        $str .= '</div></div>';
        return $str;
    }

    public function pcodedMainContainer()
    {
        $str = '<section class="pcoded-main-container">';
        $str .= '<div class="pcoded-content">';
        $str .= $this->pageHeader();
        $str .= $this->row();
        $str .= '</div></section>';
        return $str;
    }
}
