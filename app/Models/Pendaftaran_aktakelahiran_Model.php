<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_aktakelahiran_Model extends Model
{
  protected $table = 'pendaftaran_aktakelahiran';
  protected $useTimeStamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nik', 'namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'formulirf201akta', 'suratketeranganlahir', 'kartukeluarga', 'ktpayah', 'ktpibu', 'status'];

  public function getDataAktaKelahiran($nama = false)
  {
    // Jika nama pemohon == false maka yang akan ditampilkan semua
    if ($nama == false) {
      return $this->findAll();
    }

    // Namun jika nama pemohon == true makan akan ditampilkan nama tersebut saja
    return $this->where(['namapemohon' => $nama])->first();
  }

  public function search($keyword)
  {
    return $this->table('pendaftaran_aktakelahiran')->like('namapemohon', $keyword)->orLike('nik', $keyword);
  }

  // Digunakan untuk mengubah Status Pendaftaran
  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_aktakelahiran')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }
}
