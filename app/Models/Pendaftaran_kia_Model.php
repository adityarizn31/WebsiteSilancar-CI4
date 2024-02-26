<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_kia_Model extends Model
{
  protected $table = 'pendaftaran_kia';
  protected $useTimeStamps = true;
  protected $useSoftDeletes =  true;
  protected $allowedFields = ['namapemohon', 'emailpemohon', 'nomorpemohon', 'alamatpemohon', 'aktakelahiran', 'kartukeluarga', 'pasfoto', 'status'];

  public function getDataKIA($nama = false)
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
    return $this->table('pendaftaran_kia')->like('namapemohon', $keyword);
  }

  // Digunakan untuk mengubah Status Pendaftaran
  public function updateStatus($nama, $status)
  {
    return $this->db->table('pendaftaran_kia')
      ->where('namapemohon', $nama)
      ->update(['status' => $status]);
  }

  //   session()->setFlashdata('pesan', 'Pendaftaran Telah Diubah Statusnya !!');
  //   return redirect()->to('/DetailAdmin/detail_pendaftarankia_admin/' . $nama);

  //   // return $this->db->table('pendaftaran_kia')
  //   //   ->where('namapemohon', $nama)
  //   //   ->update(['status' => $status]);
  // }

  // public function updateStatus($nama, $status)
  // {
  //   if ($this->kiaModel->where('namapemohon', '=', $nama)->exists()) {
  //     $pendaftaran_kia = $this->kiaModel->find($nama);

  //     if ($status == 'Selesai') {
  //       $pendaftaran_kia->update(['status' => $status]);
  //     } else {
  //       $pendaftaran_kia->forceDelete();
  //     }
  //   } else {
  //     // Do nothing
  //   }

  //   session()->setFlashdata('pesan', 'Pendaftaran Telah Diubah Statusnya !!');
  //   return redirect()->to('/DetailAdmin/detail_pendaftarankia_admin/' . $nama);
  // }
}
