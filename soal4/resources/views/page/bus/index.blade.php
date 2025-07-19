@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
    <link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a type="submit" href="{{ route('bus.create') }}"
                        class="btn btn-primary waves-effect waves-light">Tambah Bus</a>
                    <br>
                    </br>
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nopol</th>
                                <th>tahun_pembuatan</th>
                                <th>tipe</th>
                                <th>merek</th>
                                <th>kapasitas</th>
                                <th>jenis_kendaraan</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($bus as $bus)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bus->nopol }}</td>
                                    <td>{{ $bus->tahun_pembuatan }}</td>
                                    <td>{{ $bus->tipe }}</td>
                                    <td>{{ $bus->merek }}</td>
                                    <td>{{ $bus->kapasitas }}</td>
                                    <td>{{ $bus->jenis_kendaraan }}</td>
                                    <td>
                                        @if ($bus->foto)
                                            <img src="{{ asset($bus->foto) }}" alt="Logo" width="150">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td><a href="{{ route('bus.edit', $bus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <div>
                                    Data Kosong
                                </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('after-script')
    <!-- App js -->
    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>

    <script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('') }}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ asset('') }}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ asset('') }}assets/libs/feather-icons/feather.min.js"></script>



    <script src="{{ asset('') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('') }}assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('') }}assets/js/pages/datatables.init.js"></script>


    <script>
        "use strict";
        $(document).ready(function() {
            // Initialize DataTable
            var table = $("#datatable-buttons2").DataTable({
                lengthChange: false,
                buttons: ["copy", "excel", "pdf"]
            });

            // Add buttons to the table
            table.buttons().container().appendTo("#datatable-buttons2_wrapper .col-md-6:eq(0)");

            // Adjust the appearance of the table length selector
            $("#datatable-buttons2_length select[name*='datatable_length']").addClass("form-select form-select-sm")
                .removeClass("custom-select custom-select-sm");
            $(".dataTables_length label").addClass("form-label");
        });
    </script>

    {{-- <script>
        let table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            orderable: true,
            ajax: "{{ route('bus.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'nopol',
                    name: 'nopol',
                    // orderable: false
                },
                {
                    data: 'tipe',
                    name: 'tipe'
                },
                {
                    data: 'merek',
                    name: 'merek'
                },
                {
                    data: 'kapasitas',
                    name: 'kapasitas'
                },
                {
                    data: 'jenis_kendaraan',
                    name: 'rojenis_kendaraanle'
                },

            ],
            order: [
                [5, 'asc']
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });
    </script> --}}
@endpush
