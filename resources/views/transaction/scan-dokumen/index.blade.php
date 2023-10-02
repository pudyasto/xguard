@extends('layouts.main')

@push('style-default')
<!--datatable css-->
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title mb-0 h5">Daftar Dokumen</label>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <a href="{{ url('scan-dokumen/create') }}" class="btn btn-primary ">Tambah</a>
                    <button type="button" class="btn btn-light btn-refresh">
                        Refresh
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="tableMain" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 120px;">Tanggal</th>
                                <th style="width: 150px;">No. Dokumen</th>
                                <th>Tujuan</th>
                                <th>Keterangan</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection

@push('script-default')
<script defer src="{{ asset('/js/transaction/scan-dokumen/index.js?v=' . rand(1,100)) }}"></script>
@endpush