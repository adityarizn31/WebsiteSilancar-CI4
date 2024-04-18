<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_aktakematian_Model extends Model
{
  protected $table = 'pendaftaran_aktakematian';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'kartukeluarga', 'suratkematian', 'status'];

  public function getDataAktaKematian($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_aktakematian')->like('nik', $keyword)->orLike('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_aktakematian')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
