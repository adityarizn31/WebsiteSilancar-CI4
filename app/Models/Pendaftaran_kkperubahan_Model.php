<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_kkperubahan_Model extends Model
{
  protected $table = 'pendaftaran_kk_perubahan';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'kartukeluargalama', 'suratnikah', 'fileperubahan', 'status'];

  public function getDataKKPerubahan($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }
    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_kk_perubahan')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kk_perubahan')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
