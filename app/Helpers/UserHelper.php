<?php

namespace App\Helpers;

class UserHelper
{
  public static function dateFormat($str)
  {
    $tanggal = date('d', strtotime($str));
    $bulan = date('n', strtotime($str));
    $tahun = date('Y', strtotime($str));
    $namabulan = '';

    switch ($bulan) {
      case '1':
        $namabulan = 'Januari';
        break;
      case '2':
        $namabulan = 'Februari';
        break;
      case '3':
        $namabulan = 'Maret';
        break;
      case '4':
        $namabulan = 'April';
        break;
      case '5':
        $namabulan = 'Mei';
        break;
      case '6':
        $namabulan = 'Juni';
        break;
      case '7':
        $namabulan = 'Juli';
        break;
      case '8':
        $namabulan = 'Agustus';
        break;
      case '9':
        $namabulan = 'September';
        break;
      case '10':
        $namabulan = 'Oktober';
        break;
      case '11':
        $namabulan = 'November';
        break;
      case '12':
        $namabulan = 'Desember';
        break;

      default:
        $namabulan = '';
        break;
    }

    return $tanggal . ' ' . $namabulan . ' ' . $tahun;
  }

  public static function penghasilan($str)
  {
    $result = '';
    switch ($str) {
      case 'tidak ada':
        $result = 'Tidak Ada Penghasilan';
        break;
      case '<500k':
        $result = 'Dibawah Rp 500.000';
        break;
      case '500k-1.5jt':
        $result = 'Rp 500.000 - Rp 1.499.999';
        break;
      case '1.5jt-3jt':
        $result = 'Rp 1.500.000 - Rp 3.000.000';
        break;
      case '>3jt':
        $result = 'Diatas Rp 3.000.000';
        break;

      default:
        $result = '';
        break;
    }
    return $result;
  }
}
