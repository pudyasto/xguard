<meta charset="utf-8" />
<title>{{ ( isset($menuTitle) ) ? $menuTitle . ' | ' : '' }} {{ config('app.name') }}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=5, shrink-to-fit=no" name="viewport">
<meta content="Apparel One Indonesia - BBI Group" name="description" />
<meta content="ICT Departement" name="author" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('favicon.png') }}">

<!-- Global stylesheets -->
<link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
<link defer href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
<link defer href="{{ asset('assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
<link defer rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<link defer href="{{ asset('/plugin/datepicker-1.9.0/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- custom Css-->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />


@stack('style-default')