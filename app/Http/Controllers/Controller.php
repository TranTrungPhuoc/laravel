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

    public function button($type='', $class='', $value='')
    {
        return '<button type="'.$type.'" class="btn '.$class.' has-ripple">'.$value.'</button>';
    }

    public function form($class='', $id='', $value='')
    {
        return '<form class="'.$class.'" id="'.$id.'" action="#!" novalidate="novalidate">'.$this->input('hidden', '', '', '_token', '', csrf_token()).$value.'</form>';
    }

    public function label($class='', $value='')
    {
        return '<label class="'.$class.'">'.$value.'</label>';
    }

    public function input($type='', $id='', $class='', $name='', $placeholder='', $value='')
    {
        return '<input type="'.$type.'" id="'.$id.'" class="form-control '.$class.'" name="'.$name.'" value="'.$value.'" placeholder="'.$placeholder.'">';
    }
    // ------------ end common


    public function changeText($variable)
    {
        $str='';
        switch ($variable) {
            case 'email': $str='Email'; break;
            case 'password': $str='Mật Khẩu'; break;
            case 'cfpassword': $str='Xác Nhận Mật Khẩu'; break;
            case 'phone': $str='Số Điện Thoại'; break;
            default: $str='No Name'; break;
        }
        return $str;
    }

    public function getParams($so)
    {
        return \Request::segment($so);
    }

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
        $module = $this->getParams(3);

        $variable = array('#', 'First Name', 'Last Name', 'Username');

        $th = '';
        foreach ($variable as $key => $value) { $th .= $this->th($value); }

        $class = ($module == 'index') ? 'table-border-style' : '';

        $table = $this->div('table-responsive', $this->table('table', $this->thead($this->tr($th)) . $this->tbodyHtml() ));

        $btn_save = $this->button('submit', 'btn-primary', 'Lưu');
        $btn_exit = $this->a('/admin/'.$this->getParams(2).'/index', 'btn btn-secondary', 'Thoát');

        $form = $this->form('', 'formModule', $this->formHtml() . $btn_save . '&nbsp;' . $btn_exit);

        return $this->div('card-body ' . $class, ($module == 'index') ? $table : $form);
    }

    public function cardHeader()
    {
        $module = $this->getParams(2);
        $func = $this->getParams(3);

        $href = '/admin/'.$module.'/add';
        $value = $this->button('button', 'btn-outline-primary', $this->i('feather icon-plus') . ' Thêm Dữ Liệu');

        return ($func == 'index') ? $this->div('card-header', $this->span('d-block', $this->a($href, '', $value))) : '';
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

    public function handle() {
        $data = \Request::input();
        unset($data['_token']);
        print_r($data);
    }
}
