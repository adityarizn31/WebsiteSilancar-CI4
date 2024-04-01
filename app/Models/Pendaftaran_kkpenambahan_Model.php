<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_kkpenambahan_Model extends Model
{
  protected $table = 'pendaftaran_kk_penambahan';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'kartukeluargalama', 'suratnikah', 'suratketeranganlahir', 'status'];

  public function getDataKKPenambahan($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }
    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_kk_penambahan')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kk_penambahan')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
