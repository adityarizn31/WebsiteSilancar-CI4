<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan_update_Model extends Model
{
  protected $table = 'pengaduan_update';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'fotoktp', 'kartutandapenduduk', 'kartukeluarga', 'pengaduanupdate'];

  public function getDataPengaduanUpdate($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pengaduan_update')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  public function updateStatus($nama, $status)
  {
    return $this->db->table('pengaduan_update')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
