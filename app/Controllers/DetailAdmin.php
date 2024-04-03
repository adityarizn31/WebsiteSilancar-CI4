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

class DetailAdmin extends BaseController
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









  // Halaman Detail Akun Admin
  public function detail_akun_admin($nama)
  {
    $data = [
      'title' => 'Detail Akun Admin || Admin Disdukcapil',
      'admin' => $this->adminModel->getAkunAdmin($nama)
    ];
    return view('detailAdmin/detail_akun_admin', $data);
  }










  // Halaman Detail Berita Admin
  public function detail_berita_admin($judulBerita)
  {
    $data = [
      'title' => 'Detail Berita || Admin Disdukcapil',
      'berita' => $this->beritaModel->getBerita($judulBerita)
    ];
    return view('detailAdmin/detail_berita_admin', $data);
  }










  // Halaman Detail Inovasi Admin
  public function detail_inovasi_admin($judulInovasi)
  {
    $data = [
      'title' => 'Detail Inovasi || Admin Disdukcapil',
      'inovasi' => $this->inovasiModel->getInovasi($judulInovasi)
    ];
    return view('detailAdmin/detail_inovasi_admin', $data);
  }










  // Halaman Visi Misi Admin
  public function detail_visimisi_admin($visimisi)
  {
    $data = [
      'title' => 'Visi Misi Admin || Admin Disdukcapil',
      'visimisi' => $this->visimisiModel->getVisiMisi($visimisi)
    ];
    return view('detailAdmin/detail_visimisi_admin', $data);
  }










  // Halaman Persyaratan Si Lancar
  public function detail_persyaratansilancar_admin($persyaratansilancar)
  {
    $data = [
      'title' => 'Detail Persyaratan Si Lancar || Admin Disdukcapil',
      'persyaratansilancar' => $this->persyaratansilancarModel->getPersyaratan($persyaratansilancar)
    ];
    return view('detailAdmin/detail_persyaratansilancar_admin', $data);
  }








  // Halaman Pendaftaran KK
  public function detail_pendaftarankk_admin($namaPemohonKK)
  {
    $pendaftaran_kk = $this->kkModel->getDataKK($namaPemohonKK);
    $status = $pendaftaran_kk['status'];

    $data = [
      'title' => 'Detail Pendaftaran KK || Admin Disdukcapil',
      'pendaftaran_kk' => $this->kkModel->getDataKK($namaPemohonKK),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankk_admin', $data);
  }

  public function selesaiKK($namaPemohonKK)
  {
    $this->kkModel->updateStatus($namaPemohonKK, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kk_admin/' . $namaPemohonKK);
  }

  public function belumSelesaiKK($namaPemohonKK)
  {
    $this->kkModel->updateStatus($namaPemohonKK, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kk_admin/' . $namaPemohonKK);
  }










  // Halaman Pendaftaran KK Pemisahan
  public function detail_pendaftarankkpemisahan_admin($namaPemohonKKPemisahan)
  {
    $pendaftaran_kk_pemisahan = $this->kkpemisahanModel->getDataKKPemisahan($namaPemohonKKPemisahan);
    $status = $pendaftaran_kk_pemisahan['status'];

    $data = [
      'title' => 'Detail Pendaftaran KK Pemisahan || Admin Disdukcapil',
      'pendaftaran_kk_pemisahan' => $this->kkpemisahanModel->getDataKKPemisahan($namaPemohonKKPemisahan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankkpemisahan_admin', $data);
  }

  public function selesaiKKPemisahan($namaPemohonKKPemisahan)
  {
    $this->kkpemisahanModel->updateStatus($namaPemohonKKPemisahan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkpemisahan_admin/' . $namaPemohonKKPemisahan);
  }

  public function belumSelesaiKKPemisahan($namaPemohonKKPemisahan)
  {
    $this->kkpemisahanModel->updateStatus($namaPemohonKKPemisahan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkpemisahan_admin/' . $namaPemohonKKPemisahan);
  }










  // Halaman Pendaftaran KK Penambahan
  public function detail_pendaftarankkpenambahan_admin($namaPemohonKKPenambahan)
  {
    $pendaftaran_kk_penambahan = $this->kkpenambahanModel->getDataKKPenambahan($namaPemohonKKPenambahan);
    $status = $pendaftaran_kk_penambahan['status'];

    $data = [
      'title' => 'Detail Pendaftaran KK Penambahan || Admin Disdukcapil',
      'pendaftaran_kk_penambahan' => $this->kkpenambahanModel->getDataKKPenambahan($namaPemohonKKPenambahan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankkpenambahan_admin', $data);
  }

  public function selesaiKKPenambahan($namaPemohonKKPenambahan)
  {
    $this->kkpenambahanModel->updateStatus($namaPemohonKKPenambahan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkpenambahan_admin/' . $namaPemohonKKPenambahan);
  }

  public function belumSelesaiKKPenambahan($namaPemohonKKPenambahan)
  {
    $this->kkpenambahanModel->updateStatus($namaPemohonKKPenambahan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkpenambahan_admin/' . $namaPemohonKKPenambahan);
  }











  // Halaman Pendaftaran KK Pengurangan
  public function detail_pendaftarankkpengurangan_admin($namaPemohonKKPengurangan)
  {
    $pendaftaran_kk_pengurangan = $this->kkpenguranganModel->getDataKKPengurangan($namaPemohonKKPengurangan);
    $status = $pendaftaran_kk_pengurangan['status'];

    $data = [
      'title' => 'Detail Pendaftaran KK Pengurangan || Admin Disdukcapil',
      'pendaftaran_kk_pengurangan' => $this->kkpenguranganModel->getDataKKPengurangan($namaPemohonKKPengurangan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankkpengurangan_admin', $data);
  }

  public function selesaiKKPengurangan($namaPemohonKKPengurangan)
  {
    $this->kkpenguranganModel->updateStatus($namaPemohonKKPengurangan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkpengurangan_admin/' . $namaPemohonKKPengurangan);
  }

  public function belumSelesaiKKPengurangan($namaPemohonKKPengurangan)
  {
    $this->kkpenguranganModel->updateStatus($namaPemohonKKPengurangan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkpengurangan_admin/' . $namaPemohonKKPengurangan);
  }












  // Halaman Pendaftaran KK Perubahan
  public function detail_pendaftarankkperubahan_admin($namaPemohonKKPerubahan)
  {
    $pendaftaran_kk_perubahan = $this->kkperubahanModel->getDataKKPerubahan($namaPemohonKKPerubahan);
    $status = $pendaftaran_kk_perubahan['status'];

    $data = [
      'title' => 'Detail Pendaftaran KK Perubahan || Admin Disdukcapil',
      'pendaftaran_kk_perubahan' => $this->kkperubahanModel->getDataKKPerubahan($namaPemohonKKPerubahan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankkperubahan_admin', $data);
  }

  public function selesaiKKPerubahan($namaPemohonKKPerubahan)
  {
    $this->kkperubahanModel->updateStatus($namaPemohonKKPerubahan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkperubahan_admin/' . $namaPemohonKKPerubahan);
  }

  public function belumSelesaiKKPerubahan($namaPemohonKKPerubahan)
  {
    $this->kkperubahanModel->updateStatus($namaPemohonKKPerubahan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkperubahan_admin/' . $namaPemohonKKPerubahan);
  }










  // Halaman Pendaftaran KIA
  public function detail_pendaftarankia_admin($namaPemohonKIA)
  {
    $pendaftaran_kia = $this->kiaModel->getDataKIA($namaPemohonKIA);
    $status = $pendaftaran_kia['status'];

    $data = [
      'title' => 'Detail Pendaftaran KIA || Admin Disdukcapil',
      'pendaftaran_kia' => $this->kiaModel->getDataKIA($namaPemohonKIA),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankia_admin', $data);
  }

  public function selesaiKIA($namaPemohonKIA)
  {
    $this->kiaModel->updateStatus($namaPemohonKIA, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kia_admin/' . $namaPemohonKIA);
  }

  public function belumSelesaiKIA($namaPemohonKIA)
  {
    $this->kiaModel->updateStatus($namaPemohonKIA, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kia_admin/' . $namaPemohonKIA);
  }












  // Halaman Pendaftaran KK Perceraian
  public function detail_pendaftarankkperceraian_admin($namaPemohonKKPerceraian)
  {
    $pendaftaran_kk_perceraian = $this->kkperceraianModel->getDataKKPerceraian($namaPemohonKKPerceraian);
    $status = $pendaftaran_kk_perceraian['status'];

    $data = [
      'title' => 'Detail Pendaftaran KK Perceraian || Admin Disdukcapil',
      'pendaftaran_kk_perceraian' => $this->kkperceraianModel->getDataKKPerceraian($namaPemohonKKPerceraian),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankkperceraian_admin', $data);
  }

  public function selesaiKKPerceraian($namaPemohonKKPerceraian)
  {
    $this->kkperceraianModel->updateStatus($namaPemohonKKPerceraian, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkperceraian_admin/' . $namaPemohonKKPerceraian);
  }

  public function belumSelesaiKKPerceraian($namaPemohonKKPerceraian)
  {
    $this->kkperceraianModel->updateStatus($namaPemohonKKPerceraian, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_kkperceraian_admin/' . $namaPemohonKKPerceraian);
  }








  // Halaman Pendaftaran Surat Perpindahan
  public function detail_pendaftaransuratperpindahan_admin($namaPemohonSuratPerpindahan)
  {
    $pendaftaran_suratperpindahan = $this->suratperpindahanModel->getDataSuratPerpindahan($namaPemohonSuratPerpindahan);
    $status = $pendaftaran_suratperpindahan['status'];

    $data = [
      'title' => 'Detail Pendaftaran Surat Perpindahan || Admin Disdukcapil',
      'pendaftaran_suratperpindahan' => $this->suratperpindahanModel->getDataSuratPerpindahan($namaPemohonSuratPerpindahan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaransuratperpindahan_admin', $data);
  }

  public function selesaiSuratPerpindahan($namaPemohonSuratPerpindahan)
  {
    $this->suratperpindahanModel->updateStatus($namaPemohonSuratPerpindahan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_suratperpindahan_admin/' . $namaPemohonSuratPerpindahan);
  }

  public function belumSelesaiSuratPerpindahan($namaPemohonSuratPerpindahan)
  {
    $this->suratperpindahanModel->updateStatus($namaPemohonSuratPerpindahan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_suratperpindahan_admin/' . $namaPemohonSuratPerpindahan);
  }








  // Halaman Pendaftaran Surat Perpindahan Luar
  public function detail_pendaftaransuratperpindahanluar_admin($namaPemohonSuratPerpindahanLuar)
  {
    $pendaftaran_suratperpindahanluar = $this->suratperpindahanluarModel->getDataSuratPerpindahanLuar($namaPemohonSuratPerpindahanLuar);
    $status = $pendaftaran_suratperpindahanluar['status'];

    $data = [
      'title' => 'Detail Pendaftaran Surat Perpindahan Luar || Admin Disdukcapil',
      'pendaftaran_suratperpindahanluar' => $this->suratperpindahanluarModel->getDataSuratPerpindahanLuar($namaPemohonSuratPerpindahanLuar),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaransuratperpindahanluar_admin', $data);
  }

  public function selesaiSuratPerpindahanLuar($namaPemohonSuratPerpindahanLuar)
  {
    $this->suratperpindahanluarModel->updateStatus($namaPemohonSuratPerpindahanLuar, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_suratperpindahanluar_admin/' . $namaPemohonSuratPerpindahanLuar);
  }

  public function belumSelesaiSuratPerpindahanLuar($namaPemohonSuratPerpindahanLuar)
  {
    $this->suratperpindahanluarModel->updateStatus($namaPemohonSuratPerpindahanLuar, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_suratperpindahanluar_admin/' . $namaPemohonSuratPerpindahanLuar);
  }








  // Halaman Pendaftaran Akta Kelahiran
  public function detail_pendaftaranaktakelahiran_admin($namaPemohonAktalahir)
  {
    $pendaftaran_aktakelahiran = $this->aktakelahiranModel->getDataAktaKelahiran($namaPemohonAktalahir);
    $status = $pendaftaran_aktakelahiran['status'];

    $data = [
      'title' => 'Detail Pendaftaran Akta Kelahiran || Admin Disdukcapil',
      'pendaftaran_aktakelahiran' => $this->aktakelahiranModel->getDataAktakelahiran($namaPemohonAktalahir),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaranaktakelahiran_admin', $data);
  }

  public function selesaiAktaKelahiran($namaPemohonAktalahir)
  {
    $this->aktakelahiranModel->updateStatus($namaPemohonAktalahir, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_aktakelahiran_admin/' . $namaPemohonAktalahir);
  }

  public function belumSelesaiAktaKelahiran($namaPemohonAktalahir)
  {
    $this->aktakelahiranModel->updateStatus($namaPemohonAktalahir, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_aktakelahiran_admin/' . $namaPemohonAktalahir);
  }








  // Halaman Pendaftaran Akta Kematian
  public function detail_pendaftaranaktakematian_admin($namaPemohonAktakematian)
  {
    $pendaftaran_aktakematian = $this->aktakematianModel->getDataAktaKematian($namaPemohonAktakematian);
    $status = $pendaftaran_aktakematian['status'];

    $data = [
      'title' => 'Detail Pendaftaran Akta Kematian || Admin Disdukcapil',
      'pendaftaran_aktakematian' => $this->aktakematianModel->getDataAktakematian($namaPemohonAktakematian),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaranaktakematian_admin', $data);
  }

  public function selesaiAktaKematian($namaPemohonAktakematian)
  {
    $this->aktakematianModel->updateStatus($namaPemohonAktakematian, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_aktakematian_admin/' . $namaPemohonAktakematian);
  }

  public function belumSelesaiAktaKematian($namaPemohonAktakematian)
  {
    $this->aktakematianModel->updateStatus($namaPemohonAktakematian, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_aktakematian_admin/' . $namaPemohonAktakematian);
  }










  // Halamaan Pendaftaran Pendaftaran Keabsahan Akta Kelahiran
  public function detail_pendaftarankeabsahanaklaa_admin($namaPemohonKeabsahanAkla)
  {
    $pendaftaran_keabsahanakla = $this->keabsahanaklaModel->getDataKeabsahanakla($namaPemohonKeabsahanAkla);
    $status = $pendaftaran_keabsahanakla['status'];

    $data = [
      'title' => 'Detail Pendaftaran Keabsahan Akta Kelahiran || Admin Disdukcapil',
      'pendaftaran_keabsahanakla' => $this->keabsahanaklaModel->getDataKeabsahanakla($namaPemohonKeabsahanAkla),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftarankeabsahanaklaa_admin', $data);
  }

  public function selesaiKeabsahanAkla($namaPemohonKeabsahanAkla)
  {
    $this->keabsahanaklaModel->updateStatus($namaPemohonKeabsahanAkla, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_keabsahanakla_admin/' . $namaPemohonKeabsahanAkla);
  }

  public function belumSelesaiKeabsahanAkla($namaPemohonKeabsahanAkla)
  {
    $this->keabsahanaklaModel->updateStatus($namaPemohonKeabsahanAkla, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran telah gagal di verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_keabsahanakla_admin/' . $namaPemohonKeabsahanAkla);
  }









  // Halaman Pendaftaran Pelayanan Update
  public function detail_pendaftaranpelayananpemanfaatandata_admin($namaPemohonPelayananPemanfaatanData)
  {
    $pendaftaran_pelayanandata = $this->pelayanandataModel->getDataPelayananData($namaPemohonPelayananPemanfaatanData);
    $status = $pendaftaran_pelayanandata['status'];

    $data = [
      'title' => 'Detail Pendaftaran Pelayanan Pemanfaatan Data dan Inovasi antar Lembaga || Admin Disdukcapil',
      'pendaftaran_pelayanandata' => $this->pelayanandataModel->getDataPelayananData($namaPemohonPelayananPemanfaatanData),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaranpelayanandata_admin', $data);
  }

  public function selesaiPelayananPemanfaatanData($namaPemohonPelayananPemanfaatanData)
  {
    $this->pelayanandataModel->updateStatus($namaPemohonPelayananPemanfaatanData, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_pelayanandata_admin/' . $namaPemohonPelayananPemanfaatanData);
  }

  public function belumSelesaiPelayananPemanfaatanData($namaPemohonPelayananPemanfaatanData)
  {
    $this->pelayanandataModel->updateStatus($namaPemohonPelayananPemanfaatanData, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_pelayanandata_admin/' . $namaPemohonPelayananPemanfaatanData);
  }









  // Halaman Pendaftaran Perbaikan Data
  public function detail_pendaftaranperbaikandata_admin($namaPemohonPerbaikan)
  {
    $perbaikan_data = $this->perbaikandataModel->getPerbaikanData($namaPemohonPerbaikan);
    $status = $perbaikan_data['status'];

    $data = [
      'title' => 'Detail Perbaikan Data || Admin Disdukcapil',
      'perbaikan_data' => $this->perbaikandataModel->getPerbaikanData($namaPemohonPerbaikan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaranperbaikandata_admin', $data);
  }

  public function selesaiPerbaikanData($namaPemohonPerbaikan)
  {
    $this->perbaikandataModel->updateStatus($namaPemohonPerbaikan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/perbaikan_data_admin/' . $namaPemohonPerbaikan);
  }

  public function belumSelesaiPerbaikanData($namaPemohonPerbaikan)
  {
    $this->perbaikandataModel->updateStatus($namaPemohonPerbaikan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Gagal di Verifikasi !!');
    return redirect()->to('/Admin/perbaikan_data_admin/' . $namaPemohonPerbaikan);
  }









  // Halaman Pendaftaran Pengaduan Data
  public function detail_pendaftaranpengaduanupdate_admin($namaPemohonPengaduan)
  {
    $pengaduan_update = $this->pengaduanupdateModel->getDataPengaduanUpdate($namaPemohonPengaduan);
    $status = $pengaduan_update['status'];

    $data = [
      'title' => 'Detail Pengaduan Data || Admin Disdukcapil',
      'pengaduan_update' => $this->pengaduanupdateModel->getDataPengaduanUpdate($namaPemohonPengaduan),
      'status' => $status
    ];
    return view('detailAdmin/detail_pendaftaranpengaduanupdate_admin', $data);
  }

  public function selesaiPengaduanUpdate($namaPemohonPengaduan)
  {
    $this->pengaduanupdateModel->updateStatus($namaPemohonPengaduan, 'Selesai Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran Telah Selesai di Verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_pengaduanupdate_admin/' . $namaPemohonPengaduan);
  }

  public function belumSelesaiPengaduanUpdate($namaPemohonPengaduan)
  {
    $this->pengaduanupdateModel->updateStatus($namaPemohonPengaduan, 'Gagal Verifikasi');
    session()->setFlashdata('pesan', 'Pendaftaran telah gagal di verifikasi !!');
    return redirect()->to('/Admin/pendaftaran_pengaduanupdate_admin/' . $namaPemohonPengaduan);
  }
}
