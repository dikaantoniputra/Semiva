<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah Absen</h2>
        <div class="card-body">
            <div class="row mb-3">
                
                <label for="inputEmail3" class="col-4 col-form-label">gambar<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="carousel-item active">
                        @if(isset($masuk->gambar))
                        <img class="d-block img-fluid" src="{{ asset('gambar/' . $masuk->gambar) }}" alt="First slide">
                        @else
                        
                        @endif
                    </div>
                    <input type="file" parsley-type="email" class="form-control" id="nik"
                        name="gambar" placeholder="name" />
                   
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">keterangan<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" parsley-type="email" class="form-control" id="name"
                        name="keterangan" placeholder="Keterangan" value="{{ $masuk->keterangan ?? '' }}" />
                </div>
            </div>

            
            <div class="row mb-3">
                <label for="inputDatetime" class="col-4 col-form-label">Jam Masuk<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="datetime-local" class="form-control" id="inputDatetime" name="created_at" placeholder="Keterangan"
                           value="{{ $masuk->created_at ? $masuk->created_at->format('Y-m-d\TH:i') : '' }}" />
                </div>
            </div>

        
            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Status Akun <span class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                            value="0" <?php echo (isset($masuk) && $masuk->status === '0') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio1">Masuk</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                            value="1" <?php echo (isset($masuk) && $masuk->status === '1') ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio2">Di Tolak</label>
                    </div>
                </div>
            </div>
            

            <div class="row mb-3">
                <div class="col-8 offset-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                </div>
            </div>
        </div><!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
