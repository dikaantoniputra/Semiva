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
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0">Daily Sales</h4>

                    <div class="widget-chart text-center">
                        <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                        <ul class="list-inline chart-detail-list mb-0">
                            <li class="list-inline-item">
                                <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>Series A</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #5b69bc;"><i class="fa fa-circle me-1"></i>Series B</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">Statistics</h4>
                    <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">Total Revenue</h4>
                    <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                </div>
            </div>
        </div><!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a type="submit" href="{{ route('polings.create') }}"
                        class="btn btn-primary waves-effect waves-light">Tambah Pollings</a>
                    <br>
                    </br>
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>slug</th>
                                <th>judul</th>
                                <th>deskripsi</th>
                                <th>tanggal_mulai</th>
                                <th>tanggal_selesai</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($poling as $poling)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $poling->nopol }}</td>
                                    <td>{{ $poling->tahun_pembuatan }}</td>
                                    <td>{{ $poling->tipe }}</td>
                                    <td>{{ $poling->merek }}</td>
                                    <td>{{ $poling->kapasitas }}</td>
                                    <td>{{ $poling->jenis_kendaraan }}</td>
                                    <td>
                                        @if ($poling->foto)
                                            <img src="{{ asset($poling->foto) }}" alt="Logo" width="150">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td><a href="{{ route('polings.edit', $poling->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
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
