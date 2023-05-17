<div>
    @push('blade')
        @include('layouts.usernav')
    @endpush
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">
                        Cetak Laporan
                    </h4>
                    <hr>
                    <div class="row justify-content-center my-3">
                        <div class="col-12">
                            <p class="text-center mb-0">
                                <label for="tahunajar" class="fw-bold">Tahun Ajaran</label>
                            </p>
                            <select id="tahunajar" class="form-select mb-3 mb-md-0" wire:model='tahunajaranselected'>
                                <option value="" selected hidden>Pilih Tahun Ajaran</option>
                                @for ($i = 0; $i < count($tahunajaran); $i++)
                                    <option value="{{ $tahunajaran[$i] }}">
                                        {{ $tahunajaran[$i] }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <div class="col-12">
                            <p class="text-center mb-0">
                                <label for="jenislaporan" class="fw-bold">Jenis Laporan</label>
                            </p>
                            <select id="jenislaporan" class="form-select mb-3 mb-md-0"
                                wire:model='jenislaporanselected'>
                                <option value="" selected hidden>Pilih Jenis Laporan</option>
                                <option value="semua">Semua Siswa</option>
                                <option value="verified">Calon Siswa Terverifikasi</option>
                                <option value="unverified">Calon Siswa Belum Terverifikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <div class="col-12 d-grid gap-2">
                            <button class="btn btn-primary fw-bold">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
