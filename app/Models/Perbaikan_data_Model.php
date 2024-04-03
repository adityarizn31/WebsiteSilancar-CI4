<?php

namespace App\Models;

use CodeIgniter\Model;

class Perbaikan_data_Model extends Model
{
  protected $table = 'perbaikan_data';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'judulperbaikan', 'berkasperbaikan_satu', 'berkasperbaikan_dua', 'berkasperbaikan_tiga', 'berkasperbaikan_empat', 'berkasperbaikan_lima', 'penjelasanperbaikan', 'status'];

  public function getPerbaikanData($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('perbaikan_data')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('perbaikan_data')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
