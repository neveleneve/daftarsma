<div class="row mb-3 justify-content-center">
    <div class="col-10">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a class="nav-link{{ Request::is('dashboard*') ? ' active fw-bold' : ' text-dark' }}"
                    href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            @level('casis')
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('pendaftaran*') ? ' active fw-bold' : ' text-dark' }}"
                        href="{{ route('pendaftaran') }}">Pendaftaran</a>
                </li>
            @endlevel

            @level('alladmin')
                @level('superadmin')
                    <li class="nav-item">
                        <a class="nav-link{{ Request::is('administrator*') ? ' active fw-bold' : ' text-dark' }}"
                            href="{{ route('administrator') }}">Administrator</a>
                    </li>
                @endlevel
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('daftar-siswa*') ? ' active fw-bold' : ' text-dark' }}"
                        href="{{ route('siswa') }}">Daftar Calon Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('laporan*') ? ' active fw-bold' : ' text-dark' }}"
                        href="{{ route('laporan') }}">Laporan</a>
                </li>
            @endlevel

        </ul>
    </div>
</div>
