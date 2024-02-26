<?php

namespace App\Models;

use CodeIgniter\Model;

class PersyaratansilancarModel extends Model
{
  //Cara menghubungkan Model dengan Tabel
  protected $table = 'persyaratansilancar';
  protected $useTimeStamps = true;
  protected $allowedFields = ['fotopersyaratan', 'judulpersyaratan', 'keteranganpersyaratan'];


  // Digunakan untuk menampilkan detail suatu berita
  public function getPersyaratan($judulPersyaratan = false)
  {
    // Jika judul == false maka yang ditampilkan semua
    if ($judulPersyaratan == false) {
      return $this->findAll();
    }

    // Namun jika judul == true maka ditampilkan hanya satu
    return $this->where(['judulpersyaratan' => $judulPersyaratan])->first();
  }
}
