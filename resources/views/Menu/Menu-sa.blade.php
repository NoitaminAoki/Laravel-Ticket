<!-- Sidebar chat start -->
                      <div id="sidebar" class="users p-chat-user showChat">
                        <div class="had-container">
                          <div class="card card_main p-fixed users-main">
                            <div class="user-box">

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Sidebar inner chat end-->
                      <div class="pcoded-main-container">
                        <div class="pcoded-wrapper">
                          <nav class="pcoded-navbar" data-navbar-theme="theme2">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                            <div class="pcoded-inner-navbar main-menu">
                              <div class="">
                                <div class="main-menu-header">
                                  <img class="img-40" src="{{asset('images/user/'.Session::get('login_admin.photo'))}}" alt="User-Profile-Image">
                                  <div class="user-details">
                                    <span>{{ Session::get("login_admin.username") }}</span>
                                    <span id="more-details">{{ Session::get("login_admin.level") }}<i class="ti-angle-down"></i></span>
                                  </div>
                                </div>

                                <div class="main-menu-content">
                                  <ul>
                                    <li class="more-details">
                                      <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                                      <a href="#!"><i class="ti-settings"></i>Settings</a>
                                      <a href="{{ route('admin-logout') }}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pcoded-navigatio-lavel">Home</div>
                              <ul class="pcoded-item pcoded-left-item">
                                <li class="{{($parent=='dashboard')?'active':''}} pcoded-trigger ">
                                  <a href="{{ route('admin-dash') }}">
                                    <span class="pcoded-micon"><i class="ti-dashboard"></i></span>
                                    <span class="pcoded-mtext">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                </li>
                              </ul>
                              <div class="pcoded-navigatio-lavel">Manage</div>
                              <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu {{($parent=='user')?'active pcoded-trigger':''}}">
                                  <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                                    <span class="pcoded-mtext">User</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li class="{{($parent_menu=='user view')?'active':''}}">
                                      <a href="{{route('user-view')}}">
                                        <span class="pcoded-mtext">View User</span>
                                        <span class="pcoded-mcaret"></span>
                                      </a>
                                    </li>
                                    <li class="{{($parent_menu=='user add')?'active':''}}">
                                      <a href="{{route('user-add')}}">
                                        <span class="pcoded-mtext">Create User</span>
                                        <span class="pcoded-mcaret"></span>
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                              <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu {{($parent=='reservasi')?'active pcoded-trigger':''}}">
                                  <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                                    <span class="pcoded-mtext">Reservation Customer</span>
                                    <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li class="{{($parent_menu=='reservasi view')?'active':''}}">
                                      <a href="{{route('reservasi-view')}}">
                                        <span class="pcoded-mtext">View Reservation</span>
                                        <span class="pcoded-mcaret"></span>
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                            </div>
                          </nav>
                          <div class="pcoded-content">
                            <div class="pcoded-inner-content">