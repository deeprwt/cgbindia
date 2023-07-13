<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <div class="input-group">
                <div class="input-group-prepend search-arrow-back">
                    <button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
                    </button>
                </div>
                <input type="text" class="form-control" placeholder="search" />
                <div class="input-group-append">
                    <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
              
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ Auth::guard('admin')->User()->name }}</p>
                                {{-- <p class="designattion mb-0">Available</p> --}}
                            </div>
                            <img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	
                        <a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                       
                        <div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="bx bx-power-off"></i><span>Logout</span></a>
                    </div>
                </li>
              
            </ul>
        </div>
    </nav>
</header>