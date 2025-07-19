<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah User</h2>
        <div class="card-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">name<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="nik"
                        name="name" placeholder="name" value="{{ $user->name ?? '' }}" />

                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">username<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="name"
                        name="username" placeholder="username" value="{{ $user->username ?? '' }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">password<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="password" name="password" type="password" placeholder="password"
                            class="form-control" value="" />
                        <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password"><i
                                class="far fa-eye"></i></button>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Kategori<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <select class="form-select" name="kategori">
                        <option selected>Kategori Pegawai</option>
                        <option value="tk">TK</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                        <option value="yayasan">YAYASAN</option>
                    </select>
                </div>
            </div>



            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Jenis Akun <span
                        class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="guru" <?php echo isset($user) && $user->role === 'guru' ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio1">Guru</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="kepala-sekolah" <?php echo isset($user) && $user->role === 'kepala-sekolah' ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio2">Kepala Sekolah</label>
                    </div>
                   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                            value="karyawan" <?php echo isset($user) && $user->role === 'karyawan' ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio4">Karyawan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5"
                            value="yayasan" <?php echo isset($user) && $user->role === 'yayasan' ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="inlineRadio5">(yayasan)</label>
                    </div>

                </div>
            </div>







            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Status Akun <span
                        class="text-danger">*</span></label>
                <div class="col-7">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                            value="0" <?php echo isset($user) && $user->status === '0' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                            value="1" <?php echo isset($user) && $user->status === '1' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineRadio2">Non Aktif</label>
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
