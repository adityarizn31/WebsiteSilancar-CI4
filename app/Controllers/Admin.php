<?php

// Controller Admin

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\InovasiModel;
use App\Models\VisiMisiModel;
use App\Models\PersyaratansilancarModel;

// Halaman Pendaftaran Si Lancar

use App\Models\Pendaftaran_kk_Model;
use App\Models\Pendaftaran_kkperceraian_Model;
use App\Models\Pendaftaran_kia_Model;
use App\Models\Pendaftaran_suratperpindahan_Model;
use App\Models\Pendaftaran_suratperpindahanluar_Model;

use App\Models\Pendaftaran_aktakelahiran_Model;
use App\Models\Pendaftaran_aktakematian_Model;
use App\Models\Pendaftaran_keabsahanakla_Model;

use App\Models\Pendaftaran_pelayanandata_Model;

use App\Models\Perbaikan_data_Model;
use App\Models\Pengaduan_update_Model;

class Admin extends BaseController
{

  protected $adminModel;
  protected $beritaModel;
  protected $inovasiModel;
  protected $visimisiModel;
  protected $persyaratansilancarModel;

  // Halaman Pendaftaran Si Lancar

  protected $kkModel;
  protected $kkperceraianModel;
  protected $kiaModel;
  protected $suratperpindahanModel;
  protected $suratperpindahanluarModel;

  protected $aktakelahiranModel;
  protected $aktakematianModel;
  protected $keabsahanaklaModel;

  protected $pelayanandataModel;

  protected $perbaikandataModel;
  protected $pengaduanupdateModel;

  // Halaman Pelayanan

  protected $pelayananModel;

  protected $pelkkModel;
  protected $pelkiaModel;
  protected $pelsuratperpindahanModel;
  protected $pelsuratperpindahanluarModel;

  protected $pelaktakelahiranModel;
  protected $pelaktakematianModel;
  protected $pelkeabsahanaklaModel;

  protected $pelpelayanandataModel;

  protected $pelperbaikandataModel;
  protected $pelpengaduanupdateModel;


