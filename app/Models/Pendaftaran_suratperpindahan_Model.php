<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_suratperpindahan_Model extends Model
{
  protected $table = 'pendaftaran_suratperpindahan';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'formperpindahan', 'kartukeluarga', 'bukunikah', 'ktpsuami', 'ktpistri', 'status'];

  public function getDataSuratPerpindahan($nama = false)
  {
    // Jika nama pemohon == false maka yang akan ditampilkan keseluruhan data
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true maka akan ditampilkan keseluruhan nama tersebut
    return $this->where(['namapemohon' => $nama])->first();
  }

  // Digunakan untuk mencari item
  public function search($keyword)
  {
    return $this->table('pendaftaran_suratperpindahan')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  // Digunakan untuk mengubah Status Pendaftaran
  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_suratperpindahan')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
