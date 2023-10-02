@extends('layouts.auth')

@push('style-default')

@endpush

@section('content')


<!-- begin card -->
<form method="POST" action="{{ route('password.update') }}" class="login-form" novalidate="">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <div class="d-inline-flex align-items-center justify-content-center mb-1 mt-2 display-6">
                    <span class="text-warning">X</span>-Guard
                </div>

                <div>
                    <img src="{{ asset('images/reset-password.svg') }}" style="height: 200px;" >
                </div>
                <h5 class="mb-0">Ubah Password</h5>
                <span class="d-block text-muted">Silahkan ubah password anda</span>
            </div>

            @if (session('status'))
            <div class="mb-3 alert alert-info">
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
                <label class="form-label">{{ __('Alamat Email') }}</label>
                <div class="form-control-feedback form-control-feedback-start">
                    <input type="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required>
                    <div class="form-control-feedback-icon">
                        <i class="ph-envelope-simple text-muted"></i>
                    </div>
                </div>
            </div>

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
                <label class="form-label">Ulangi {{ __('Password') }}</label>
                <div class="form-control-feedback form-control-feedback-start">
                    <input type="password" name="password_confirmation" class="form-control" required>
                    <div class="form-control-feedback-icon">
                        <i class="ph-lock-key text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Ubah Password') }}
                </button>
            </div>

            <div class="mt-4 text-center">
                <p class="mb-0">Kembali ke Halaman <a href="{{ url('login') }}" class="fw-semibold text-primary text-decoration-underline"> Login </a> </p>
            </div>
        </div>
    </div>
</form>
<!-- /begin card -->
@endsection

@push('script-default')

@endpush