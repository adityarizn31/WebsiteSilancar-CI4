<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_pelayanandata_Model extends Model
{
  protected $table = 'pendaftaran_pelayanandata';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'berkaspelayanan1', 'berkaspelayanan2', 'berkaspelayanan3', 'berkaspelayanan4', 'berkaspelayanan5', 'berkaspelayanan6', 'berkaspelayanan7', 'berkaspelayanan8', 'berkaspelayanan9', 'berkaspelayanan10', 'status'];

  public function getDataPelayananData($nama = false)
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
    return $this->table('pendaftaran_pelayanandata')->like('namapemohon', $keyword);
  }

  // Digunakan untuk mengubah updateStatus
  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_pelayanandata')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
