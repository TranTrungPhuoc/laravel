<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    // ------------ table
    public function table($class='', $value='')
    {
        return '<table class="'.$class.'">'.$value.'</table>';
    }

    public function thead($value='')
    {
        return '<thead>'.$value.'</thead>';
    }

    public function tbody($value='')
    {
        return '<tbody>'.$value.'</tbody>';
    }

    public function tr($value='')
    {
        return '<tr>'.$value.'</tr>';
    }

    public function th($value='')
    {
        return '<th>'.$value.'</th>';
    }

    public function td($value='')
    {
        return '<td>'.$value.'</td>';
    }
    // ------------ end table


    // ------------ list
    public function ul($class='', $value='')
    {
        return '<ul class="'.$class.'">'.$value.'</ul>';
    }

    public function li($class='', $value='')
    {
        return '<li class="'.$class.'">'.$value.'</li>';
    }
    // ------------ end list

    
    // ------------ heading
    public function h5($class='', $value='')
    {
        return '<h5 class="'.$class.'">'.$value.'</h5>';
    }
    // ------------ end heading

    
    // ------------ common
    public function section($class='', $value='')
    {
        return '<section class="'.$class.'">'.$value.'</section>';
    }

    public function div($class='', $value='')
    {
        return '<div class="'.$class.'">'.$value.'</div>';
    }

    public function span($class='', $value='')
    {
        return '<span class="'.$class.'">'.$value.'</span>';
    }

    public function a($href='', $class='', $value='')
    {
        return '<a href="'.$href.'" class="'.$class.'">'.$value.'</a>';
    }

    public function i($class='')
    {
        return '<i class="'.$class.'"></i>';
    }

    public function button($class='', $value='')
    {
        return '<button type="button" class="btn '.$class.' has-ripple">'.$value.'</button>';
    }

    public function form($class='', $id='', $value='')
    {
        return '<form class="'.$class.'" id="'.$id.'" action="#!" novalidate="novalidate">'.$value.'</form>';
    }

    public function label($class='', $value='')
    {
        return '<label class="'.$class.'">'.$value.'</label>';
    }
    // ------------ end common


    public function pageHeader()
    {
        $h5 = $this->h5('m-b-10', 'Bootstrap Basic Tables');

        $variable = array(
            array( 'href' => 'index.html', 'title' => $this->i('feather icon-home') ),
            array( 'href' => '#!', 'title' => 'Bootstrap Table' ),
            array( 'href' => '#!', 'title' => 'Bootstrap Tables' )
        );

        $li='';
        foreach ($variable as $key => $value) { $li .= $this->li('breadcrumb-item', $this->a($value['href'], '', $value['title'])); }

        $pageHeaderTitle = $this->div('page-header-title', $h5);
        $ul = $this->ul('breadcrumb', $li);

        return $this->div('page-header', $this->div('page-block', $this->div('row align-items-center', $this->div('col-md-12', $pageHeaderTitle . $ul ))));
    }

    public function cardBody()
    {
        $variable = array('#', 'First Name', 'Last Name', 'Username');

        $th = '';
        foreach ($variable as $key => $value) { $th .= $this->th($value); }

        $thead = $this->thead($this->tr($th));
        $tbody = $this->tbodyPrivate();

        $module = \Request::segment(3);

        $content = '';
        $class = '';

        if($module == 'index'){
            $class = 'table-border-style';
            $content = $this->div('table-responsive', $this->table('table', $thead . $tbody ));
        }else{
            $content = $this->form('', 'validation-form123', $this->formPrivate());
        }

        return $this->div('card-body ' . $class, $content);
    }

    public function cardHeader()
    {
        $module = \Request::segment(2);
        $a = $this->a('/admin/'.$module.'/add', '', $this->button('btn-outline-primary', $this->i('feather icon-plus') . ' Thêm Dữ Liệu'));
        return $this->div('card-header', $this->span('d-block', $a));
    }

    public function card()
    {
        return $this->div('card', $this->cardHeader() . $this->cardBody());
    }

    public function row()
    {
        return $this->div('row', $this->div('col-md-12', $this->card()));
    }

    public function pcodedMainContainer()
    {
        return $this->section('pcoded-main-container', $this->div('pcoded-content', $this->pageHeader() . $this->row()));
    }
}
