<div>
    @push('blade')
        @include('layouts.usernav')
    @endpush
    <div class="row justify-content-center mb-0 mb-md-3">
        <div class="col-12 col-md-4 mb-3 mb-md-0">
            <input type="text" class="form-control" placeholder="Pencarian..." wire:model='pencarian'>
        </div>
        <div class="col-12 col-md-2"></div>
        <div class="col-12 col-md-4 mb-3 mb-md-0 d-grid gap-2">
            <button class="btn btn-sm btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#tambahcasis">
                Tambah Calon Siswa
            </button>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="row justify-content-center erroralert">
            <div class="col-10">
                <div class="alert alert-{{ session('color') }}">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-10">
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datacasis as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ ucwords(strtolower($item->name)) }}</td>
                            <td>{{ $item->username }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning fw-bold" wire:loading.attr='disabled'
                                    wire:click='viewData({{ $item->id }})'>
                                    <span class="d-none d-md-inline">
                                        View
                                    </span>
                                    <i class="d-inline d-md-none fa fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <h3 class="fw-bold">Data Calon Siswa</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="tambahcasis" data-bs-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Calon Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='eraseText'></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="iddaftar" class="fw-bold">ID Pendaftaran</label>
                            <input type="text" class="form-control mb-3" placeholder="ID Pendaftaran" id="iddaftar"
                                wire:model='casisadd.id_daftar' readonly>
                            <label for="nama" class="fw-bold">Nama Calon Siswa</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Calon Siswa"
                                id="nama" wire:model.lazy='casisadd.nama'>
                            <label for="jeniskelamin" class="fw-bold">Jenis Kelamin</label>
                            <select id="jeniskelamin" class="form-select mb-3" wire:model.lazy='casisadd.kelamin'>
                                <option selected hidden>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <label for="nik" class="fw-bold">NIK Calon Siswa</label>
                            <input type="text" class="form-control mb-3" placeholder="NIK Calon Siswa" id="nik"
                                wire:model.lazy='casisadd.nik'>
                            <label for="nisn" class="fw-bold">NISN Calon Siswa</label>
                            <input type="text" class="form-control mb-3" placeholder="NISN Calon Siswa"
                                id="nisn" wire:model.lazy='casisadd.nisn'>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal"
                        wire:click='eraseText'>
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary fw-bold" data-bs-dismiss="modal" wire:click='store'>
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            Livewire.on('alertremove', () => {
                setTimeout(function() {
                    $('.erroralert').fadeOut('slow', 'swing');
                }, 3000);
            });
        </script>
    @endpush
</div>
