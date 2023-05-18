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
            <button class="btn btn-sm btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#tambahadmin">
                Tambah Administrator
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
                    @forelse ($datauser as $item)
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
                                <h3 class="fw-bold">Data Pengguna Kosong</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="tambahadmin" data-bs-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Administrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='eraseText'></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="email" class="fw-bold">Email Administrator</label>
                            <input type="email" class="form-control mb-3" placeholder="Email Administrator"
                                id="email" wire:model.lazy='adminadd.email'>
                            <label for="nama" class="fw-bold">Nama Administrator</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Administrator"
                                id="nama" wire:model.lazy='adminadd.nama'>
                            <label for="username" class="fw-bold">Nama Pengguna</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Pengguna" id="username"
                                wire:model.lazy='adminadd.username'>
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

    <div wire:ignore.self class="modal fade" id="editadmin" data-bs-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Administrator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='eraseText'></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="nama" class="fw-bold">Nama Administrator</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Administrator"
                                id="nama" wire:model.lazy='adminview.nama'>
                            <label for="username" class="fw-bold">Nama Pengguna</label>
                            <input type="text" class="form-control mb-3" placeholder="Nama Pengguna" id="username"
                                wire:model.lazy='adminview.username'>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal"
                        wire:click='eraseText'>
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary fw-bold" data-bs-dismiss="modal"
                        wire:click='update({{ $adminview['id'] }})'>
                        Perbarui
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
            Livewire.on('showmodal', (idmodal) => {
                $('#' + idmodal).modal('show');
            });
        </script>
    @endpush
</div>
