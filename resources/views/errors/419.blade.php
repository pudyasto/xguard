@extends('layouts.error')

@push('style-default')

@endpush

@section('content')
<div class="content d-flex justify-content-center align-items-center">
    <!-- Container -->
    <div class="flex-fill">
        <!-- Error title -->
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/error_bg.svg') }}" class="img-fluid mb-3 animate__animated animate__rubberBand" height="230" alt="">
            <h1 class="display-3 fw-semibold lh-1 mb-3 text-white">419</h1>
            <h6 class="w-md-25 mx-md-auto text-white">
                Maaf, halaman sudah kadaluarsa.
            </h6>
        </div>
        <!-- /error title -->
        <!-- Error content -->
        <div class="text-center">
            <a href="{{ url('') }}" class="btn btn-success">
                <i class="ph-house me-2"></i>
                Kembali ke halaman depan
            </a>
        </div>
        <!-- /error wrapper -->
    </div>
    <!-- /container -->
</div>
@endsection

@push('script-default')

@endpush