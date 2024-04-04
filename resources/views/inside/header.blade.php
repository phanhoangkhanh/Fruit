<div class="app is-primary">
        <div class="layout is-side-nav-dark">
            <div class="header">
                <div class="logo" >
                    <a style="height: 100%; display: flex; align-items: center; justify-content: center;">
                        <h3>SFVN</h3>
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <div style="color:black">{{auth()->user()->name ?? "..."}}</div>
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>

                                @auth()
                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        
            <div class="side-nav">
                <div class="side-nav-inner">
                    @include('inside.menu')
                </div>
            </div>
            
            <div class="page-container">

            