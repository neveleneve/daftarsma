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
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>ID Pendaftaran</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datacasis as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->id_daftar }}</td>
                            <td>{{ ucwords(strtolower($item->nama)) }}</td>
                            <td>{{ $item->verifikasi == '0' ? 'Belum Verifkasi' : 'Sudah Verifikasi' }}</td>
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
                                <h3 class="fw-bold">Data Calon Siswa</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
