<div>
    @push('blade')
        @include('layouts.usernav')
    @endpush
    <div class="row justify-content-center my-3">
        <div class="col-12 col-md-5">
            <label for="tahunajar" class="fw-bold">Tahun Ajaran</label>
            <select id="tahunajar" class="form-select mb-3 mb-md-0" wire:model='tahunajaranselected'>
                <option disabled>Pilih Tahun Ajaran</option>
                @for ($i = 0; $i < count($tahunajaran); $i++)
                    <option {{ $i == 0 ? 'selected' : null }} value="{{ $tahunajaran[$i] }}">
                        {{ $tahunajaran[$i] }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-12 col-md-5 mb-3 mb-md-0">
            <label for="pencarian" class="fw-bold">Pencarian</label>
            <input id="pencarian" type="text" class="form-control" placeholder="Pencarian..." wire:model='pencarian'>
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
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold active" data-bs-toggle="pill" data-bs-target="#pills-unverified"
                        type="button" role="tab" wire:ignore.self>
                        Belum Verifikasi
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link fw-bold" data-bs-toggle="pill" data-bs-target="#pills-verified"
                        type="button" role="tab" wire:ignore.self>
                        Sudah Verifikasi
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-unverified" role="tabpanel" wire:ignore.self>
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>ID Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datacasis as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->id_daftar }}</td>
                                        <td>{{ ucwords(strtolower($item->nama)) }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning fw-bold"
                                                wire:click='redirecting("siswaview", "{{ $item->id_daftar }}")'>
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
                                            <h3 class="fw-bold">Data Calon Siswa Kosong</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-verified" role="tabpanel" wire:ignore.self>
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center text-nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>ID Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Nilai Ijazah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datacasisverified as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->id_daftar }}</td>
                                        <td>{{ ucwords(strtolower($item->nama)) }}</td>
                                        <td>{{ $item->nilai_ijazah }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning fw-bold"
                                                wire:click='redirecting("siswaview", "{{ $item->id_daftar }}")'>
                                                <span class="d-none d-md-inline">
                                                    View
                                                </span>
                                                <i class="d-inline d-md-none fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <h3 class="fw-bold">Data Calon Siswa Kosong</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
