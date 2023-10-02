@extends('layouts.main')

@push('style-default')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0 float-start">Daftar Pengguna Aplikasi</h5>
                <div class="float-end">
                    <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-title="Tambah Data" data-post-id="" data-action-url="users/create" data-bs-target="#form-modal">Tambah</button>
                    <button type="button" class="btn btn-sm btn-light btn-refresh">
                        Refresh
                    </button>
                </div>
            </div>
            <table id="tableMain" class="table datatable-basic table-hover">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th style="width: 10px;">Status</th>
                        <th class="text-center" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>ID</th>
                    </tr>
                </tfoot>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection

@push('script-default')
<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('/js/rbac/users/index.js?v=' . rand(1,100)) }}"></script>
@endpush