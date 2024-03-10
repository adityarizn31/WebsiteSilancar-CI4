<?php

namespace App\Controllers;

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

class Searching extends BaseController
{
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
    $this->kkModel = new Pendaftaran_kk_Model();
    $this->kiaModel = new Pendaftaran_kia_Model();
    $this->kkperceraianModel = new Pendaftaran_kkperceraian_Model();
    $this->suratperpindahanModel = new Pendaftaran_suratperpindahan_Model();
    $this->suratperpindahanluarModel = new Pendaftaran_suratperpindahanluar_Model();

    $this->aktakematianModel = new Pendaftaran_aktakematian_Model();
    $this->aktakelahiranModel = new Pendaftaran_aktakelahiran_Model();
    $this->keabsahanaklaModel = new Pendaftaran_keabsahanakla_Model();

    $this->pelayanandataModel = new Pendaftaran_pelayanandata_Model();

    $this->perbaikandataModel = new Perbaikan_data_Model();
    $this->pengaduanupdateModel = new Pengaduan_update_Model();
  }













  public function index()
  {

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $this->kkModel->search($keyword)->withDeleted()->findAll();
      $this->kiaModel->search($keyword)->withDeleted()->findAll();
      $this->kkperceraianModel->search($keyword)->withDeleted()->findAll();
      $this->suratperpindahanModel->search($keyword)->withDeleted()->findAll();
      $this->suratperpindahanluarModel->search($keyword)->withDeleted()->findAll();
      $this->aktakelahiranModel->search($keyword)->withDeleted()->findAll();
      $this->aktakematianModel->search($keyword)->withDeleted()->findAll();
      $this->keabsahanaklaModel->search($keyword)->withDeleted()->findAll();
      $this->pelayanandataModel->search($keyword)->withDeleted()->findAll();
      $this->perbaikandataModel->search($keyword)->withDeleted()->findAll();
      $this->pengaduanupdateModel->search($keyword)->withDeleted()->findAll();
    } else {
      $orangKK = $this->kkModel;
      $orangKIA = $this->kiaModel;
      $orangKKPerceraian = $this->kkperceraianModel;
      $orangSuratPerpindahan = $this->suratperpindahanModel;
      $orangSuratPerpindahanLuar = $this->suratperpindahanluarModel;
      $orangAktaKelahiran = $this->aktakelahiranModel;
      $orangAktaKematian = $this->aktakematianModel;
      $orangKeabsahanAkla = $this->keabsahanaklaModel;
      $orangPelayananData = $this->pelayanandataModel;
      $orangPerbaikanData = $this->perbaikandataModel;
      $orangPengaduanUpdate = $this->pengaduanupdateModel;
    }

    $pendaftaran_kk = $this->kkModel->withDeleted()->findAll();
    $pendaftaran_kia = $this->kiaModel->withDeleted()->findAll();
    $pendaftaran_kk_perceraian = $this->kkperceraianModel->withDeleted()->findAll();
    $pendaftaran_suratperpindahan = $this->suratperpindahanModel->withDeleted()->findAll();
    $pendaftaran_suratperpindahanluar = $this->suratperpindahanluarModel->withDeleted()->findAll();
    $pendaftaran_aktakelahiran = $this->aktakelahiranModel->withDeleted()->findAll();
    $pendaftaran_aktakematian = $this->aktakematianModel->withDeleted()->findAll();
    $pendaftaran_keabsahanakla = $this->keabsahanaklaModel->withDeleted()->findAll();
    $pendaftaran_pelayanandata = $this->pelayanandataModel->withDeleted()->findAll();
    $pendaftaran_perbaikandata = $this->perbaikandataModel->withDeleted()->findAll();
    $pendaftaran_pengaduanupdate = $this->pengaduanupdateModel->withDeleted()->findAll();

    $data = [
      'title' => 'Pencarian Data || Disdukcapil Majalengka',
      'pendaftaran_kk' => $orangKK,
      'pendaftaran_kia' => $pendaftaran_kia,
      'pendaftaran_kk_perceraian' => $pendaftaran_kk_perceraian,
      'pendaftaran_suratperpindahan' => $pendaftaran_suratperpindahan,
      'pendaftaran_suratperpindahanluar' => $pendaftaran_suratperpindahanluar,
      'pendaftaran_aktakelahiran' => $pendaftaran_aktakelahiran,
      'pendaftaran_aktakematian' => $pendaftaran_aktakematian,
      'pendaftaran_keabsahanakla' => $pendaftaran_keabsahanakla,
      'pendaftaran_pelayanandata' => $pendaftaran_pelayanandata,
      'pendaftaran_perbaikandata' => $pendaftaran_perbaikandata,
      'pendaftaran_pengaduanupdate' => $pendaftaran_pengaduanupdate,
    ];
    return view('pencarian_views/index', $data);
  }









  public function cekKK()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKK = $this->kkModel->search($keyword);
    } else {
      $orangKK = $this->kkModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK || Disdukcapil Majalengka',
      'pendaftaran_kk' => $orangKK
    ];
    return view('pencarian_views/cekKK', $data);
  }









  public function cekKIA()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKIA = $this->kiaModel->search($keyword);
    } else {
      $orangKIA = $this->kiaModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KIA || Disdukcapil Majalengka',
      'pendaftaran_kia' => $orangKIA
    ];
    return view('pencarian_views/cekKIA', $data);
  }









  public function cekKKPerceraian()
  {

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKKPerceraian = $this->kkperceraianModel->search($keyword);
    } else {
      $orangKKPerceraian = $this->kkperceraianModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Perceraian || Disdukcapil Majalengka',
      'pendaftaran_kk_perceraian' => $orangKKPerceraian
    ];
    return view('pencarian_views/cekKKPerceraian', $data);
  }









  public function cekSuratPerpindahan()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangSuratPerpindahan = $this->suratperpindahanModel->search($keyword);
    } else {
      $orangSuratPerpindahan = $this->suratperpindahanModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Surat Perpindahan || Disdukcapil Majalengka',
      'pendaftaran_suratperpindahan' => $orangSuratPerpindahan
    ];
    return view('pencarian_views/cekSuratPerpindahan', $data);
  }









  public function cekSuratPerpindahanLuar()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangSuratPerpindahanLuar = $this->suratperpindahanluarModel->search('keyword');
    } else {
      $orangSuratPerpindahanLuar = $this->suratperpindahanluarModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK || Disdukcapil Majalengka',
      'pendaftaran_suratperpindahanluar' => $orangSuratPerpindahanLuar
    ];
    return view('pencarian_views/cekSuratPerpindahanLuar', $data);
  }









  public function cekAktaKelahiran()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangAktaKelahiran = $this->aktakelahiranModel->search($keyword);
    } else {
      $orangAktaKelahiran = $this->aktakelahiranModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Akta Kelahiran || Disdukcapil Majalengka',
      'pendaftaran_aktakelahiran' => $orangAktaKelahiran
    ];
    return view('pencarian_views/cekAktaKelahiran', $data);
  }









  public function cekAktaKematian()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangAktaKematian = $this->aktakematianModel->search($keyword);
    } else {
      $orangAktaKematian = $this->aktakematianModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Akta Kematian || Disdukcapil Majalengka',
      'pendaftaran_aktakematian' => $orangAktaKematian
    ];
    return view('pencarian_views/cekAktaKematian', $data);
  }









  public function cekKeabsahanAkla()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangKeabsahanAkla = $this->keabsahanaklaModel->search($keyword);
    } else {
      $orangKeabsahanAkla = $this->keabsahanaklaModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Keabsahan Akla || Disdukcapil Majalengka',
      'pendaftaran_keabsahanakla' => $orangKeabsahanAkla
    ];
    return view('pencarian_views/cekKeabsahanAkla', $data);
  }









  public function cekPelayananData()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangPelayananData = $this->pelayanandataModel->search($keyword);
    } else {
      $orangPelayananData = $this->pelayanandataModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Pelayanan Data || Disdukcapil Majalengka',
      'pendaftaran_pelayanandata' => $orangPelayananData
    ];
    return view('pencarian_views/cekPelayananData', $data);
  }









  public function cekPerbaikanData()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangPerbaikanData = $this->perbaikandataModel->search($keyword);
    } else {
      $orangPerbaikanData = $this->perbaikandataModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status PerbaikanData || Disdukcapil Majalengka',
      'perbaikan_data' => $orangPerbaikanData
    ];
    return view('pencarian_views/cekPerbaikanData', $data);
  }









  public function cekPengaduanUpdate()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangPengaduanUpdate = $this->pengaduanupdateModel->search($keyword);
    } else {
      $orangPengaduanUpdate = $this->pengaduanupdateModel;
    }

    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status PengaduanUpdate || Disdukcapil Majalengka',
      'pengaduan_update' => $orangPengaduanUpdate
    ];
    return view('pencarian_views/cekPengaduanUpdate', $data);
  }
}
