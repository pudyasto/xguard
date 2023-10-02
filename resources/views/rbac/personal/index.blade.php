@extends('layouts.main')

@push('style-default')

@endpush

@section('content')
<div class="d-lg-flex align-items-lg-start">

    <!-- Left sidebar component -->
    <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">
        <!-- Sidebar content -->
        <div class="sidebar-content">
            <!-- Navigation -->
            <div class="card">
                <div class="sidebar-section-body text-center" style="min-height: 286px;">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{ getPhoto() }}" width="150" height="150" alt="">
                    </div>

                    <h6 class="mb-0">{{Auth::user()->name}}</h6>
                    <span class="text-muted">{{Auth::user()->factory->kode}} - {{Auth::user()->department}}</span>
                </div>

                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ph-calendar me-2"></i>
                            Last Login
                            <span class="fs-sm fw-normal text-primary ms-auto">{{ (Auth::user()->last_login_at) ? datetime_id(Auth::user()->last_login_at) : datetime_id(Auth::user()->created_at) }}</span>
                        </a>
                    </li>
                    <li class="nav-item-divider"></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link text-danger fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ph-sign-out me-2"></i>
                                Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /left sidebar component -->


    <!-- Right content -->
    <div class="tab-content flex-fill">
        <div class="tab-pane fade active show" id="profile">
            <div class="card">
                <div class="card-body">
                    <nav>
                        <ul class="nav nav-tabs nav-tabs-highlight" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="ph-user-circle me-2"></i> Data Personal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                    <i class="ph-lock me-2"></i> Ubah Password
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="tab-content mt-2">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form novalidate="" name="form_personal" id="form_personal" autocomplete="off" method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" class="form-control" id="nik" value="{{ Auth::user()->nik }}" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-7">
                                        <div class="mb-3">
                                            <label for="factory" class="form-label">Factory</label>
                                            <input type="text" class="form-control" id="factory" value="{{ Auth::user()->factory->nama }}" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label for="department" class="form-label">Department</label>
                                            <input type="text" class="form-control" id="department" value="{{ Auth::user()->department }}" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Foto</label>
                                            <input type="file" class="form-control" name="photo" id="photo" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary btn-submit-profile">Ubah</button>
                                            <a href="{{ route('personal') }}" class="btn btn-light">Batal</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form novalidate="" name="form_password" id="form_password" autocomplete="off" method="POST" action="{{ route('updatePassword') }}">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="old_password" class="form-label">Password Saat Ini</label>
                                            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Masukkan Password Saat Ini">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="password" class="form-label">Password Baru</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="password_confirmation" class="form-label">Ulangi Password Baru</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Password Baru">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success btn-submit-password">Ubah Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /right content -->
</div>
@endsection

@push('script-default')
<script defer src="{{ asset('js/rbac/personal/form.js?v=' . rand(1,100)) }}"></script>
@endpush