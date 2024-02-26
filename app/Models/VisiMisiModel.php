<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
  //Cara menghubungkan Model dengan Tabel
  protected $table = 'visimisi';
  protected $useTimeStamps =  true;
  protected $allowedFields = ['fotovisimisi'];

  // Digunakan untuk menampilkan detail suatu berita
  public function getVisiMisi($visimisi = false)
  {
    // Jika visimisi == false maka yang ditampilkan akan semua
    if ($visimisi == false) {
      return $this->findAll();
    }

    // Namun jika visimisi == true maka ditampilkan hanya satu
    return $this->where(['fotovisimisi' => $visimisi])->first();
  }
}
