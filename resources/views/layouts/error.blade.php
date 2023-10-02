<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  @include('includes.auth-head')
</head>

<body class="bg-dark">

  <div class="d-flex bd-highlight mt-4 fixed-top company-logo">
    <div class="me-auto ps-4 bd-highlight">
      <a href="{{ url('') }}" class="d-inline-block auth-logo">
        <img src="{{ asset('/images/logo-bbi.png') }}" alt="" height="50">
      </a>
    </div>
    <div class="pe-4 bd-highlight">
      <a href="{{ url('') }}" class="d-inline-block auth-logo">
        <img src="{{ asset('/images/logo-aoi.jpg') }}" alt="" height="50">
      </a>
    </div>
  </div>

  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Inner content -->
      <div class="content-inner">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
          @yield('content')
        </div>
        <!-- /content area -->
      </div>
      <!-- /inner content -->
    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->
  @include('includes.auth-js')
</body>

</html>