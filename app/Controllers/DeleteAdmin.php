<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\InovasiModel;
use App\Models\VisiMisiModel;
use App\Models\PersyaratansilancarModel;

// Halaman Pendaftaran Si Lancar

use App\Models\Pendaftaran_kk_Model;
use App\Models\Pendaftaran_kkpemisahan_Model;
use App\Models\Pendaftaran_kkpenambahan_Model;
use App\Models\Pendaftaran_kkpengurangan_Model;
use App\Models\Pendaftaran_kkperceraian_Model;
use App\Models\Pendaftaran_kkperubahan_Model;
use App\Models\Pendaftaran_kia_Model;
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
  protected $kkpemisahanModel;
  protected $kkpenambahanModel;
  protected $kkpenguranganModel;
  protected $kkperceraianModel;
  protected $kkperubahanModel;
  protected $ktpModel;
  protected $kiaModel;
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
    $this->kkpemisahanModel = new Pendaftaran_kkpemisahan_Model();
    $this->kkpenambahanModel = new Pendaftaran_kkpenambahan_Model();
    $this->kkpenguranganModel = new Pendaftaran_kkpengurangan_Model();
    $this->kkperceraianModel = new Pendaftaran_kkperceraian_Model();
    $this->kkperubahanModel = new Pendaftaran_kkperubahan_Model();
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
  public function tandaiSelesaiKK($id = null)
  {
    $this->kkModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kk_admin');
  }

  public function dataSelesaiKK()
  {
    $currentPageKK =  $this->request->getVar('page_pendaftaran_kk') ? $this->request->getVar('page_pendaftaran_kk') : 1;

    $data = [
      'title' => 'Data Selesai KK || Admin Disdukcapil',
      'pendaftaran_kk' => $this->kkModel->onlyDeleted()->findAll(),
      'pager' => $this->kkModel->pager,
      'currentPage' => $currentPageKK
    ];
    return view('admin/dataKK', $data);
  }

  public function deletePermanentKK($id = null)
  {
    if ($id != null) {
      $this->kkModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKK');
    } else {
      $this->kkModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKK');
    }
  }















  // Digunakan untuk menghapus sementara data KK
  public function tandaiSelesaiKKPemisahan($id = null)
  {
    $this->kkpemisahanModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kkpemisahan_admin');
  }

  public function dataSelesaiKKPemisahan()
  {
    $currentPageKKPemisahan =  $this->request->getVar('page_pendaftaran_kk_pemisahan') ? $this->request->getVar('page_pendaftaran_kk_pemisahan') : 1;

    $data = [
      'title' => 'Data Selesai KK Pemisahan || Admin Disdukcapil',
      'pendaftaran_kk_pemisahan' => $this->kkpemisahanModel->onlyDeleted()->findAll(),
      'pager' => $this->kkpemisahanModel->pager,
      'currentPage' => $currentPageKKPemisahan
    ];
    return view('admin/dataKKPemisahan', $data);
  }

  public function deletePermanentKKPemisahan($id = null)
  {
    if ($id != null) {
      $this->kkpemisahanModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Pemisahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPemisahan');
    } else {
      $this->kkpemisahanModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Pemisahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPemisahan');
    }
  }















  // Digunakan untuk menghapus sementara data KK
  public function tandaiSelesaiKKPenambahan($id = null)
  {
    $this->kkpenambahanModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kkpenambahan_admin');
  }

  public function dataSelesaiKKPenambahan()
  {
    $currentPageKKPenambahan =  $this->request->getVar('page_pendaftaran_kk_penambahan') ? $this->request->getVar('page_pendaftaran_kk_penambahan') : 1;

    $data = [
      'title' => 'Data Selesai KK Penambahan || Admin Disdukcapil',
      'pendaftaran_kk_penambahan' => $this->kkpenambahanModel->onlyDeleted()->findAll(),
      'pager' => $this->kkpenambahanModel->pager,
      'currentPage' => $currentPageKKPenambahan
    ];
    return view('admin/dataKKPenambahan', $data);
  }

  public function deletePermanentKKPenambahan($id = null)
  {
    if ($id != null) {
      $this->kkpenambahanModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Penambahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPenambahan');
    } else {
      $this->kkpenambahanModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Penambahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPenambahan');
    }
  }















  // Digunakan untuk menghapus sementara data KK
  public function tandaiSelesaiKKPengurangan($id = null)
  {
    $this->kkpenguranganModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kkpengurangan_admin');
  }

  public function dataSelesaiKKPengurangan()
  {
    $currentPageKKPengurangan =  $this->request->getVar('page_pendaftaran_kk_pengurangan') ? $this->request->getVar('page_pendaftaran_kk_pengurangan') : 1;

    $data = [
      'title' => 'Data Selesai KK Pengurangan || Admin Disdukcapil',
      'pendaftaran_kk_pengurangan' => $this->kkpenguranganModel->onlyDeleted()->findAll(),
      'pager' => $this->kkpenguranganModel->pager,
      'currentPage' => $currentPageKKPengurangan
    ];
    return view('admin/dataKKPengurangan', $data);
  }

  public function deletePermanentKKPengurangan($id = null)
  {
    if ($id != null) {
      $this->kkpenguranganModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Pengurangan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPengurangan');
    } else {
      $this->kkpenguranganModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Pengurangan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPengurangan');
    }
  }















  // Digunakan untuk menghapus sementara data KK
  public function tandaiSelesaiKKPerubahan($id = null)
  {
    $this->kkperubahanModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kkperubahan_admin');
  }

  public function dataSelesaiKKPerubahan()
  {
    $currentPageKKPerubahan =  $this->request->getVar('page_pendaftaran_kk_perubahan') ? $this->request->getVar('page_pendaftaran_kk_perubahan') : 1;

    $data = [
      'title' => 'Data Selesai KK Perubahan || Admin Disdukcapil',
      'pendaftaran_kk_perubahan' => $this->kkperubahanModel->onlyDeleted()->findAll(),
      'pager' => $this->kkperubahanModel->pager,
      'currentPage' => $currentPageKKPerubahan
    ];
    return view('admin/dataKKPerubahan', $data);
  }

  public function deletePermanentKKPerubahan($id = null)
  {
    if ($id != null) {
      $this->kkperubahanModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Perubahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPerubahan');
    } else {
      $this->kkperubahanModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu keluarga Perubahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPerubahan');
    }
  }









  // Digunakan untuk menghapus sementara KIA
  public function tandaiSelesaiKIA($id = null)
  {
    $this->kiaModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kia_admin');
  }

  public function dataSelesaiKIA()
  {
    $currentPageKIA = $this->request->getVar('page_pendaftaran_kia') ? $this->request->getVar('page_pendaftaran_kia') : 1;

    $data = [
      'title' => 'Data Selesai KIA || Admin Disdukcapil',
      'pendaftaran_kia' => $this->kiaModel->onlyDeleted()->findAll(),
      'pager' => $this->kiaModel->pager,
      'currentPage' => $currentPageKIA,
    ];
    return view('admin/dataKIA', $data);
  }

  public function deletePermanentKIA($id = null)
  {
    if ($id != null) {
      $this->kiaModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu Identitas Anak telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKIA');
    } else {
      $this->kiaModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu Identitas Anak telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKIA');
    }
  }














  // Digunakan untuk menghapus sementara data KK Perceraian
  public function tandaiSelesaiKKPerceraian($id = null)
  {
    $this->kkperceraianModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_kkperceraian_admin');
  }

  public function dataSelesaiKKPerceraian()
  {
    $currentPageKKPerceraian =  $this->request->getVar('page_pendaftaran_kkperceraian') ? $this->request->getVar('page_pendaftaran_kkperceraian') : 1;

    $data = [
      'title' => 'Data Selesai KK Perceraian || Admin Disdukcapil',
      'pendaftaran_kk_perceraian' => $this->kkperceraianModel->onlyDeleted()->findAll(),
      'pager' => $this->kkperceraianModel->pager,
      'currentPage' => $currentPageKKPerceraian
    ];
    return view('admin/dataKKPerceraian', $data);
  }

  public function deletePermanentKKPerceraian($id = null)
  {
    if ($id != null) {
      $this->kkperceraianModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu Keluarga Perceraian telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPerceraian');
    } else {
      $this->kkperceraianModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Kartu Keluarga Perceraian telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKKPerceraian');
    }
  }















  // Digunakan untuk menghapus sementara data Surat Perpindahan
  public function tandaiSelesaiSuratPerpindahan($id = null)
  {
    $this->suratperpindahanModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_suratperpindahan_admin');
  }

  public function dataSelesaiSuratPerpindahan()
  {
    $currentPageSuratPerpindahan =  $this->request->getVar('page_pendaftaran_suratperpindahan') ? $this->request->getVar('page_pendaftaran_suratperpindahan') : 1;

    $data = [
      'title' => 'Data Selesai Surat Perpindahan Majalengka Menuju Luar|| Admin Disdukcapil',
      'pendaftaran_suratperpindahan' => $this->suratperpindahanModel->onlyDeleted()->findAll(),
      'pager' => $this->suratperpindahanModel->pager,
      'currentPage' => $currentPageSuratPerpindahan
    ];
    return view('admin/dataSuratPerpindahan', $data);
  }

  public function deletePermanentSuratPerpindahan($id = null)
  {
    if ($id != null) {
      $this->suratperpindahanModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Surat Perpindahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiSuratPerpindahan');
    } else {
      $this->suratperpindahanModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Surat Perpindahan telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiSuratPerpindahan');
    }
  }















  // Digunakan untuk menghapus sementara data Surat Perpindahan Luar
  public function tandaiSelesaiSuratPerpindahanLuar($id = null)
  {
    $this->suratperpindahanluarModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_suratperpindahanluar_admin');
  }

  public function dataSelesaiSuratPerpindahanLuar()
  {
    $currentPageSuratPerpindahanLuar =  $this->request->getVar('page_pendaftaran_suratperpindahanluar') ? $this->request->getVar('page_pendaftaran_suratperpindahanluar') : 1;

    $data = [
      'title' => 'Data Selesai Surat Perpindahan Luar Menuju Majalengka || Admin Disdukcapil',
      'pendaftaran_suratperpindahanluar' => $this->suratperpindahanluarModel->onlyDeleted()->findAll(),
      'pager' => $this->suratperpindahanluarModel->pager,
      'currentPage' => $currentPageSuratPerpindahanLuar
    ];
    return view('admin/dataSuratPerpindahanLuar', $data);
  }

  public function deletePermanentSuratPerpindahanLuar($id = null)
  {
    if ($id != null) {
      $this->suratperpindahanluarModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Surat Perpindahan Luar telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiSuratPerpindahanLuar');
    } else {
      $this->suratperpindahanluarModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Surat Perpindahan Luar telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiSuratPerpindahanLuar');
    }
  }














  // Digunakan untuk menghapus sementara data Akta Kelahiran
  public function tandaiSelesaiAktaKelahiran($id = null)
  {
    $this->aktakelahiranModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_aktakelahiran_admin');
  }

  public function dataSelesaiAktaKelahiran()
  {
    $currentPageAktaKelahiran =  $this->request->getVar('page_pendaftaran_aktakelahiran') ? $this->request->getVar('page_pendaftaran_aktakelahiran') : 1;

    $data = [
      'title' => 'Data Selesai Akta Kelahiran || Admin Disdukcapil',
      'pendaftaran_aktakelahiran' => $this->aktakelahiranModel->onlyDeleted()->findAll(),
      'pager' => $this->aktakelahiranModel->pager,
      'currentPage' => $currentPageAktaKelahiran
    ];
    return view('admin/dataAktaKelahiran', $data);
  }

  public function deletePermanentAktaKelahiran($id = null)
  {
    if ($id != null) {
      $this->aktakelahiranModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Akta Kelahiran telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiAktaKelahiran');
    } else {
      $this->aktakelahiranModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Akta Kelahiran telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiAktaKelahiran');
    }
  }














  // Digunakan untuk menghapus sementara data Akta Kematian
  public function tandaiSelesaiAktaKematian($id = null)
  {
    $this->aktakematianModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_aktakematian_admin');
  }

  public function dataSelesaiAktaKematian()
  {
    $currentPageAktaKematian =  $this->request->getVar('page_pendaftaran_aktakematian') ? $this->request->getVar('page_pendaftaran_aktakematian') : 1;

    $data = [
      'title' => 'Data Selesai Akta Kematian || Admin Disdukcapil',
      'pendaftaran_aktakematian' => $this->aktakematianModel->onlyDeleted()->findAll(),
      'pager' => $this->aktakematianModel->pager,
      'currentPage' => $currentPageAktaKematian
    ];
    return view('admin/dataAktaKematian', $data);
  }

  public function deletePermanentAktaKematian($id = null)
  {
    if ($id != null) {
      $this->aktakematianModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Akta Kematian telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiAktaKematian');
    } else {
      $this->aktakematianModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Akta Kematian telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiAktaKematian');
    }
  }














  // Digunakan untuk menghapus sementara data Keabsahan Akta Kelahiran
  public function tandaiSelesaiKeabsahanAkla($id = null)
  {
    $this->keabsahanaklaModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_keabsahanakla_admin');
  }

  public function dataSelesaiKeabsahanAkla()
  {
    $currentPageAktaKeabsahanAkla =  $this->request->getVar('page_pendaftaran_keabsahanakla') ? $this->request->getVar('page_pendaftaran_keabsahanakla') : 1;

    $data = [
      'title' => 'Data Selesai Keabsahan Akla || Admin Disdukcapil',
      'pendaftaran_keabsahanakla' => $this->keabsahanaklaModel->onlyDeleted()->findAll(),
      'pager' => $this->keabsahanaklaModel->pager,
      'currentPage' => $currentPageAktaKeabsahanAkla
    ];
    return view('admin/dataKeabsahanAkla', $data);
  }

  public function deletePermanentKeabsahanAkla($id = null)
  {
    if ($id != null) {
      $this->keabsahanaklaModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Keabsahan Akla telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKeabsahanAkla');
    } else {
      $this->keabsahanaklaModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Keabsahan Akla telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiKeabsahanAkla');
    }
  }














  // Digunakan untuk menghapus sementara data Pelayanan Data
  public function tandaiSelesaiPelayananData($id = null)
  {
    $this->pelayanandataModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_pelayanandata_admin');
  }

  public function dataSelesaiPelayananData()
  {
    $currentPagePelayananData =  $this->request->getVar('page_pendaftaran_pelayanandata') ? $this->request->getVar('page_pendaftaran_pelayanandata') : 1;

    $data = [
      'title' => 'Data Selesai Pelayanan Data || Admin Disdukcapil',
      'pendaftaran_pelayanandata' => $this->pelayanandataModel->onlyDeleted()->findAll(),
      'pager' => $this->pelayanandataModel->pager,
      'currentPage' => $currentPagePelayananData
    ];
    return view('admin/dataPelayananData', $data);
  }

  public function deletePermanentPelayananData($id = null)
  {
    if ($id != null) {
      $this->pelayanandataModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Pelayanan Data telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiPelayananData');
    } else {
      $this->pelayanandataModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Pelayanan Data telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiPelayananData');
    }
  }














  // Digunakan untuk menghapus sementara data Perbaikan Data
  public function tandaiSelesaiPerbaikanData($id = null)
  {
    $this->perbaikandataModel->delete($id);
    return redirect()->to('/Admin/perbaikan_data_admin');
  }

  public function dataSelesaiPerbaikanData()
  {
    $currentPagePerbaikanData =  $this->request->getVar('page_pendaftaran_perbaikandata') ? $this->request->getVar('page_pendaftaran_perbaikandata') : 1;

    $data = [
      'title' => 'Data Selesai Perbaikan Data || Admin Disdukcapil',
      'pendaftaran_perbaikandata' => $this->perbaikandataModel->onlyDeleted()->findAll(),
      'pager' => $this->perbaikandataModel->pager,
      'currentPage' => $currentPagePerbaikanData
    ];
    return view('admin/dataPerbaikanData', $data);
  }

  public function deletePermanentPerbaikanData($id = null)
  {
    if ($id != null) {
      $this->perbaikandataModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Perbaikan Data telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiPerbaikanData');
    } else {
      $this->perbaikandataModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Perbaikan Data telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiPerbaikanData');
    }
  }














  // Digunakan untuk menghapus sementara data Pengaduan Update
  public function tandaiSelesaiPengaduanUpdate($id = null)
  {
    $this->pengaduanupdateModel->delete($id);
    return redirect()->to('/Admin/pendaftaran_pengaduanupdate_admin');
  }

  public function dataSelesaiPengaduanUpdate()
  {
    $currentPagePengaduanUpdate =  $this->request->getVar('page_pendaftaran_pengaduanupdate') ? $this->request->getVar('page_pendaftaran_pengaduanupdate') : 1;

    $data = [
      'title' => 'Data Selesai Pengaduan Update || Admin Disdukcapil',
      'pendaftaran_pengaduanupdate' => $this->pengaduanupdateModel->onlyDeleted()->findAll(),
      'pager' => $this->pengaduanupdateModel->pager,
      'currentPage' => $currentPagePengaduanUpdate
    ];
    return view('admin/dataPengaduanUpdate', $data);
  }

  public function deletePermanentPengaduanUpdate($id = null)
  {
    if ($id != null) {
      $this->pengaduanupdateModel->delete($id, true);
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Pengaduan Update telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiPengaduanUpdate');
    } else {
      $this->pengaduanupdateModel->purgeDeleted();
      session()->setFlashdata('pesan', 'Pendaftaran Permohonan Pengaduan Update telah dihapus !!');
      return redirect()->to('/DeleteAdmin/dataSelesaiPengaduanUpdate');
    }
  }
}
