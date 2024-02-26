<?php

namespace App\Models;

use CodeIgniter\Model;

class SampulSilancarModel extends Model
{
  // Menghubungkan Model dengan Tabel
  protected $table = 'sampulsilancar';
  protected $useTimeStamps = true;
  protected $allowedFields = ['logo', 'keterangan'];
}
