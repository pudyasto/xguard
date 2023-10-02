@extends('layouts.auth')

@push('style-default')

@endpush

@section('content')
<!-- card -->
<form method="POST" action="{{ route('password.confirm') }}" class="login-form" novalidate="">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <div class="d-inline-flex align-items-center justify-content-center mb-1 mt-2 display-6">
                    <span class="text-warning">X</span>-Guard
                </div>

                <div>
                    <div class="d-inline-flex bg-primary bg-opacity-10 text-danger lh-1 rounded-pill p-3 mb-3 mt-1">
                        <i class="ph-lock-key ph-2x"></i>
                    </div>
                </div>
                <h5 class="mb-0">Perhatian!</h5>
                <span class="d-block text-muted">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</span>
            </div>

            @if (session('status'))
            <div class="mb-3 alert alert-danger">
                {!! session('status') !!}
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-3 alert alert-danger">
                <ul class="mb-0 p-0" style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <div class="form-control-feedback form-control-feedback-start">
                    <input type="password" name="password" class="form-control" autofocus required>
                    <div class="form-control-feedback-icon">
                        <i class="ph-lock-key text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success w-100">
                {{ __('Confirm') }}
                </button>
            </div>

            <div class="mt-4 text-center">
                <p class="mb-0">Kembali ke <a href="{{ route('home') }}" class="fw-semibold text-primary text-decoration-underline"> Home </a> </p>
            </div>
        </div>
    </div>
</form>
<!-- /card -->
@endsection

@push('script-default')
@endpush