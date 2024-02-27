<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\InovasiModel;
use App\Models\VisiMisiModel;
use App\Models\PersyaratansilancarModel;

// Halaman Pendaftaran Si Lancar

use App\Models\Pendaftaran_kk_Model;
use App\Models\Pendaftaran_kia_Model;
use App\Models\Pendaftaran_kkperceraian_Model;
use App\Models\Pendaftaran_suratperpindahan_Model;
use App\Models\Pendaftaran_suratperpindahanluar_Model;

use App\Models\Pendaftaran_aktakelahiran_Model;
use App\Models\Pendaftaran_aktakematian_Model;
use App\Models\Pendaftaran_keabsahanakla_Model;

use App\Models\Pendaftaran_pelayanandata_Model;

use App\Models\Perbaikan_data_Model;
use App\Models\Pengaduan_update_Model;

class DeleteAdmin extends BaseController
{

  protected $adminModel;
  protected $beritaModel;
  protected $inovasiModel;
  protected $visimisiModel;
  protected $persyaratansilancarModel;

  // Halaman Pendaftaran Si Lancar

  protected $kkModel;
  protected $kiaModel;
  protected $kkperceraianModel;
  protected $suratperpindahanModel;
  protected $suratperpindahanluarModel;

  protected $aktakelahiranModel;
  protected $aktakematianModel;
  protected $keabsahanaklaModel;

  protected $pelayanandataModel;

  protected $perbaikandataModel;
  protected $pengaduanupdateModel;

  public function __construct()
  {
    $this->adminModel = new AdminModel();
    $this->beritaModel = new BeritaModel();
    $this->inovasiModel = new InovasiModel();
    $this->visimisiModel = new VisiMisiModel();
    $this->persyaratansilancarModel = new PersyaratansilancarModel();

    // Halaman Pendaftaran Si Lancar

    $this->kkModel = new Pendaftaran_kk_Model();
    $this->kiaModel = new Pendaftaran_kia_Model();
    $this->suratperpindahanModel = new Pendaftaran_suratperpindahan_Model();
    $this->suratperpindahanluarModel = new Pendaftaran_suratperpindahanluar_Model();

    $this->aktakematianModel = new Pendaftaran_aktakematian_Model();
    $this->aktakelahiranModel = new Pendaftaran_aktakelahiran_Model();
    $this->keabsahanaklaModel = new Pendaftaran_keabsahanakla_Model();

    $this->pelayanandataModel = new Pendaftaran_pelayanandata_Model();

    $this->perbaikandataModel = new Perbaikan_data_Model();
    $this->pengaduanupdateModel = new Pengaduan_update_Model();
  }










  // Halaman Berita
  // Digunakan untuk menghapus data berita
  public function deleteBerita($id)
  {
    // Mencari Gambar berdasarkan ID
    $berita = $this->beritaModel->find($id);
    // Mengecek Jika Gambarnya Default
    if ($berita['fotoberita'] != 'default.jpg') {
      // Hapus Gambar
      unlink('img/berita/' . $berita['fotoberita']);
    }

    $this->beritaModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus !!');
    return redirect()->to('admin/berita_admin');
  }









  // Kodingan Delete Benar
  // Halaman Inovasi
  // Digunakan untuk menghapus data inovasi
  public function deleteInovasi($id)
  {
    // Mencari Foto Inovasi Berdasarkan ID
    $inovasi = $this->inovasiModel->find($id);
    // Pengecekan Foto Inovasi
    if ($inovasi['fotoinovasi'] != 'inovasidef.PNG') {
      // Hapus Foto Inovasi
      unlink('img/inovasi/' . $inovasi['fotoinovasi']);
    }

    $this->inovasiModel->delete($id);
    session()->setFlashdata('pesan', 'Data Inovasi berhasil dihapus !!');
    return redirect()->to('admin/inovasi_admin');
  }









  // Kodingan Delete Benar
  // Halaman Persyaratan Si Lancar
  // Digunakan untuk menghapus data Persyaratan
  public function deletePersyaratan($id)
  {
    // Mencari Foto Persyaratan Berdasarkan ID
    $persyaratansilancar = $this->persyaratansilancarModel->find($id);
    // Pengecekan Foto Persyaratan
    if ($persyaratansilancar['fotopersyaratan'] != '') {
      // Hapus Foto Persyaratan
      unlink('img/persyaratansilancar/' . $persyaratansilancar['fotopersyaratan']);
    }


    $this->persyaratansilancarModel->delete($id);
    session()->setFlashdata('pesan', 'Data Persyaratan Si Lancar berhasil dihapus !!');
    return redirect()->to('admin/persyaratansilancar_admin');
  }















  // Digunakan untuk menghapus sementara data KK
  public function tandaiSelesaiKK($id)
  {
    $this->kkModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kk_admin');
  }













  // Digunakan untuk menghapus sementara KIA
  public function tandaiSelesaiKIA($id = null)
  {
    $this->kiaModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kia_admin');
  }














  // Digunakan untuk menghapus sementara data KK Perceraian
  public function tandaiSelesaiKKPerceraian($id = null)
  {
    $this->kkperceraianModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kkperceraian_admin');
  }














  // Digunakan untuk menghapus sementara data Surat Perpindahan
  public function tandaiSelesaiSuratPerpindahan($id = null)
  {
    $this->suratperpindahanModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_suratperpindahan_admin');
  }














  // Digunakan untuk menghapus sementara data Surat Perpindahan Luar
  public function tandaiSelesaiSuratPerpindahanLuar($id = null)
  {
    $this->suratperpindahanluarModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_suratperpindahanluar_admin');
  }














  // Digunakan untuk menghapus sementara data Akta Kelahiran
  public function tandaiSelesaiAktaKelahiran($id = null)
  {
    $this->aktakelahiranModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_aktakelahiran_admin');
  }














  // Digunakan untuk menghapus sementara data Akta Kematian
  public function tandaiSelesaiAktaKematian($id = null)
  {
    $this->aktakematianModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_aktakematian_admin');
  }














  // Digunakan untuk menghapus sementara data Keabsahan Akta Kelahiran
  public function tandaiSelesaiKeabsahanAkla($id = null)
  {
    $this->keabsahanaklaModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_keabsahanakla_admin');
  }














  // Digunakan untuk menghapus sementara data Pelayanan Data
  public function tandaiSelesaiPelayananData($id = null)
  {
    $this->pelayanandataModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_pelayanandata_admin');
  }














  // Digunakan untuk menghapus sementara data Perbaikan Data
  public function tandaiSelesaiPerbaikanData($id = null)
  {
    $this->perbaikandataModel->delete($id);
    return redirect()->to('/Admin/perbaikan_data_admin');
  }














  // Digunakan untuk menghapus sementara data Pengaduan Update
  public function tandaiSelesaiPengaduanUpdate($id = null)
  {
    $this->pengaduanupdateModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_pengaduanupdate_admin');
  }
}
