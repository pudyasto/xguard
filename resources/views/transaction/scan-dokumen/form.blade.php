@extends('layouts.main')

@push('style-default')
<!--datatable css-->
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title mb-0 h5">Form Pemeriksaan Dokumen</label>
            </div>
            <div class="card-body">
                <form name="form_default" id="form_default" autocomplete="off" method="POST" action="{{$url}}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ isset($data->id) ? $data->id : '' }}">

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="no_dokumen" class="form-label">No. Dokumen</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="no_dokumen" name="no_dokumen" placeholder="Masukkan nomor dokumen" value="{{ isset($data->no_dokumen) ? $data->no_dokumen : '' }}" autofocus required>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-title="Scan Dokumen" data-bs-target="#modal-scan-document">
                                                    <i class="fas fa-camera"></i> Scan QR Code
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="asal" class="form-label">Asal</label>
                                        <input type="text" class="form-control" id="asal" name="asal" placeholder="Masukkan nama asal" value="{{ isset($data->asal) ? $data->asal : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan nama tujuan" value="{{ isset($data->tujuan) ? $data->tujuan : '' }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea style="min-height: 100px;height: 129px;" class="form-control no-resize" name="keterangan" id="keterangan" placeholder="Keterangan">{{ isset($data->keterangan) ? $data->keterangan : '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
                        <a href="{{ route('scan-dokumen') }}" class="btn btn-light btn-close-form">
                            Tutup
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection

@push('script-default')
<script defer src="{{ asset('/plugin/html5-qrcode/html5-qrcode.min.js') }}"></script>
<script defer src="{{ asset('/js/transaction/scan-dokumen/form.js?v=' . rand(1,100)) }}"></script>
@endpush