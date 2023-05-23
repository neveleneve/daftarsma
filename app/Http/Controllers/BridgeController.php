<?php

namespace App\Http\Controllers;

use App\Models\DataAyah;
use App\Models\DataDiri;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\UserDaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;

class BridgeController extends Controller
{
    public function siswaViewBridge($id)
    {
        $data = UserDaftar::where('id_daftar', $id)
            ->count();
        if ($data == 0 || $data == null) {
            return redirect(route('siswa'));
        } else {
            return redirect(route('siswaview', ['id' => $id]));
        }
    }

    public function cetakLaporan(Request $request)
    {
        $docname = '';
        $data = null;
        $tahunajaran =  str_replace('-', ' - ', $request->tahunajar);
        if ($request->jenislaporan == 'semua') {
            $docname = 'Laporan Calon Siswa Tahun Ajaran ' . $tahunajaran;
            $data = UserDaftar::with('dataDiri')->orderBy('verifikasi', 'desc')
                ->where('tahun_ajaran', $request->tahunajar)
                ->get();
        } elseif ($request->jenislaporan == 'verified') {
            $docname = 'Laporan Calon Siswa Terverifikasi Tahun Ajaran ' . $tahunajaran;
            $data = UserDaftar::with('dataDiri')
                ->where([
                    'verifikasi' => '1',
                    'tahun_ajaran' => $request->tahunajar,
                ])
                ->get();
        } elseif ($request->jenislaporan == 'unverified') {
            $docname = 'Laporan Calon Siswa Belum Terverifikasi Tahun Ajaran ' . $tahunajaran;
            $data = UserDaftar::with('dataDiri')
                ->where([
                    'verifikasi' => '0',
                    'tahun_ajaran' => $request->tahunajar,
                ])
                ->get();
        }
        $pdf = PDF::loadview('report', [
            'data' => $data,
            'title' => $docname
        ])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
        return $pdf->stream($docname . '.pdf');
    }

    public function buktiLulus(Request $request)
    {
        $title = 'Bukti Pendaftaran Calon Siswa';
        $userdaftar = UserDaftar::where('id', $request->id_user_daftar)->get();
        $datadiri = DataDiri::where('id_user_daftar', $request->id_user_daftar)->get();
        $dataayah = DataAyah::where('id_user_daftar', $request->id_user_daftar)->get();
        $dataibu = DataIbu::where('id_user_daftar', $request->id_user_daftar)->get();
        $datawali = DataWali::where('id_user_daftar', $request->id_user_daftar)->get();
        // dd($datadiri);
        // return view('buktidaftar', [
        //     'title' => $title
        // ]);

        // foto ijazah dan pas foto
        $ijazah = [];
        $pasphoto = [];
        $ijazahdir = public_path("storage/images/ijazah/" . $userdaftar[0]['id_daftar'] . ".jpg");
        $pasphotodir = public_path('storage/images/pas foto/' . $userdaftar[0]['id_daftar'] . '.jpg');

        if (!File::exists($ijazahdir)) {
            $ijazah = [
                'file_exist' => false,
                'file_nama' => '',
            ];
        } else {
            $ijazah = [
                'file_exist' => true,
                'file_name' => asset('storage/images/ijazah/' . $userdaftar[0]['id_daftar'] . '.jpg'),
            ];
        }

        if (!File::exists($pasphotodir)) {
            $pasphoto = [
                'file_exist' => false,
                'file_name' => '',
            ];
        } else {
            $pasphoto = [
                'file_exist' => true,
                'file_name' => asset('storage/images/pas foto/' . $userdaftar[0]['id_daftar'] . '.jpg'),
            ];
        }

        $pdf = PDF::loadview('buktidaftar', [
            'userdaftar' => $userdaftar,
            'datadiri' => $datadiri,
            'dataayah' => $dataayah,
            'dataibu' => $dataibu,
            'datawali' => $datawali,
            'ijazah' => $ijazah,
            'pasphoto' => $pasphoto,
            'title' => $title
        ])->setPaper('a4', 'potrait')->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
        return $pdf->stream($title . '.pdf');
    }
}
