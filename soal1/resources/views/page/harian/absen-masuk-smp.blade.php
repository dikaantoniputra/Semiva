@extends('layout.master')

@section('title')
    Tambah Buku Pelajaran
@endsection

@push('after-style')
<link href="{{ asset('') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Lihat Absen Masuk </h4>
                  
            
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>  
                                <th>Nama</th>  
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Guru</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($absenMasuk as $absenMasuk)
                            @php
                                    $days = [
                                        'Sunday' => 'Minggu',
                                        'Monday' => 'Senin',
                                        'Tuesday' => 'Selasa',
                                        'Wednesday' => 'Rabu',
                                        'Thursday' => 'Kamis',
                                        'Friday' => 'Jumat',
                                        'Saturday' => 'Sabtu'
                                    ];
                                    $dayName = $days[$absenMasuk->created_at->format('l')];
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absenMasuk->user->name }}</td>
    
                                    <td>{{ $absenMasuk->created_at->format('H:i') }}</td>

                                    <td>
                                        @if ($absenMasuk->status == 0)
                                            Masuk
                                        @elseif($absenMasuk->status == 1)
                                            Di Tolak
                                        
                                        @else
                                        @endif
                                    </td>
                                   
                                    <td>
                                        @if(isset($absenMasuk->gambar))
                                        <!-- Thumbnail Image -->
                                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenMasuk->gambar) }}" alt="Gambar Absen" style="width: 30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $absenMasuk->id }}">
    
                                        <!-- Modal -->
    
                                        @endif
    
                                    </td>
    
                                    </tr>
                                    <div class="modal fade" id="imageModal{{ $absenMasuk->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Gambar Absen</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="{{ asset('gambar/' . $absenMasuk->gambar) }}" alt="Gambar Absen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Lihat Absen Pulang </h4>
                  
            
                        <table id="datatable-buttons2" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>  
                                <th>Nama</th>  
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Guru</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($absenPulang as $absenPulang)
                            @php
                                    $days = [
                                        'Sunday' => 'Minggu',
                                        'Monday' => 'Senin',
                                        'Tuesday' => 'Selasa',
                                        'Wednesday' => 'Rabu',
                                        'Thursday' => 'Kamis',
                                        'Friday' => 'Jumat',
                                        'Saturday' => 'Sabtu'
                                    ];
                                    $dayName = $days[$absenPulang->created_at->format('l')];
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absenPulang->user->name }}</td>
    
                                    <td>{{ $absenPulang->created_at->format('H:i') }}</td>

                                    <td>
                                        @if ($absenPulang->status == 0)
                                            Masuk
                                        @elseif($absenPulang->status == 1)
                                            Di Tolak
                                        
                                        @else
                                        @endif
                                    </td>
                                   
                                    <td>
                                        @if(isset($absenPulang->gambar))
                                        <!-- Thumbnail Image -->
                                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="Gambar Absen" style="width: 30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $absenPulang->id }}">
    
                                        <!-- Modal -->
    
                                        @endif
    
                                    </td>
    
                                    </tr>
                                    <div class="modal fade" id="imageModal{{ $absenPulang->id }}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Gambar Absen</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="{{ asset('gambar/' . $absenPulang->gambar) }}" alt="Gambar Absen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    $("#datatable-buttons2_length select[name*='datatable_length']").addClass("form-select form-select-sm").removeClass("custom-select custom-select-sm");
    $(".dataTables_length label").addClass("form-label");
});
</script>



@endpush
