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

                    {{-- @can('dashboard') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.index') }}"><i
                                class="fab fa-fw fa-wpforms"></i>Dashboard <span class="badge badge-success">6</span>
                        </a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @canany(['property view','property manage','agreement view','agreement
                    manage','payment view','payment manage','tent view','tent manage']) --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-home"></i>Rent</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    @canany(['property view','property manage'])
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="true"
                                        data-target="#submenu-11" aria-controls="submenu-11">Properties</a>


                                    <div id="submenu-11" class="submenu collapse show" style="">
                                        <ul class="nav flex-column">


                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{url( route('type.index') )}}?filter=property">Types</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('property.index') }}">Status</a>
                                            </li>
                                        </ul>
                                    </div>

                                    @endcan
                                </li>
                                @canany(['tent view','tent manage'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tent.index') }}">Tent</a>
                                </li>
                                @endcan

                                @canany(['agreement view','agreement manage'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('agreement.index') }}">Agreement</a>
                                </li>
                                @endcan

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('payment.index') }}">Payment</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- @endcanany --}}

                    @canany(['borrow view','borrow manage'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrow.index') }}"><i class="fas fa-address-book"></i>Borrow
                        </a>
                    </li>
                    @endcanany

                    @canany(['wellpart view','wellpart manage'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('wellpart') }}"><i class="far fa-calendar-check"></i>Well Part
                            <span class="badge badge-success">6</span>
                        </a>
                    </li>
                    @endcanany

                    @canany(['expense view','expense manage'])
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fas fa-list-alt"></i>Expenses</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('type.index') }}?filter=expense">Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('expense.index') }}">Expenses</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcanany

                    @canany(['loan view','loan manage'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loan.index') }}"><i class="fas fa-handshake"></i>Loan</a>
                    </li>
                    @endcanany

                    {{-- @canany(['expense view','expense manage']) --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-14" aria-controls="submenu-14"><i
                                class="fas fa-list-alt"></i>Manage</a>
                        <div id="submenu-14" class="collapse submenu" style="">
                            <ul class="nav flex-column">

                                @canany(['user manage'])
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-10" aria-controls="submenu-10"><i class=" fas fa-user"></i>User</a>
                                    <div id="submenu-10" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.index') }}">Manage User</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('role.index') }}">Role & Permission </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @endcanany

                                {{-- @can('backup manage') --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('setting.index') }}"><i class="fas fa-hockey-puck"></i>Bacup
                                        & Restore</a>
                                </li>
                                {{-- @endcan --}}

                                {{-- @can('setting manage') --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('setting.index') }}"><i
                                            class="fas fa-sliders-h"></i>Settings</a>
                                </li>
                                {{-- @endcan --}}
                            </ul>
                        </div>
                    </li>
                    {{-- @endcanany --}}



                </ul>
            </div>
        </nav>
    </div>
</div>


