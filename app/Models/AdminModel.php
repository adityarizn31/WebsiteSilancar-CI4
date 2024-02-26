<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
  //Cara menghubungkan Model dengan Tabel
  protected $table = 'admin';
  protected $useTimestamps = true; // Mengaktifkan Fitur Created_at & Updated_at
  protected $allowedFields = ['nama', 'email', 'password', 'level'];

  public function getAkunAdmin($nama = false)
  {
    // Jika judul == false maka yang ditampilkan semua
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika judul == true maka ditampilkan hanya satu
    return $this->where(['nama' => $nama])->first();
  }
}
