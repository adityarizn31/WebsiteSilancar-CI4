<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_aktakelahiran_Model extends Model
{
  protected $table = 'pendaftaran_aktakelahiran';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'formulirf201akta', 'suratketeranganlahir', 'kartukeluarga', 'ktpayah', 'ktpibu', 'status'];

  public function getDataAktaKelahiran($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_aktakelahiran')->like('nik', $keyword)->orLike('namapemohon', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_aktakelahiran')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
