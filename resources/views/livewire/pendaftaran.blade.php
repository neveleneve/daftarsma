<div>
    @push('blade')
        @include('layouts.usernav')
    @endpush
    <div class="row justify-content-center my-3">
        <div class="col-12 col-md-10">
            <div class="card mb-3">
                <div class="card-header bg-primary text-light">
                    <h4 class="fw-bold text-center">Data Pendaftaran Calon Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="tahun_ajaran" class="fw-bold">Tahun Ajaran
                                <span data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Pilih tahun ajaran yang akan didaftarkan">
                                    <i class="fa-xs fa-regular fa-circle-question"></i>
                                </span>
                            </label>
                            <select id="tahun_ajaran" class="form-select" wire:model='datadaftar.tahun_ajaran'>
                                <option disabled hidden>Pilih Tahun Ajaran</option>
                                @for ($i = 0; $i < 5; $i++)
                                    <option value="{{ $tahunajar[$i] }}">{{ $tahunajar[$i] }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="id_pendaftaran" class="fw-bold">ID Pendaftaran
                                <span data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="ID pendaftaran didapat ketika anda mendaftar akun">
                                    <i class="fa-xs fa-regular fa-circle-question"></i>
                                </span>
                            </label>
                            <input type="text" id="id_pendaftaran" class="form-control" readonly
                                wire:model='datadaftar.id_daftar'>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4 class="fw-bold text-center">Data Diri Calon Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nama" class="fw-bold">Nama Lengkap</label>
                            <input type="text" id="nama" class="form-control" readonly
                                placeholder="Nama Calon Siswa" wire:model='datadiri.nama'>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="jenis_kelamin" class="fw-bold">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-select" wire:model='datadiri.jenis_kelamin'>
                                <option value="" disabled hidden>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nisn" class="fw-bold">Nomor Induk Siswa Nasional</label>
                            <input type="text" id="nisn" class="form-control" wire:model='datadiri.nisn'
                                placeholder="Nomor Induk Siswa Nasional">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nik" class="fw-bold">Nomor Induk Kependudukan</label>
                            <input type="text" id="nik" class="form-control" wire:model='datadiri.nik'
                                placeholder="Nomor Induk Kependudukan">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="tempat_lahir" class="fw-bold">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                wire:model='datadiri.tempat_lahir'>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="tanggal_lahir" class="fw-bold">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                                wire:model='datadiri.tanggal_lahir'>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="no_akta" class="fw-bold">Nomor Registrasi Akta Kelahiran</label>
                            <input type="text" id="no_akta" class="form-control"
                                placeholder="Nomor Registrasi Akta Kelahiran"
                                wire:model='datadiri.no_reg_akta_kelahiran'>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="agama" class="fw-bold">Agama</label>
                            <select id="agama" class="form-select" wire:model='datadiri.agama'>
                                <option value="" disabled hidden>Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="katolik">Katolik</option>
                                <option value="protestan">Protestan</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu">Hindu</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="kebutuhan_khusus" class="fw-bold">Kebutuhan Khusus?</label>
                            <select id="kebutuhan_khusus" class="form-select" wire:model='datadiri.kebutuhan_khusus'>
                                <option value="" disabled hidden>Pilih Opsi Kebutuhan Khusus</option>
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="tinggal_bersama_ortu" class="fw-bold">Tinggal Bersama Orang Tua?</label>
                            <select id="tinggal_bersama_ortu" class="form-select"
                                wire:model='datadiri.tinggal_dengan_ortu'>
                                <option value="" disabled hidden>Pilih Opsi Tinggal Bersama Orang Tua</option>
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
