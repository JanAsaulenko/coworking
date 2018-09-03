<div class="navbar nav_title" style="border: 0;">
    <a href="{{ route('admin') }}" class="site_title"><i class="fa fa-paw"></i>
        <span>Admin page</span></a>
</div>
<div class="profile clearfix">
    <!-- <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
    </div> -->
    <div class="profile_info">
        <span style="font-size: 15px;">Welcome: admin_name</span>
        <!-- <h2>John Doe</h2> -->
    </div>
</div>
<!-- /menu profile quick info -->
<br/>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('operator') }}"><i class="fa fa-home"></i>Оператор</a>
            </li>
            <li><a href="{{ route('place.index') }}"><i class="fa fa-edit"></i>Місця для оренди</a>
            </li>
            <li><a href="{{ route('space.index') }}"><i class="fa fa-edit"></i>Простори для оренди</a>
            </li>
            <li><a href="{{ route('price.index') }}"><i class="fa fa-desktop"></i>Тарифи</a>
            </li>
            <li><a href="{{ route('discount.index') }}"><i class="fa fa-table"></i>Купони на знижку</a>
            </li>
            <li><a href="{{ route('permissions.index') }}"><i class="fa fa-bar-chart-o"></i>Користувачі</a>
            </li>



        </ul>
    </div>
</div>
