<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- header start -->
    @include('includes.main-head')
    <!-- header end -->
</head>

<body>

    <!-- Begin page -->
    <div class="page-content">


        <!-- Main sidebar -->
        @include('includes.main-sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Main navbar -->
            @include('includes.main-header')
            <!-- /main navbar -->

            <!-- Page header -->
            <div class="page-header page-header-light page-header-static shadow">
                <div class="page-header-content d-lg-flex py-1">
                    <h6 class="mb-0">
                        {{ ($subMenuName) ? $subMenuName : $menuName }}
                    </h6>

                    <div class="breadcrumb my-lg-auto ms-lg-auto">

                        @if($menuName!=='Home')     
                            <a href="{{url('')}}" class="breadcrumb-item" aria-label="Breadcrumb Home"><i class="ph-house"></i></a>                       
                        @endif

                        @if($subMenuName)
                            <a href="#" class="breadcrumb-item" aria-label="Breadcrumb {{$menuName}}">{{$menuName}}</a>
                            <span class="breadcrumb-item active">{{$subMenuName}}</span>
                        @else
                            <span class="breadcrumb-item">{{$menuName}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Inner content -->
            <div class="content-inner">
                <!-- Content area -->
                <div class="content animate__animated animate__fadeIn">
                    @yield('content')
                </div>
                <!-- /content area -->


                <!-- Footer -->
                <div class="navbar navbar-sm navbar-footer border-top">
                    <div class="container-fluid">
                        <span>
                            BBI Group - Apparel One Indonesia &copy; {{ config('app.name') }} {{(date('Y') > 2023) ? '2023 - ' . date('Y') : '2023';}}
                        </span>

                        <ul class="nav">
                            <li class="nav-item ms-md-1">
                                <div class="navbar-nav-link navbar-nav-link-icon rounded">
                                    <div class="d-flex align-items-center mx-md-1">
                                        <span class="d-none d-md-inline-block ms-2">
                                            {{ 'Framework Ver : ' . app()->version() . ' | Server Ver : ' . phpversion() }}
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- END layout-wrapper -->


    <!-- form-modal -->
    <div id="form-modal" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="form-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body">
                    <div id="form-modal-content"></div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" id="modal-scan-document" data-bs-backdrop="static" aria-labelledby="form-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-info">
                        Scan dokumen dengan mengarahkan kamere ke QR-Code atau Barcode yang tersedia.
                    </div>
                    <div class="text-center mb-3">
                        <div id="preview" style="width: 100%; margin: auto;" class="text-center"></div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    @include('includes.main-js')
</body>

</html>