<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Data Bus</h2>
                            <div class="row">

                                <div class="container">
                                    <div class="upload-container">
                                        <div class="upload-box" id="uploadBox">
                                            <div class="upload-content">
                                                <div class="upload-icon">
                                                    <svg width="64" height="64" viewBox="0 0 24 24"
                                                        fill="none">
                                                        <path
                                                            d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <h3 class="upload-title">Drop files here or click to upload</h3>
                                                <p class="upload-subtitle">Support for single or bulk uploads. Strictly
                                                    PNG, JPG and GIF files only.</p>
                                                <button class="upload-button" type="button">Choose Files</button>
                                                <input type="file" id="fileInput" accept="image/*" name="foto"
                                                    hidden>
                                            </div>

                                            <div class="upload-progress" id="uploadProgress">
                                                <div class="progress-circle">
                                                    <svg class="progress-ring" width="60" height="60">
                                                        <circle cx="30" cy="30" r="25" stroke="#000000"
                                                            stroke-width="4" fill="none" />
                                                        <circle class="progress-bar" cx="30" cy="30"
                                                            r="25" stroke="#f093fb" stroke-width="4" fill="none"
                                                            stroke-dasharray="157" stroke-dashoffset="157" />
                                                    </svg>
                                                    <span class="progress-text">0%</span>
                                                </div>
                                                <p class="progress-label">Uploading files...</p>
                                            </div>
                                        </div>

                                        <div class="files-preview" id="filesPreview">
                                            <div class="preview-header">
                                                <h4 class="preview-title">Selected Foto Bus</h4>

                                            </div>
                                            <div class="files-list" id="filesList">
                                                <!-- Files will be dynamically added here -->
                                            </div>
                                        </div>

                                        <div class="upload-complete" id="uploadComplete" style="display: none;">
                                            <div class="complete-header">
                                                <div class="success-icon">✓</div>
                                                <h3 class="complete-title">Upload Successful!</h3>
                                                <p class="complete-subtitle">Your files have been uploaded successfully
                                                </p>
                                            </div>
                                            <div class="complete-actions">
                                                <button class="new-upload-btn" id="newUploadBtn">Start New
                                                    Upload</button>
                                                {{-- <button class="view-files-btn" id="viewFilesBtn">View Uploaded
                                                    Files</button> --}}
                                            </div>
                                        </div>
                                        </br>
                                        </br>
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label for="inputAddress" class="form-label">Foto Bus</label>
                                    @if ($bus->foto)
                                        <img src="{{ asset($bus->foto) }}" alt="Logo"
                                            style="width: 150px; height: ">
                                    @else
                                        -
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">nopol</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="nopol"
                                        name="nopol" value="{{ $bus->nopol ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">tahun_pembuatan</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="tahun_pembuatan" name="tahun_pembuatan"
                                        value="{{ $bus->tahun_pembuatan ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">tipe</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="tipe"
                                        name="tipe" value="{{ $bus->tipe ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">merek</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="merek"
                                        name="merek" value="{{ $bus->merek ?? '' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">kapasitas</label>
                                    <input type="integer" class="form-control" id="inputAddress"
                                        placeholder="kapasitas" name="kapasitas" value="{{ $bus->kapasitas ?? '' }}"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="inputAddress" class="form-label">jenis_kendaraan</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="jenis_kendaraan" name="jenis_kendaraan"
                                        value="{{ $bus->jenis_kendaraan ?? '' }}" required>
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
