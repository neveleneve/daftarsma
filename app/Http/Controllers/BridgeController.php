<?php

namespace App\Http\Controllers;

use App\Models\UserDaftar;
use Illuminate\Http\Request;

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
}
