<div class="col-md-2 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> 
            <span>Admin page</span></a>
        </div>
        <!-- <div class="clearfix"></div> -->
        <!-- menu profile quick info -->
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
                        <!-- <ul class="nav child_menu">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="index2.html">Dashboard2</a></li>
                            <li><a href="index3.html">Dashboard3</a></li>
                        </ul> -->
                    </li>
                        <li><a href="{{ route('place.index') }}"><i class="fa fa-edit"></i>Місця для оренди</a>
                    </li>
                        <li><a href="{{ route('price.index') }}"><i class="fa fa-desktop"></i>Тарифи</a>
                    </li>
                        <li><a href="{{ route('discount.index') }}"><i class="fa fa-table"></i>Купони на знижку</a>
                    </li>
                        <li><a href="{{ route('permissions.index') }}"><i class="fa fa-bar-chart-o"></i>Користувачі</a>

                        </li>
                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-clone"></i>Вихід</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>
            </div>    
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <!-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
        <!-- /menu footer buttons -->
        </div>
    </div>
</div>