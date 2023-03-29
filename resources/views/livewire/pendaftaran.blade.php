<div>
    @push('blade')
        @include('layouts.usernav')
    @endpush
    <div class="row mb-2 justify-content-center">
        <div class="col-10">
            <ul class="nav nav-pills justify-content-center" id="datacasis" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold active" id="data-daftar-tab" data-bs-toggle="pill"
                        data-bs-target="#data-daftar-pill" type="button" role="tab" wire:ignore.self>
                        Data Daftar
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="data-diri-tab" data-bs-toggle="pill"
                        data-bs-target="#data-diri-pill" type="button" role="tab" wire:ignore.self>
                        Data Diri
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="data-ayah-tab" data-bs-toggle="pill"
                        data-bs-target="#data-ayah-pill" type="button" role="tab" wire:ignore.self>
                        Data Ayah
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="data-ibu-tab" data-bs-toggle="pill"
                        data-bs-target="#data-ibu-pill" type="button" role="tab" wire:ignore.self>
                        Data Ibu
                    </button>
                </li>
                <li class="nav-item" role="presentation"
                    {{ $datadiri['tinggal_bersama_ortu'] == '' || $datadiri['tinggal_bersama_ortu'] == null || $datadiri['tinggal_bersama_ortu'] == 'ya' ? 'hidden' : null }}>
                    <button class="nav-link fw-bold" id="data-wali-tab" data-bs-toggle="pill"
                        data-bs-target="#data-wali-pill" type="button" role="tab" wire:ignore.self>
                        Data Wali
                    </button>
                </li>
            </ul>
            <hr class="mb-0">
        </div>
    </div>
    <div class="tab-content" id="pills-content">
        <div class="tab-pane fade show active" id="data-daftar-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-light">
                            <h4 class="fw-bold text-center">Data Pendaftaran Calon Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="tahun_ajaran" class="fw-bold">Tahun Ajaran
                                        <span data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="Pilih tahun ajaran yang akan didaftarkan">
                                            <i class="fa-xs fa-regular fa-circle-question"></i>
                                        </span>
                                    </label>
                                    <select id="tahun_ajaran" class="form-select" wire:model='datadaftar.tahun_ajaran'>
                                        <option value="" selected hidden>Pilih Tahun Ajaran</option>
                                        @for ($i = 0; $i < 5; $i++)
                                            <option value="{{ $tahunajar[$i] }}">{{ $tahunajar[$i] }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="id_pendaftaran" class="fw-bold">ID Pendaftaran
                                        <span data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="ID pendaftaran didapat ketika anda mendaftar akun">
                                            <i class="fa-xs fa-regular fa-circle-question"></i>
                                        </span>
                                    </label>
                                    <input type="text" id="id_pendaftaran" class="form-control" readonly
                                        wire:model='datadaftar.id_daftar'>
                                </div>
                                <div class="col-12 d-grid gap-2">
                                    <button class="btn btn-primary fw-bold" wire:click='store(5)'>
                                        Simpan Data Pendaftaran
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-diri-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-light">
                            <h4 class="fw-bold text-center">Data Diri Calon Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="nama" class="fw-bold">Nama Lengkap</label>
                                    <input type="text" id="nama" class="form-control"
                                        placeholder="Nama Lengkap" wire:model='datadiri.nama'>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="jenis_kelamin" class="fw-bold">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" class="form-select"
                                        wire:model='datadiri.jenis_kelamin'>
                                        <option value="" selected hidden>Pilih Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="kontak" class="fw-bold">Kontak</label>
                                    <input type="text" id="kontak" class="form-control" maxlength="15"
                                        wire:model='datadiri.kontak' placeholder="Kontak"
                                        onkeypress="return isNumber(event)">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="nisn" class="fw-bold">Nomor Induk Siswa Nasional</label>
                                    <input type="text" id="nisn" class="form-control"
                                        wire:model='datadiri.nisn' maxlength="10" onkeypress="return isNumber(event)"
                                        placeholder="Nomor Induk Siswa Nasional">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="nik" class="fw-bold">Nomor Induk Kependudukan</label>
                                    <input type="text" id="nik" class="form-control"
                                        wire:model='datadiri.nik' maxlength="16" onkeypress="return isNumber(event)"
                                        placeholder="Nomor Induk Kependudukan">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="tempat_lahir" class="fw-bold">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" class="form-control"
                                        placeholder="Tempat Lahir" wire:model='datadiri.tempat_lahir'>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="tanggal_lahir" class="fw-bold">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" class="form-control"
                                        placeholder="Tanggal Lahir" wire:model='datadiri.tanggal_lahir'>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="agama" class="fw-bold">Agama</label>
                                    <select id="agama" class="form-select" wire:model='datadiri.agama'>
                                        <option value="" selected hidden>Pilih Agama</option>
                                        <option value="islam">Islam</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="protestan">Protestan</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="hindu">Hindu</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="kebutuhan_khusus" class="fw-bold">Kebutuhan Khusus?</label>
                                    <select id="kebutuhan_khusus" class="form-select"
                                        wire:model='datadiri.kebutuhan_khusus'>
                                        <option value="" selected hidden>Pilih Opsi Kebutuhan Khusus</option>
                                        <option value="tidak">Tidak</option>
                                        <option value="ya">Ya</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="tinggal_bersama_ortu" class="fw-bold">Tinggal Bersama Orang
                                        Tua?</label>
                                    <select id="tinggal_bersama_ortu" class="form-select"
                                        wire:model='datadiri.tinggal_bersama_ortu'>
                                        <option value="" selected hidden>Pilih Opsi Tinggal Bersama Orang Tua
                                        </option>
                                        <option value="tidak">Tidak</option>
                                        <option value="ya">Ya</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="datapasphoto" class="fw-bold">Pas Foto (3x4) <span
                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="- File dengan format '.jpg' atau '.png'.&#010;- Ukuran file harus kurang dari 1Mb.&#010;- Dimensi pas foto harus 3x4.">
                                            <i class="fa-xs fa-regular fa-circle-question"></i>
                                        </span></label>
                                    <div class="input-group">
                                        <input type="file" id="datapasphoto" class="form-control"
                                            wire:model='datapasphoto' accept="image/png, image/jpeg">
                                        @if ($pasphoto['file_exist'] == true)
                                            <button class="btn btn-outline-primary fw-bold" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalpasfoto">
                                                Lihat Gambar
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="dataijazah" class="fw-bold">Foto Ijazah <span
                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="- File dengan format '.jpg' atau '.png'.&#010;- Ukuran file harus kurang dari 1Mb.">
                                            <i class="fa-xs fa-regular fa-circle-question"></i>
                                        </span></label>
                                    <div class="input-group">
                                        <input type="file" id="dataijazah" class="form-control"
                                            wire:model='dataijazah' accept="image/png, image/jpeg">
                                        @if ($ijazah['file_exist'] == true)
                                            <button class="btn btn-outline-primary fw-bold" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalijazah">
                                                Lihat Gambar
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nilai_ijazah" class="fw-bold">Nilai Rata-rata Terakhir</label>
                                    <input type="text" id="nilai_ijazah" class="form-control"
                                        wire:model='datadiri.nilai_ijazah' onkeypress="return isFloat(event)"
                                        placeholder="Nilai Ijazah">

                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamat" class="fw-bold">Alamat Tinggal</label>
                                    <textarea id="alamat" class="form-control" rows="3" placeholder="Alamat Tinggal"
                                        wire:model='datadiri.alamat'></textarea>
                                </div>
                                <div class="col-12 d-grid gap-2">
                                    <button class="btn btn-primary fw-bold" wire:click='store(4)'>
                                        Simpan Data Diri
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-ayah-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-light">
                            <h4 class="fw-bold text-center">Data Ayah</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="namaayah" class="fw-bold">Nama Lengkap</label>
                                    <input type="text" id="namaayah" class="form-control"
                                        placeholder="Nama Lengkap" wire:model='dataayah.nama'>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="nikayah" class="fw-bold">Nomor Induk Kependudukan</label>
                                    <input type="text" id="nikayah" class="form-control" maxlength="16"
                                        onkeypress="return isNumber(event)" wire:model='dataayah.nik'
                                        placeholder="Nomor  Induk Kependudukan">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="kontakayah" class="fw-bold">Kontak</label>
                                    <input type="text" id="kontakayah" class="form-control" maxlength="15"
                                        wire:model='dataayah.kontak' placeholder="Kontak"
                                        onkeypress="return isNumber(event)">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="pendidikanayah" class="fw-bold">Pendidikan Terakhir</label>
                                    <select id="pendidikanayah" class="form-select" wire:model='dataayah.pendidikan'>
                                        <option value="" selected hidden>Pilih Pendidikan Terakhir</option>
                                        <option value="tidak sekolah">Tidak Pernah Sekolah</option>
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA</option>
                                        <option value="d1">D1</option>
                                        <option value="d3">D3</option>
                                        <option value="s1">S1</option>
                                        <option value="s2">S2</option>
                                        <option value="s3">S3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="pekerjaanayah" class="fw-bold">Pekerjaan</label>
                                    <input type="text" id="pekerjaanayah" class="form-control"
                                        wire:model='dataayah.pekerjaan' placeholder="Pekerjaan">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="penghasilanayah" class="fw-bold">Penghasilan per Bulan</label>
                                    <select id="penghasilanayah" class="form-select"
                                        wire:model='dataayah.penghasilan'>
                                        <option value="" selected hidden>Pilih Penghasilan per Bulan</option>
                                        <option value="tidak ada">Tidak Ada</option>
                                        <option value="<500k">Dibawah Rp 500.000</option>
                                        <option value="500k-1.5jt">Rp 500.000 - Rp 1.499.000</option>
                                        <option value="1.5jt-3jt">Rp 1.500.000 - Rp 3.000.000</option>
                                        <option value=">3jt">Diatas 3.000.000</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamatayah" class="fw-bold">Alamat</label>
                                    <textarea id="alamatayah" class="form-control" rows="3" placeholder="Alamat" wire:model='dataayah.alamat'></textarea>
                                </div>
                                <div class="col-12 d-grid gap-2">
                                    <button class="btn btn-primary fw-bold" wire:click='store(1)'>
                                        Simpan Data Ayah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-ibu-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-light">
                            <h4 class="fw-bold text-center">Data Ibu</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="namaibu" class="fw-bold">Nama Lengkap</label>
                                    <input type="text" id="namaibu" class="form-control"
                                        placeholder="Nama Lengkap" wire:model='dataibu.nama'>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="nikibu" class="fw-bold">Nomor Induk Kependudukan</label>
                                    <input type="text" id="nikibu" class="form-control" maxlength="16"
                                        onkeypress="return isNumber(event)" wire:model='dataibu.nik'
                                        placeholder="Nomor Induk Kependudukan">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="kontakibu" class="fw-bold">Kontak</label>
                                    <input type="text" id="kontakibu" class="form-control" maxlength="15"
                                        wire:model='dataibu.kontak' placeholder="Kontak"
                                        onkeypress="return isNumber(event)">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="pendidikanibu" class="fw-bold">Pendidikan Terakhir</label>
                                    <select id="pendidikanibu" class="form-select" wire:model='dataibu.pendidikan'>
                                        <option value="" selected hidden>Pilih Pendidikan Terakhir</option>
                                        <option value="tidak sekolah">Tidak Pernah Sekolah</option>
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA</option>
                                        <option value="d1">D1</option>
                                        <option value="d3">D3</option>
                                        <option value="s1">S1</option>
                                        <option value="s2">S2</option>
                                        <option value="s3">S3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="pekerjaanibu" class="fw-bold">Pekerjaan</label>
                                    <input type="text" id="pekerjaanibu" class="form-control"
                                        wire:model='dataibu.pekerjaan' placeholder="Pekerjaan">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="penghasilanibu" class="fw-bold">Penghasilan per Bulan</label>
                                    <select id="penghasilanibu" class="form-select" wire:model='dataibu.penghasilan'>
                                        <option value="" selected hidden>Pilih Penghasilan per Bulan</option>
                                        <option value="tidak ada">Tidak Ada</option>
                                        <option value="<500k">Dibawah Rp 500.000</option>
                                        <option value="500k-1.5jt">Rp 500.000 - Rp 1.499.000</option>
                                        <option value="1.5jt-3jt">Rp 1.500.000 - Rp 3.000.000</option>
                                        <option value=">3jt">Diatas 3.000.000</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamatibu" class="fw-bold">Alamat</label>
                                    <textarea id="alamatibu" class="form-control" rows="3" placeholder="Alamat" wire:model='dataibu.alamat'></textarea>
                                </div>
                                <div class="col-12 d-grid gap-2">
                                    <button class="btn btn-primary fw-bold" wire:click='store(2)'>
                                        Simpan Data Ibu
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-wali-pill" role="tabpanel" tabindex="0"
            {{ $datadiri['tinggal_bersama_ortu'] == '' || $datadiri['tinggal_bersama_ortu'] == null || $datadiri['tinggal_bersama_ortu'] == 'ya' ? 'hidden' : null }}>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-light">
                            <h4 class="fw-bold text-center">Data Wali</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="namawali" class="fw-bold">Nama Lengkap</label>
                                    <input type="text" id="namawali" class="form-control"
                                        placeholder="Nama Lengkap" wire:model='datawali.nama'>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="nikwali" class="fw-bold">Nomor Induk Kependudukan</label>
                                    <input type="text" id="nikwali" class="form-control" maxlength="16"
                                        onkeypress="return isNumber(event)" wire:model='datawali.nik'
                                        placeholder="Nomor Induk Kependudukan">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="kontakwali" class="fw-bold">Kontak</label>
                                    <input type="text" id="kontakwali" class="form-control" maxlength="15"
                                        wire:model='datawali.kontak' placeholder="Kontak"
                                        onkeypress="return isNumber(event)">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="pendidikanwali" class="fw-bold">Pendidikan Terakhir</label>
                                    <select id="pendidikanwali" class="form-select" wire:model='datawali.pendidikan'>
                                        <option value="" selected hidden>Pilih Pendidikan Terakhir</option>
                                        <option value="tidak sekolah">Tidak Pernah Sekolah</option>
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA</option>
                                        <option value="d1">D1</option>
                                        <option value="d3">D3</option>
                                        <option value="s1">S1</option>
                                        <option value="s2">S2</option>
                                        <option value="s3">S3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="pekerjaanwali" class="fw-bold">Pekerjaan</label>
                                    <input type="text" id="pekerjaanwali" class="form-control"
                                        wire:model='datawali.pekerjaan' placeholder="Pekerjaan">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label for="penghasilanwali" class="fw-bold">Penghasilan per Bulan</label>
                                    <select id="penghasilanwali" class="form-select"
                                        wire:model='datawali.penghasilan'>
                                        <option value="" selected hidden>Pilih Penghasilan per Bulan</option>
                                        <option value="tidak ada">Tidak Ada</option>
                                        <option value="<500k">Dibawah Rp 500.000</option>
                                        <option value="500k-1.5jt">Rp 500.000 - Rp 1.499.000</option>
                                        <option value="1.5jt-3jt">Rp 1.500.000 - Rp 3.000.000</option>
                                        <option value=">3jt">Diatas 3.000.000</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamatwali" class="fw-bold">Alamat</label>
                                    <textarea id="alamatwali" class="form-control" rows="3" placeholder="Alamat" wire:model='datawali.alamat'></textarea>
                                </div>
                                <div class="col-12 d-grid gap-2">
                                    <button class="btn btn-primary fw-bold" wire:click='store(3)'>
                                        Simpan Data Wali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @php
        print_r($ijazah);
        echo '<br>';
        print_r($pasphoto);
    @endphp --}}
    @if ($pasphoto['file_exist'] == true)
        <div class="modal fade" id="modalpasfoto" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pas Foto Calon Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="img-fluid img-thumbnail" src="{{ $pasphoto['file_name'] }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($ijazah['file_exist'] == true)
        <div class="modal fade" id="modalijazah" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ijazah Calon Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="img-fluid img-thumbnail" src="{{ $ijazah['file_name'] }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @push('js')
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script>
            function isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }

            function isFloat(evt) {
                var theEvent = evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
                if (key.length == 0) return;
                var regex = /^[0-9.\b]+$/;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault) theEvent.preventDefault();
                }
            }
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            window.addEventListener('alert', ({
                detail: {
                    type,
                    message
                }
            }) => {
                Toast.fire({
                    icon: type,
                    title: message
                })
            });
        </script>
    @endpush
</div>
