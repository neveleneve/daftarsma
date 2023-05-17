<div>
    <div class="row justify-content-center my-3">
        <div class="col-10">
            <ul class="nav nav-pills justify-content-center" id="datacasis" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold active" id="data-daftar-tab" data-bs-toggle="pill"
                        data-bs-target="#data-daftar-pill" type="button" role="tab" wire:ignore.self
                        wire:click='refreshData("{{ $datadaftar['id_daftar'] }}")'>
                        Data Daftar
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="data-diri-tab" data-bs-toggle="pill"
                        data-bs-target="#data-diri-pill" type="button" role="tab" wire:ignore.self
                        wire:click='refreshData("{{ $datadaftar['id_daftar'] }}")'>
                        Data Diri
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="data-ayah-tab" data-bs-toggle="pill"
                        data-bs-target="#data-ayah-pill" type="button" role="tab" wire:ignore.self
                        wire:click='refreshData("{{ $datadaftar['id_daftar'] }}")'>
                        Data Ayah
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold" id="data-ibu-tab" data-bs-toggle="pill"
                        data-bs-target="#data-ibu-pill" type="button" role="tab" wire:ignore.self
                        wire:click='refreshData("{{ $datadaftar['id_daftar'] }}")'>
                        Data Ibu
                    </button>
                </li>
                @if ($datadiri['tinggal_bersama_ortu'] == 'tidak')
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold" id="data-wali-tab" data-bs-toggle="pill"
                            data-bs-target="#data-wali-pill" type="button" role="tab" wire:ignore.self
                            wire:click='refreshData("{{ $datadaftar['id_daftar'] }}")'>
                            Data Wali
                        </button>
                    </li>
                @endif
            </ul>
            <hr class="mb-0">
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-6 col-md-10 d-grid gap-2 mb-0 mb-md-3">
            <a class="btn btn-danger fw-bold" href="{{ route('siswa') }}">Kembali</a>
        </div>
        @level('admin')
            <div class="col-6 col-md-10 d-grid gap-2">
                @if ($datadaftar['verifikasi'] == 0)
                    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalverifikasi">
                        Verifikasi
                    </button>
                @else
                    <button class="btn btn-success fw-bold disabled">Sudah Verifikasi</button>
                @endif
            </div>
        @endlevel
    </div>
    <div class="tab-content" id="pills-content">
        <div class="tab-pane fade show active" id="data-daftar-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Data Pendaftaran</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">ID Pendaftaran</td>
                                        <td>{{ $datadaftar['id_daftar'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tahun Ajaran</td>
                                        <td>{{ $datadaftar['tahun_ajaran'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-diri-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Data Diri</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Nama Lengkap</td>
                                        <td>{{ ucwords($datadiri['nama']) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jenis Kelamin</td>
                                        <td>{{ $datadiri['jenis_kelamin'] == '' ? '(Belum Diisi)' : ucwords($datadiri['jenis_kelamin']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Agama</td>
                                        <td>
                                            {{ $datadiri['agama'] == '' ? '(Belum Diisi)' : ucwords($datadiri['agama']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nomor Induk Siswa Nasional</td>
                                        <td>{{ $datadiri['nisn'] == '' ? '(Belum Diisi)' : $datadiri['nisn'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nomor Induk Kependudukan</td>
                                        <td>{{ $datadiri['nik'] == '' ? '(Belum Diisi)' : $datadiri['nik'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Kontak</td>
                                        <td>{{ $datadiri['kontak'] == '' ? '(Belum Diisi)' : $datadiri['kontak'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tempat Lahir</td>
                                        <td>{{ $datadiri['tempat_lahir'] == '' ? '(Belum Diisi)' : ucwords($datadiri['tempat_lahir']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tanggal Lahir</td>
                                        <td>{{ $datadiri['tanggal_lahir'] == '' ? '(Belum Diisi)' : $this->ubahTanggal($datadiri['tanggal_lahir']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Berkebutuhan Khusus?</td>
                                        <td>
                                            {{ $datadiri['kebutuhan_khusus'] == '' ? '(Belum Diisi)' : ucwords($datadiri['kebutuhan_khusus']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tinggal Bersama Orang Tua?</td>
                                        <td>
                                            {{ $datadiri['tinggal_bersama_ortu'] == '' ? '(Belum Diisi)' : ucwords($datadiri['tinggal_bersama_ortu']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat Tinggal</td>
                                        <td>{{ $datadiri['alamat'] == '' ? '(Belum Diisi)' : $datadiri['alamat'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nilai Rata-rata</td>
                                        <td>{{ $datadiri['nilai_ijazah'] == '' ? '(Belum Diisi)' : $datadiri['nilai_ijazah'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Ijazah</td>
                                        <td>
                                            @if ($ijazah['exist'] == true)
                                                <button class="btn btn-sm btn-primary fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#modalijazah">
                                                    Lihat
                                                </button>
                                            @else
                                                (Belum Diupload)
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Pas Foto</td>
                                        <td>
                                            @if ($pasfoto['exist'] == true)
                                                <button class="btn btn-sm btn-primary fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#modalpasfoto">
                                                    Lihat
                                                </button>
                                            @else
                                                (Belum Diupload)
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-ayah-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Data Ayah</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Nama Lengkap</td>
                                        <td>{{ $dataayah['nama'] == '' ? '(Belum Diisi)' : $dataayah['nama'] }}
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nomor Induk Kependudukan</td>
                                        <td>{{ $dataayah['nik'] == '' ? '(Belum Diisi)' : $dataayah['nik'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Kontak</td>
                                        <td>{{ $dataayah['kontak'] == '' ? '(Belum Diisi)' : $dataayah['kontak'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Pendidikan Terakhir</td>
                                        <td>{{ $this->pendidikan($dataayah['pendidikan']) == '' ? '(Belum Diisi)' : $this->pendidikan($dataayah['pendidikan']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Penghasilan per Bulan</td>
                                        <td>{{ $this->penghasilan($dataayah['penghasilan']) == '' ? '(Belum Diisi)' : $this->penghasilan($dataayah['penghasilan']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Pekerjaan</td>
                                        <td>{{ $dataayah['pekerjaan'] == '' ? '(Belum Diisi)' : ucwords($dataayah['pekerjaan']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat</td>
                                        <td>{{ $dataayah['alamat'] == '' ? '(Belum Diisi)' : $dataayah['alamat'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="data-ibu-pill" role="tabpanel" tabindex="0" wire:ignore.self>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Data Ibu</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Nama Lengkap</td>
                                        <td>{{ $dataibu['nama'] == '' ? '(Belum Diisi)' : $dataibu['nama'] }}
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nomor Induk Kependudukan</td>
                                        <td>{{ $dataibu['nik'] == '' ? '(Belum Diisi)' : $dataibu['nik'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Kontak</td>
                                        <td>{{ $dataibu['kontak'] == '' ? '(Belum Diisi)' : $dataibu['kontak'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Pendidikan Terakhir</td>
                                        <td>{{ $this->pendidikan($dataibu['pendidikan']) == '' ? '(Belum Diisi)' : $this->pendidikan($dataibu['pendidikan']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Penghasilan per Bulan</td>
                                        <td>{{ $this->penghasilan($dataibu['penghasilan']) == '' ? '(Belum Diisi)' : $this->pendidikan($dataibu['penghasilan']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Pekerjaan</td>
                                        <td>{{ $dataibu['pekerjaan'] == '' ? '(Belum Diisi)' : ucwords($dataibu['pekerjaan']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat</td>
                                        <td>{{ $dataibu['alamat'] == '' ? '(Belum Diisi)' : $dataibu['alamat'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($datadiri['tinggal_bersama_ortu'] == 'tidak')
            <div class="tab-pane fade" id="data-wali-pill" role="tabpanel" tabindex="0" wire:ignore.self>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">Data Wali</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Nama Lengkap</td>
                                            <td>{{ $datawali['nama'] == '' ? '(Belum Diisi)' : $datawali['nama'] }}
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Nomor Induk Kependudukan</td>
                                            <td>{{ $datawali['nik'] == '' ? '(Belum Diisi)' : $datawali['nik'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Kontak</td>
                                            <td>{{ $datawali['kontak'] == '' ? '(Belum Diisi)' : $datawali['kontak'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Pendidikan Terakhir</td>
                                            <td>{{ $this->pendidikan($datawali['pendidikan']) == '' ? '(Belum Diisi)' : $this->pendidikan($datawali['pendidikan']) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Penghasilan per Bulan</td>
                                            <td>{{ $this->penghasilan($datawali['penghasilan']) == '' ? '(Belum Diisi)' : $this->pendidikan($datawali['penghasilan']) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Pekerjaan</td>
                                            <td>{{ $datawali['pekerjaan'] == '' ? '(Belum Diisi)' : ucwords($datawali['pekerjaan']) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Alamat</td>
                                            <td>{{ $datawali['alamat'] == '' ? '(Belum Diisi)' : $datawali['alamat'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if ($ijazah['exist'] == true)
        <div class="modal fade" id="modalijazah" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ijazah Calon Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="img-fluid img-thumbnail"
                            src="{{ asset('storage/images/ijazah/' . $this->datadaftar['id_daftar'] . '.jpg') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($pasfoto['exist'] == true)
        <div class="modal fade" id="modalpasfoto" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pas Foto Calon Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="img-fluid img-thumbnail"
                            src="{{ asset('storage/images/pas foto/' . $this->datadaftar['id_daftar'] . '.jpg') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade" id="modalverifikasi" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Verifikasi Data Calon Siswa?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <button
                        wire:click='verifikasi({{ $this->datadaftar['id'] }}, "{{ $this->datadaftar['id_daftar'] }}")'
                        type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Verifikasi
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
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
