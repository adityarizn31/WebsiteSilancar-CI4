<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_keabsahanakla_Model extends Model
{
  protected $table = 'pendaftaran_keabsahanakla';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'aktakelahiran', 'kartutandapenduduk', 'status'];

  public function getDataKeabsahanakla($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_keabsahanakla')->like('nik', $keyword)->orLike('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_keabsahanakla')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
