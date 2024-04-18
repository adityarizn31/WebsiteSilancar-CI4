<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_kkpengurangan_Model extends Model
{
  protected $table = 'pendaftaran_kk_pengurangan';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'kartukeluargalama', 'filepengurangan', 'status'];

  public function getDataKKPengurangan($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }
    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_kk_pengurangan')->like('nik', $keyword)->orLike('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kk_pengurangan')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