  public function __construct()
  {
    $this->adminModel = new AdminModel();
    $this->beritaModel = new BeritaModel();
    $this->inovasiModel = new InovasiModel();
    $this->visimisiModel = new VisiMisiModel();
    $this->persyaratansilancarModel = new PersyaratansilancarModel();

    // Halaman Pendaftaran Si Lancar

    $this->kkModel = new Pendaftaran_kk_Model();
    $this->kkperceraianModel = new Pendaftaran_kkperceraian_Model();
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








  // Halaman Utama / Dashboard
  public function index()
  {
    $pendaftaran_kk = $this->kkModel->findAll();
    $pendaftaran_kk_perceraian = $this->kkperceraianModel->findAll();
    $pendaftaran_kia = $this->kiaModel->findAll();
    $pendaftaran_suratperpindahan = $this->suratperpindahanModel->findAll();
    $pendaftaran_suratperpindahanluar = $this->suratperpindahanluarModel->findAll();
    $pendaftaran_aktakelahiran = $this->aktakelahiranModel->findAll();
    $pendaftaran_aktakematian = $this->aktakematianModel->findAll();
    $pendaftaran_keabsahanakla = $this->keabsahanaklaModel->findAll();
    $pendaftaran_pelayanandata = $this->pelayanandataModel->findAll();
    $pendaftaran_perbaikandata = $this->perbaikandataModel->findAll();
    $pendaftaran_pengaduanupdate = $this->pengaduanupdateModel->findAll();
    $data = [
      'title' => 'Admin Disdukcapil',
      'pendaftaran_kk' => $pendaftaran_kk,
      'pendaftaran_kk_perceraian' => $pendaftaran_kk_perceraian,
      'pendaftaran_kia' => $pendaftaran_kia,
      'pendaftaran_suratperpindahan' => $pendaftaran_suratperpindahan,
      'pendaftaran_suratperpindahanluar' => $pendaftaran_suratperpindahanluar,
      'pendaftaran_aktakelahiran' => $pendaftaran_aktakelahiran,
      'pendaftaran_aktakematian' => $pendaftaran_aktakematian,
      'pendaftaran_keabsahanakla' => $pendaftaran_keabsahanakla,
      'pendaftaran_pelayanandata' => $pendaftaran_pelayanandata,
      'pendaftaran_perbaikandata' => $pendaftaran_perbaikandata,
      'pendaftaran_pengaduanupdate' => $pendaftaran_pengaduanupdate,
    ];
    return view('admin/index', $data);
  }







  // Menampilkan akun admin
  public function data_admin()
  {
    // Menghubungkan Controller Admin dengan AdminModel
    // $admin = $this->adminModel->findAll();
    $data = [
      'title' => 'Data Akun || Admin Disdukcapil',
      'admin' => $this->adminModel->getAkunAdmin()
    ];
    return view('admin/data_admin', $data);
  }







  // Menampilkan keseluruhan data Berita pada halaman admin
  public function berita_admin()
  {
    // Menghubungkan Controller Admin dengan BeritaModel
    // $berita = $this->beritaModel->findAll();
    $data = [
      'title' => 'Berita Admin || Disdukcapil Majalengka',
      'berita' => $this->beritaModel->getBerita()
    ];
    return view('admin/berita_admin', $data);
  }







  // Menampilkan keseluruhan data inovasi pada halaman Admin
  public function inovasi_admin()
  {
    // Menghubungkan Controller Admin dengan InovasiModel
    //$inovasi = $this->inovasiModel->findAll();
    $data = [
      'title' => 'Inovasi Admin || Disdukcapil Majalengka',
      'inovasi' => $this->inovasiModel->getInovasi()
    ];
    return view('admin/inovasi_admin', $data);
  }







  // Menampilkan keseluruhan data Berita pada halaman admin
  public function visimisi_admin()
  {
    // Menghubungkan Controller Admin dengan Visi Mmisi Admin
    // $berita = $this->beritaModel->findAll();
    $data = [
      'title' => 'Visi Misi || Disdukcapil Majalengka',
      'visimisi' => $this->visimisiModel->getVisiMisi()
    ];
    return view('admin/visimisi_admin', $data);
  }







  public function persyaratansilancar_admin()
  {
    // Menghubungkan Controller Admin dengan Persyaratan Pelayanan
    $data = [
      'title' => 'Persyaratan Pelayanan || Admin Disdukcapil',
      'persyaratansilancar' => $this->persyaratansilancarModel->getPersyaratan()
    ];
    return view('admin/persyaratansilancar_admin', $data);
  }






  public function pelayanan()
  {
    // Menghubungkan Controller Admin dengan Pelayanan
    $pelayanan_kk = $this->pelkkModel->getDataPelayananKK();
    $data = [
      'title' => 'Pelayanan Si Lancar || Disdukcapil Majalengka',
      'pelayanan_kk' => $pelayanan_kk
    ];
    return view('admin/pelayanan', $data);
  }








  // PELAYANAN SI LANCAR

  // Menampilkan data Kartu Keluarga pada halaman Admin
  public function pendaftaran_kk_admin()
  {
    // Digunakan untuk Pagination
    $currentPageKK =  $this->request->getVar('page_pendaftaran_kk') ? $this->request->getVar('page_pendaftaran_kk') : 1;

    // Digunakan untuk Pencarian Data
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKK = $this->kkModel->search($keyword);
    } else {
      $orangKK = $this->kkModel;
    }

    // Digunakan untuk menampilkan Detail data, Jumlah data per Halaman serta Halamannya
    $data = [
      'title' => 'Data Pendaftaran KK || Admin Disdukcapil',
      'pendaftaran_kk' => $this->kkModel->getDataKK(),
      'pendaftaran_kk' => $orangKK->paginate(10, 'pendaftaran_kk'),
      'pager' => $this->kkModel->pager,
      'currentPage' => $currentPageKK
    ];
    return view('admin/pendaftaran_kk_admin', $data);
  }







  // Menampilkan data Kartu Keluarga Perceraian pada halaman Admin
  public function pendaftaran_kkperceraian_admin()
  {
    // Digunakan untuk Pagination
    $currentPageKKPerceraian =  $this->request->getVar('page_pendaftaran_kk_perceraian') ? $this->request->getVar('page_pendaftaran_kk_perceraian') : 1;

    // Digunakan untuk Pencarian Data
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKKPerceraian = $this->kkperceraianModel->search($keyword);
    } else {
      $orangKKPerceraian = $this->kkperceraianModel;
    }

