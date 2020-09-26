<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/dashboard')}}"><i
                                class="fa fa-fw fa-user-circle"></i>Dashboard <span
                                class="badge badge-success">6</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-rocket"></i>Rent</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="true" data-target="#submenu-11" aria-controls="submenu-11">Properties</a>
                                    <div id="submenu-11" class="submenu collapse show" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('admin/property/type')}}">Types</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('admin/property')}}">Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/tent')}}">Tent</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/agreement')}}">Agreement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/payment')}}">Payment</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/borrow')}}"><i
                                class="fa fa-fw fa-user-circle"></i>Borrow
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/well_part')}}"><i
                                class="fa fa-fw fa-user-circle"></i>Well Part <span
                                class="badge badge-success">6</span>
                        </a>
                    </li>

                    

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fa fa-fw fa-rocket"></i>Expenses</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/expence/type')}}">Expense Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/expence')}}">Expenses</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-5" aria-controls="submenu-5"><i
                                class="fa fa-fw fa-rocket"></i>Loan</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/loan')}}">Loan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/return')}}">Return</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-6" aria-controls="submenu-6"><i
                                class="fa fa-fw fa-rocket"></i>Report</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/welpart/create')}}">ABC</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-7" aria-controls="submenu-7"><i
                                class="fa fa-fw fa-rocket"></i>Backup and Restore</a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/welpart/create')}}">Backup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('admin/welpart')}}">Restore</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                   

                  


                </ul>
            </div>
        </nav>
    </div>
</div>