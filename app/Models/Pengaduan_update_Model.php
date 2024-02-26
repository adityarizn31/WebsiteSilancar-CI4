<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan_update_Model extends Model
{
  protected $table = 'pengaduan_update';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'kartutandapenduduk', 'kartukeluarga', 'pengaduanupdate'];

  public function getDataPengaduanUpdate($nama = false)
  {
    // Jika nama pemohon == false maka yang akan ditampilkan semua
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true makan akan ditampilkan nama tersebut saja
    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pengaduan_update')->like('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pengaduan_update')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
