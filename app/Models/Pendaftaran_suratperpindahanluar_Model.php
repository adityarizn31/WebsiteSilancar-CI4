<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_suratperpindahanluar_Model extends Model
{
  protected $table = 'pendaftaran_suratperpindahanluar';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'skpwni', 'kartutandapenduduk', 'status'];

  public function getDataSuratPerpindahanLuar($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_suratperpindahanluar')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_suratperpindahanluar')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
