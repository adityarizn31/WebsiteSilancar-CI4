<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_kkperceraian_Model extends Model
{
  protected $table = 'pendaftaran_kk_perceraian';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'fotoktp', 'alamatpemohon', 'kartukeluargalama', 'aktaperceraian', 'status'];

  public function getDataKKPerceraian($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_kk_perceraian')->like('nik', $keyword)->orLike('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kk_perceraian')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
