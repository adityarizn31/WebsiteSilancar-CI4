<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_suratperpindahanluar_Model extends Model
{
  protected $table = 'pendaftaran_suratperpindahanluar';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'skpwni', 'kartutandapenduduk', 'status'];

  public function getDataSuratPerpindahanLuar($nama = false)
  {
    // Jika nama pemohon == false maka yang akan ditampilkan keseluruhan data
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true maka akan ditampilkan nama tersebut
    return $this->where(['namapemohon' => $nama])->first();
  }

  // Digunakan untuk mencari item
  public function search($keyword)
  {
    return $this->table('pendaftaran_suratperpindahanluar')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  // Digunakan untuk mengubah Status Pendaftaran
  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_suratperpindahanluar')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
