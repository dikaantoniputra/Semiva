@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
@endpush

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('info-daerah.update', $info) }}" id="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('page.regencyinfo.form')
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("select").select2({
            tags: "true",
            placeholder: "Select an Daerah",
            allowClear: true
        });
    </script>
@endpush