    // Digunakan untuk menampilkan Detail data, Jumlah data per Halaman serta Halamannya
    $data = [
      'title' => 'Data Pendaftaran KK Perceraian || Admin Disdukcapil',
      'pendaftaran_kk_perceraian' => $this->kkperceraianModel->getDataKKPerceraian(),
      'pendaftaran_kk_perceraian' => $orangKKPerceraian->paginate(10, 'pendaftaran_kk_perceraian'),
      'pager' => $this->kkperceraianModel->pager,
      'currentPage' => $currentPageKKPerceraian
    ];
    return view('admin/pendaftaran_kkperceraian_admin', $data);
  }







  // Menampilkan data pendaftaran KIA pada halaman admin
  public function pendaftaran_kia_admin()
  {
    // Digunakan untuk Pagination
    $currentPageKIA =  $this->request->getVar('page_pendaftaran_kia') ? $this->request->getVar('page_pendaftaran_kia') : 1;

    // Digunakan untuk Pencarian Data
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKIA = $this->kiaModel->search($keyword);
    } else {
      $orangKIA = $this->kiaModel;
    }

    // Digunakan untuk menampilkan Detail data, Jumlah data per halaman serta Halamannya
    $data = [
      'title' => 'Data Pendaftaran KIA || Admin Disdukcapil',
      'pendaftaran_kia' => $this->kiaModel->getDataKIA(),
      'pendaftaran_kia' => $orangKIA->paginate(10, 'pendaftaran_kia'),
      'pager' => $this->kiaModel->pager,
      'currentPage' => $currentPageKIA
    ];
    return view('admin/pendaftaran_kia_admin', $data);
  }







  // Menampilkan data pendaftaran Surat Perpindahan pada halaman admin
  public function pendaftaran_suratperpindahan_admin()
  {
    // Digunakan untuk Pagination
    $currentPageSuratPerpindahan =  $this->request->getVar('page_pendaftaran_suratperpindahan') ? $this->request->getVar('page_pendaftaran_suratperpindahan') : 1;

    // Digunakan untuk Pencarian Data
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangSuratPerpindahan = $this->suratperpindahanModel->search($keyword);
    } else {
      $orangSuratPerpindahan = $this->suratperpindahanModel;
    }

    // Digunakan untuk menampilkan Detail data, Jumlah data per halaman serta Halamannya
    $data = [
      'title' => 'Data Pendaftaran Surat Perpindahan dari Majalengka ke Luar || Admin Disdukcapil',
      'pendaftaran_suratperpindahan' => $this->suratperpindahanModel->getDataSuratPerpindahan(),
      'pendaftaran_suratperpindahan' => $orangSuratPerpindahan->paginate(10, 'pendaftaran_suratperpindahan'),
      'pager' => $this->suratperpindahanModel->pager,
      'currentPage' => $currentPageSuratPerpindahan
    ];
    return view('admin/pendaftaran_suratperpindahan_admin', $data);
  }







  public function pendaftaran_suratperpindahanluar_admin()
  {
    // Digunakan untuk Pagination
    $currentPageSuratPerpindahanLuar = $this->request->getVar('page_pendaftaran_suratperpindahanluar') ? $this->request->getVar('page_pendaftaran_suratperpindahanluar') : 1;

    // Digunakan untuk Pencarian Data
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangSuratPerpindahanluar = $this->suratperpindahanluarModel->search($keyword);
    } else {
      $orangSuratPerpindahanluar = $this->suratperpindahanluarModel;
    }

    // Digunakan untuk menampilkan Detail data, Jumlah data per halaman serta Halamannya
    $data = [
      'title' => 'Data Pendaftaran Surat Perpindahan dari Luar ke Majalengka || Admin Disdukcapil',
      'pendaftaran_suratperpindahanluar' => $this->suratperpindahanluarModel->getDataSuratPerpindahanLuar(),
      'pendaftaran_suratperpindahanluar' => $orangSuratPerpindahanluar->paginate(10, 'pendaftaran_suratperpindahanluar'),
      'pager' => $this->suratperpindahanluarModel->pager,
      'currentPage' => $currentPageSuratPerpindahanLuar
    ];
    return  view('admin/pendaftaran_suratperpindahanluar_admin', $data);
  }







  // Menampilkan data aktakelahiran pada halaman Admin
  public function pendaftaran_aktakelahiran_admin()
  {
    // Digunakan untuk Pagination
    $currentPageAkla =  $this->request->getVar('page_pendaftaran_aktakelahiran') ? $this->request->getVar('page_pendaftaran_aktakelahiran') : 1;

    // Digunakan untuk Pencarian Data
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangAkla = $this->aktakelahiranModel->search($keyword);
    } else {
      $orangAkla = $this->aktakelahiranModel;
    }

    // Digunakan untuk menampilkan Detail data, Jumlah data per halaman serta halamannya
    $data = [
      'title' => 'Data Pendaftaran Akta Kelahiran || Admin Disdukcapil ',
      'pendaftaran_aktakelahiran' => $this->aktakelahiranModel->getDataAktaKelahiran(),
      'pendaftaran_aktakelahiran' => $orangAkla->paginate(10, 'pendaftaran_aktakelahiran'),
      'pager' => $this->aktakelahiranModel->pager,
      'currentPage' => $currentPageAkla
    ];
    return view('admin/pendaftaran_aktakelahiran_admin', $data);
  }








  // Menampilkan data Pendaftaran Akta Kematian pada halaman admin
  public function pendaftaran_aktakematian_admin()
  {
    // Menghubungkan Controller Admin degnan Pendaftaran aktakematian Model
    // $aktakematian = $this->aktalahirModel->findAll();
    $currentPageAkket =  $this->request->getVar('page_pendaftaran_aktakematian') ? $this->request->getVar('page_pendaftaran_aktakematian') : 1;
    $data = [
      'title' => 'Data Pendaftaran Akta Kematian || Admin Disdukcapil',
      'pendaftaran_aktakematian' => $this->aktakematianModel->getDataAktaKematian(),
      'pendaftaran_aktakematian' => $this->aktakematianModel->paginate(10, 'pendaftaran_aktakematian'),
      'pager' => $this->aktakematianModel->pager,
      'currentPage' => $currentPageAkket
    ];
    return view('admin/pendaftaran_aktakematian_admin', $data);
  }









  // Menampilkan Data Pendaftaran Keabsahan Akta Kelahiran Admin
  public function pendaftaran_keabsahanakla_admin()
  {
    // Menghubungkan Controller Admin degnan Pendaftaran aktakematian Model
    // $aktakematian = $this->aktalahirModel->findAll();
    $currentPageAkket =  $this->request->getVar('page_pendaftaran_aktakematian') ? $this->request->getVar('page_pendaftaran_aktakematian') : 1;
    $data = [
      'title' => 'Data Pendaftaran Keabsahan Akta Kelahiran || Admin Disdukcapil',
      'pendaftaran_keabsahanakla' => $this->keabsahanaklaModel->getDataKeabsahanakla(),
      'pendaftaran_keabsahanakla' => $this->keabsahanaklaModel->paginate(10, 'pendaftaran_keabsahanakla'),
      'pager' => $this->keabsahanaklaModel->pager,
      'currentPage' => $currentPageAkket
    ];
    return view('admin/pendaftaran_keabsahanakla_admin', $data);
  }









  // Menampilkan Data Pendaftaran Keabsahan Akta Kelahiran Admin
  public function pendaftaran_pelayanandata_admin()
  {
    // Menghubungkan Controller Admin degnan Pendaftaran aktakematian Model
    // $aktakematian = $this->aktalahirModel->findAll();
    $currentPagePelayananData =  $this->request->getVar('page_pendaftaran_pelayanandata') ? $this->request->getVar('page_pendaftaran_pelayanandata') : 1;
    $data = [
      'title' => 'Data Pendaftaran Pelayanan Data || Admin Disdukcapil',
      'pendaftaran_pelayanandata' => $this->pelayanandataModel->getDataPelayananData(),
      'pendaftaran_pelayanandata' => $this->pelayanandataModel->paginate(10, 'pendaftaran_pelayanandata'),
      'pager' => $this->pelayanandataModel->pager,
      'currentPage' => $currentPagePelayananData
    ];
    return view('admin/pendaftaran_pelayanandata_admin', $data);
  }








  // Menampilkan data Perbaikan data pada halaman Admin
  public function perbaikan_data_admin()
  {
    // Menghubungkan Controller Admin dengan Perbaikan data Model
    // $perbaikandata = $this->perbaikandataModel->findAll();
    $currentPagePerdat =  $this->request->getVar('page_perbaikan_data') ? $this->request->getVar('page_perbaikan_data') : 1;
    $data = [
      'title' => 'Data Pendaftaran Perbaikan Data || Admin Disdukcapil',
      'perbaikan_data' => $this->perbaikandataModel->getPerbaikanData(),
      'perbaikan_data' => $this->perbaikandataModel->paginate(10, 'perbaikan_data'),
      'pager' => $this->perbaikandataModel->pager,
      'currentPage' => $currentPagePerdat
    ];
    return view('admin/perbaikan_data_admin', $data);
  }








  // Menampilkan data Pengaduan Update pada halaman Admin
  public function pendaftaran_pengaduanupdate_admin()
  {
    // Menghubungkan Controller Admin dengan Pengaduan update Model
    // $pengaduanupdate = $this->pengaduanupdateModel->findAll();
    $currentPagePengdat =  $this->request->getVar('page_pengaduan_update') ? $this->request->getVar('page_pengaduan_update') : 1;
    $data = [
      'title' => 'Data Pendaftaran Pengaduan Update || Admin Disdukcapil',
      'pengaduan_update' => $this->pengaduanupdateModel->getDataPengaduanUpdate(),
      'pengaduan_update' => $this->pengaduanupdateModel->paginate(10, 'pengaduan_update'),
      'pager' => $this->pengaduanupdateModel->pager,
      'currentPage' => $currentPagePengdat
    ];
    return view('admin/pendaftaran_pengaduanupdate_admin', $data);
  }













  // Menampilkan Halaman Pelayanan KK
  // Digunakan untuk mengedit Judul, Foto dan Keterangan
  public function pelayananKK()
  {
    $data = [
      'title' => 'Pelayanan KK || Admin Disdukcapil '
    ];
    return view('admin/pelayananKK', $data);
  }
}
