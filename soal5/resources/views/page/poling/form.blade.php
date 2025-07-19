<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Data Polings</h2>
                            <div class="row">



                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">judul</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="nopol"
                                        name="nopol" value="{{ $bus->nopol ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">deskripsi</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="tahun_pembuatan" name="tahun_pembuatan"
                                        value="{{ $bus->tahun_pembuatan ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">tanggal_mulai</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="tipe"
                                        name="tipe" value="{{ $bus->tipe ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">tanggal_selesai</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $bus->merek ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">opsi 1</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $bus->merek ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">opsi 2</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $bus->merek ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">opsi 3</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $bus->merek ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">opsi 4</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $bus->merek ?? '' }}" required>
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
