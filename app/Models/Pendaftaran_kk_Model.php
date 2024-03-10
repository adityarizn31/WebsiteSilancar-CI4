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
    // Jika nama pemohon == false maka yang akan ditampilkan semua
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true makan akan ditampilkan nama tersebut saja
    return $this->where(['namapemohon' => $nama])->first();
  }

  // Digunakan untuk mencari item
  public function search($keyword)
  {
    return $this->table('pendaftaran_kk')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  // Digunakan untuk mengubah Status Pendaftaran
  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kk')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
