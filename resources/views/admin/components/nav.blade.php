<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">UX Designer <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">5</small></a></li>
                        <li class="list-inline-item"><a href="auth-signin.html" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
            <?php
                $variable = array(
                    array('link' => 'dashboard', 'title' => 'Bảng Điều Khiển', 'icon' => 'home'),
                    array('link' => 'category', 'title' => 'Danh Mục', 'icon' => 'align-justify'),
                    array('link' => 'product', 'title' => 'Sản Phẩm', 'icon' => 'shopping-cart'),
                    array('link' => 'user', 'title' => 'Thành Viên', 'icon' => 'user')
                )
            ?>
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>DANH MỤC CHÍNH</label>
                </li>
                <?php
                    $str='';
                    foreach ($variable as $key => $value) {
                        $str.='<li class="nav-item">';
                        $str.='<a href="/admin/'.$value['link'].'/index" class="nav-link ">';
                        $str.='<span class="pcoded-micon"><i class="feather icon-'.$value['icon'].'"></i></span>';
                        $str.='<span class="pcoded-mtext">'.$value['title'].'</span></a>';
                        $str.='</li>';
                    }
                    echo $str;
                ?>
            </ul>
            <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="#!" target="_blank" class="btn btn-primary btn-sm text-white m-0">Support</a>
                </div>
            </div>
        </div>
    </div>
</nav>