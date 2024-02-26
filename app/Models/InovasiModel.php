<?php

namespace App\Models;

use CodeIgniter\Model;

class InovasiModel extends Model
{
  protected $table = 'inovasi';
  protected $useTimeStamps = true; // Mengaktifkan Fitur Created at dan Updated at
  protected $allowedFields = ['fotoinovasi', 'judulinovasi', 'keteranganinovasi'];

  public function getInovasi($judul = false)
  {
    // Jika judul == false maka yang akan ditampilkan semua
    if ($judul == false) {
      return $this->findAll();
    }

    // Namun jika judul == true maka akan ditampilkan data tersebut saja
    return $this->where(['judulinovasi' => $judul])->first();
  }
}
