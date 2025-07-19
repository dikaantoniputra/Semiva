<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Data Bus</h2>
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">foto</label>
                                    <input type="file" class="form-control" id="inputAddress" placeholder="Logo"
                                        name="foto" value="{{ $info->logo ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">nopol</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="nopol"
                                        name="nopol" value="{{ $info->nopol ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">tahun_pembuatan</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="tahun_pembuatan" name="tahun_pembuatan"
                                        value="{{ $info->tahun_pembuatan ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">tipe</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="tipe"
                                        name="tipe" value="{{ $info->tipe ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">merek</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $info->merek ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">kapasitas</label>
                                    <input type="integer" class="form-control" id="inputAddress" placeholder="kapasitas"
                                        name="kapasitas" value="{{ $info->kapasitas ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">jenis_kendaraan</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="jenis_kendaraan" name="jenis_kendaraan"
                                        value="{{ $info->nama_instansi ?? '' }}" required>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>



                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
        </div><!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
