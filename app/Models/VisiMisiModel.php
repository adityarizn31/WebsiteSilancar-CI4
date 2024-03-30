<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
  protected $table = 'visimisi';
  protected $useTimeStamps =  true;
  protected $allowedFields = ['fotovisimisi'];

  public function getVisiMisi($visimisi = false)
  {
    if ($visimisi == false) {
      return $this->findAll();
    }

    return $this->where(['fotovisimisi' => $visimisi])->first();
  }
}
