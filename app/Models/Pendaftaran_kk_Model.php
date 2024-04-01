<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_kk_Model extends Model
{
  protected $table = 'pendaftaran_kk';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'formulirdesa', 'kartukeluargasuami', 'kartukeluargaistri', 'suratnikah', 'suratpindah', 'status'];

  public function getDataKK($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }
    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_kk')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function getDataByNIK($nik)
  {
    return $this->where('NIK', $nik)->first();
  }

  public function searchKK($nik, $keyword)
  {
    $query = $this->db->table('pendaftaran_kk')
      ->like('nik', $nik)
      ->like('namapemohon', $keyword);

    // $result = $query->get();

    // return $result->getRow();
  }


  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kk')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
