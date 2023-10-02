<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar header -->
    <div class="sidebar-section bg-black bg-opacity-10 border-bottom border-bottom-white border-opacity-10">
        <div class="sidebar-logo d-flex justify-content-center align-items-center">
            <a href="{{ url('') }}" class="d-inline-flex align-items-center py-2">
                <div class="sidebar-logo-icon fw-bolder text-warning">
                    AOI
                </div>

                <div class="sidebar-resize-hide ms-1 fw-bolder text-white">
                    | X - GUARD
                </div>
            </a>

            <div class="sidebar-resize-hide ms-auto">
                <button type="button" id="btn-arrow-right" aria-label="aria-arrow-right" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>

                <button type="button" id="btn-ph-x" aria-label="aria-ph-x" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- /sidebar header -->

    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link {{ ($link=='home' || $link == '') ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>
                            Home
                        </span>
                    </a>
                </li>

                @foreach($header_menu_sidebar as $v_header)
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">{{ $v_header }}</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    @foreach($menu_sidebar['menus'] as $v_menu)
                        @if($v_header==$v_menu['menu_header'])
                            @if(!empty($v_menu['menu_name']) && $v_menu['link'] == "#")
                                @if($v_menu['sub']['submenu'])
                                    <li class="nav-item nav-item-submenu {{$v_menu['active']}}">
                                        <a href="#" class="nav-link ">
                                            <i class="{{$v_menu['icon']}}"></i>
                                            <span>{{$v_menu['menu_name']}}</span>
                                        </a>
                                        <ul class="nav-group-sub collapse {{$v_menu['active']}}">
                                            @foreach($v_menu['sub']['submenu'] as $v_sub_menu)
                                            <li class="nav-item">
                                            <a href="{{ ($v_sub_menu['is_eksternal']=='Ya') ? url($v_sub_menu['link']) : $v_sub_menu['link'] }}" target="{{ ($v_sub_menu['is_newtab']=='Ya') ? '_blank' : '_self'}}" class="nav-link {{$v_sub_menu['sub_active']}}" data-key="t-{{$v_sub_menu['link']}}">
                                                    {{$v_sub_menu['menu_name']}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                                @else
                                <!-- Menu tunggal -->
                                <li class="nav-item">
                                <a href="{{ ($v_menu['is_eksternal']=='Ya') ? url($v_menu['link']) : $v_menu['link'] }}" target="{{ ($v_menu['is_newtab']=='Ya' ? '_blank' : '_self' ) }}" class="nav-link menu-link {{ ($link==$v_menu['link']) ? 'active' : '' }}">
                                        <i class="{{$v_menu['icon']}}"></i>
                                        <span>{{$v_menu['menu_name']}}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <!-- /layout -->


                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Pengaturan</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal') }}" class="nav-link {{ ($link=='personal' || $link == '') ? 'active' : '' }}">
                        <i class="ph-user-circle"></i>
                        <span>
                            Personal
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>