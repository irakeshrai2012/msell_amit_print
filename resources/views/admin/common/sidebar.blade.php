<nav id="mainnav-container" class="mainnav">
            <div class="mainnav__inner">

                <!-- Navigation menu -->
                <div class="mainnav__top-content scrollable-content pb-5">

                    <!-- Profile Widget -->
                    <div class="mainnav__profile mt-3 d-flex3">

                        <div class="mt-2 d-mn-max"></div>

                        <!-- Profile picture  -->
                        <div class="mininav-toggle text-center py-2">
                            <img class="mainnav__avatar img-md rounded-circle border" src="{{asset('backend/img/profile-photos/1.png')}}" alt="Profile Picture">
                        </div>

                        <div class="mininav-content collapse d-mn-max">
                            <div class="d-grid">

                                <!-- User name and position -->
                                <button class="d-block btn shadow-none p-2" data-bs-toggle="collapse" data-bs-target="#usernav" aria-expanded="false" aria-controls="usernav">
                                    <span class="dropdown-toggle d-flex justify-content-center align-items-center">
                                        <h6 class="mb-0 me-3">{{ucfirst(Auth::user()->name)}}</h6>
                                    </span>
                                    <!-- <small class="text-muted">{{Auth::user()->email}}</small> -->
                                </button>

                                <!-- Collapsed user menu -->
                                <div id="usernav" class="nav flex-column collapse">
                                    <!-- <a href="#" class="nav-link d-flex justify-content-between align-items-center">
                                        <span><i class="demo-pli-mail fs-5 me-2"></i><span class="ms-1">Messages</span></span>
                                        <span class="badge bg-danger rounded-pill">14</span>
                                    </a> -->
                                    <a href="#" class="nav-link">
                                        <i class="demo-pli-male fs-5 me-2"></i>
                                        <span class="ms-1">Profile</span>
                                    </a>
                                    <!-- <a href="#" class="nav-link">
                                        <i class="demo-pli-gear fs-5 me-2"></i>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                    <a href="#" class="nav-link">
                                        <i class="demo-pli-computer-secure fs-5 me-2"></i>
                                        <span class="ms-1">Lock screen</span>
                                    </a> -->

                                    <form method="post" action ="{{route('logout')}}">
                                        @csrf
                                        <button class="btn btn-primary" title="logout" type="submit" value="Logout"><i class="demo-pli-unlock fs-5 me-2"></i>
                                        <span class="ms-1">Logout</span></button>
                                    </form>
                                    
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- End - Profile widget -->

                    <!-- Navigation Category -->
                    <div class="mainnav__categoriy py-3">
                        <h6 class="mainnav__caption mt-0 px-3 fw-bold">Navigation</h6>
                        <ul class="mainnav__menu nav flex-column">

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('admin')}}" class=" nav-link "><i class="demo-pli-home fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Dashboard</span>
                                </a>

                                <!-- Dashboard submenu list -->
                                <!-- <ul class="mininav-content nav collapse">
                                    <li class="nav-item">
                                        <a href="index.htm" class="nav-link active">Dashboard 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="dashboard-2/index.htm" class="nav-link">Dashboard 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="dashboard-3/index.htm" class="nav-link">Dashboard 3</a>
                                    </li>

                                </ul> -->
                                <!-- END : Dashboard submenu list -->

                            </li>
                            <!-- END : Link with submenu -->

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('categories')}}" class=" nav-link collapsed"><i class="demo-pli-split-vertical-2 fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Categories</span>
                                </a>

                                <!-- Layouts submenu list -->
                                
                                <!-- END : Layouts submenu list -->

                            </li>
                            <!-- END : Link with submenu -->

                            <!-- Regular menu link -->
                            <li class="nav-item">
                                <a href="{{url('/products')}}" class="nav-link "><i class="demo-pli-gear fs-5 me-2"></i>

                                    <span class="nav-label mininav-content ms-1">Products</span>
                                </a>
                            </li>
                            <!-- END : Regular menu link -->

                        </ul>
                    </div>
                    <!-- END : Navigation Category -->

                    <!-- Components Category -->
                    <div class="mainnav__categoriy py-3">
                        <h6 class="mainnav__caption mt-0 px-3 fw-bold">Orders</h6>
                        <ul class="mainnav__menu nav flex-column">

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('Order-Summary-Report')}}" class=" nav-link collapsed"><i class="demo-pli-boot-2 fs-5 me-2"></i>
                                    <span class="nav-label ms-1"> Orders</span>
                                </a>

                                
                                <!-- END : Ui Elements submenu list -->

                            </li>
                            <!-- END : Link with submenu -->

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('Tax-Master')}}" class=" nav-link collapsed"><i class="demo-pli-pen-5 fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Tax Master</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>
                            <!-- END : Link with submenu -->

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('Users')}}" class=" nav-link collapsed"><i class="demo-pli-gear fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Users</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>


                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('admin/sheets/list')}}" class=" nav-link collapsed"><i class="demo-pli-gear fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Sheets</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>


                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('admin/jobs/list')}}" class=" nav-link collapsed"><i class="demo-pli-gear fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Jobs</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>


                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('admin/jobs-allottment/list')}}" class=" nav-link collapsed"><i class="demo-pli-gear fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Jobs Allottment</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('admin/employee/list')}}" class=" nav-link collapsed"><i class="demo-pli-gear fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Employee</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>

                            <!-- Link with submenu -->
                            <li class="nav-item has-sub">

                                <a href="{{url('admin/customers/list')}}" class=" nav-link collapsed"><i class="demo-pli-gear fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Customers</span>
                                </a>

                                
                                <!-- END : Forms submenu list -->

                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('manual_wallet_balace')}}">
                                    <i class="demo-pli-gear fs-5 me-2"></i>
                                    <span>Add Wallet Balance</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/department/list')}}">
                                    <i class="demo-pli-gear fs-5 me-2"></i>
                                    <span>Department</span></a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/role/list')}}">
                                    <i class="demo-pli-gear fs-5 me-2"></i>
                                    <span>Roles</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/module/list')}}">
                                    <i class="demo-pli-gear fs-5 me-2"></i>
                                    <span>Modules</span></a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/module_access/list')}}">
                                    <i class="demo-pli-gear fs-5 me-2"></i>
                                    <span>Role Permission</span></a>
                            </li>

                           
                            <!-- END : Link with submenu -->

                            <!-- Link with submenu -->
                            
                            <!-- END : Link with submenu -->

                            <!-- Link with submenu -->
                            
                            <!-- END : Link with submenu -->

                        </ul>
                    </div>
                    <!-- END : Components Category -->

                    

                    

                </div>
                <!-- End - Navigation menu -->

                

            </div>
        </nav>