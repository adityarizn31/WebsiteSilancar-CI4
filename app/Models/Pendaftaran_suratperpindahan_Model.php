<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_suratperpindahan_Model extends Model
{
  protected $table = 'pendaftaran_suratperpindahan';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'fotoktp', 'alamatpemohon', 'kartukeluarga', 'kartutandapenduduk', 'status'];

  public function getDataSuratPerpindahan($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_suratperpindahan')->like('nik', $keyword)->orLike('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_suratperpindahan')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
