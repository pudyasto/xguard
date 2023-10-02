@extends('layouts.main')

@push('style-default')
<!--datatable css-->
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0 float-start">Daftar Role Pengguna</h5>

                <div class="float-end">
                    <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-title="Tambah Data" data-post-id="" data-action-url="roles/create" data-bs-target="#form-modal">Tambah</button>
                    <button type="button" class="btn btn-sm btn-light btn-refresh">
                        Refresh
                    </button>
                </div>
            </div>

            <table id="tableMain" class="table datatable-basic table-hover">
                <thead>
                    <tr>
                        <th>Nama Role</th>
                        <th>Deskripsi</th>
                        <th style="width: 40px;">Status</th>
                        <th style="width: 160px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Role</th>
                        <th>Deskripsi</th>
                        <th>ID</th>
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
<script defer src="{{ asset('/js/rbac/roles/index.js?v=' . rand(1,100)) }}"></script>
@endpush