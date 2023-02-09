<div>
    @push('blade')
        @include('layouts.usernav')
    @endpush
    @if (Auth::user()->level == '0')
        <div class="row justify-content-center mb-3">
            <div class="row justify-content-center mb-0 mb-md-3">
                <div class="col-12 mb-3 mb-md-0">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <h5 class="fw-bold">Jumlah Pendaftar Calon Siswa T.A. {{ $tahunajaranselected }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 m-2 font-weight-bold text-gray-800">
                                        {{ $pendaftar }} Pendaftar
                                    </div>
                                </div>
                                <div class="col-auto m-2">
                                    <i class="fas fa-users fa-4x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center mb-3">
            <div class="col-12">
                <select name="tahunajar" id="tahunajar" class="form-select" wire:model='tahunajaranselected'>
                    <option disabled>Pilih Tahun Ajaran</option>
                    @for ($i = 0; $i < count($tahunajaran); $i++)
                        <option {{ $i == 0 ? 'selected' : null }} value="{{ $tahunajaran[$i] }}">
                            {{ $tahunajaran[$i] }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="row justify-content-center mb-0 mb-md-3">
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h5 class="fw-bold">Jumlah Pendaftar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h3 m-2 font-weight-bold text-gray-800">
                                    {{ $pendaftar }} Pendaftar
                                </div>
                            </div>
                            <div class="col-auto m-2">
                                <i class="fas fa-users fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-header bg-success text-light">
                        <h5 class="fw-bold">Jumlah Pendaftar Terverifikasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h3 m-2 font-weight-bold text-gray-800">
                                    {{ $verifikasi }} Pendaftar Terverifikasi
                                </div>
                            </div>
                            <div class="col-auto m-2">
                                <i class="fas fa-check fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
