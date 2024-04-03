<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_pelayanandata_Model extends Model
{
  protected $table = 'pendaftaran_pelayanandata';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'berkaspelayanan1', 'berkaspelayanan2', 'berkaspelayanan3', 'berkaspelayanan4', 'berkaspelayanan5', 'berkaspelayanan6', 'berkaspelayanan7', 'berkaspelayanan8', 'berkaspelayanan9', 'berkaspelayanan10', 'status'];

  public function getDataPelayananData($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_pelayanandata')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_pelayanandata')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
