<?php

namespace App\Http\Controllers;

use App\Models\UserDaftar;
use Illuminate\Http\Request;
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
        // return view('report', [
        //     'data' => $data,
        //     'title' => $docname
        // ]);
        $pdf = PDF::loadview('report', [
            'data' => $data,
            'title' => $docname
        ])
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
        return $pdf->stream($docname . '.pdf');
    }

    public function buktiLulus(Request $request)
    {
        # code...
    }
}
