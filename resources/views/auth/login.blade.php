@extends('layouts.auth')

@push('style-default')

@endpush

@section('content')
<!-- Login card -->
<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <div class="d-inline-flex align-items-center justify-content-center mb-1 mt-2 display-6">
                    <span class="text-warning">X</span>-Guard
                </div>
                <h5 class="mb-0">Selamat Datang</h5>
                <span class="d-block text-muted">Silahkan Masukkan NIK dan Password Anda</span>
            </div>


            @if (session('status'))
                <div class="mb-3 alert alert-danger">
                    {!! session('status') !!}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 p-0" style="list-style-type:none;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <div class="mb-3">
                <label class="form-label">{{ __('NIK') }}</label>
                <div class="form-control-feedback form-control-feedback-start">
                    <input type="text" name="username" class="form-control" placeholder="" value="131005357">
                    <div class="form-control-feedback-icon">
                        <i class="ph-user-circle text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="form-control-feedback form-control-feedback-start">
                    <input type="password" name="password" class="form-control" value="131005357">
                    <div class="form-control-feedback-icon">
                        <i class="ph-lock text-muted"></i>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3">
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                    <span class="form-check-label">Remember</span>
                </label>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="ms-auto">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </div>
    </div>
</form>
<!-- /login card -->
@endsection

@push('script-default')

@endpush