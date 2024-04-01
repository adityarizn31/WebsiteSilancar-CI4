<?php

namespace App\Controllers;

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

class Searching extends BaseController
{
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













  public function index()
  {
    $data = [
      'title' => 'Pencarian Data || Disdukcapil Majalengka'
    ];
    return view('pencarian_views/index', $data);
  }









  public function cekKK()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK || Disdukcapil Majalengka',
      'pendaftaran_kk' => $this->kkModel
    ];
    return view('pencarian_views/cekKK', $data);
  }

  public function cariKK()
  {
    $data = [
      'title' => 'Hasil Status KK || Disdukcapil Majalengka',
      'pendaftaran_kk' => $this->kkModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk = $this->kkModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_kk)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKK', ['pendaftaran_kk' => $pendaftaran_kk], $data);
  }









  public function cekKKPemisahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Pemisahan || Disdukcapil Majalengka',
      'pendaftaran_kk_pemisahan' => $this->kkpemisahanModel
    ];
    return view('pencarian_views/cekKKPemisahan', $data);
  }

  public function cariKKPemisahan()
  {
    $data = [
      'title' => 'Hasil Status KK Pemisahan || Disdukcapil Majalengka',
      'pendaftaran_kk_pemisahan' => $this->kkpemisahanModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_pemisahan = $this->kkpemisahanModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_kk_pemisahan)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKKPemisahan', ['pendaftaran_kk_pemisahan' => $pendaftaran_kk_pemisahan], $data);
  }









  public function cekKKPenambahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Penambahan || Disdukcapil Majalengka',
      'pendaftaran_kk_penambahan' => $this->kkpenambahanModel
    ];
    return view('pencarian_views/cekKKPenambahan', $data);
  }

  public function cariKKPenambahan()
  {
    $data = [
      'title' => 'Hasil Status KK Penambahan || Disdukcapil Majalengka',
      'pendaftaran_kk_penambahan' => $this->kkpenambahanModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_penambahan = $this->kkpenambahanModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_kk_penambahan)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKKPenambahan', ['pendaftaran_kk_penambahan' => $pendaftaran_kk_penambahan], $data);
  }









  public function cekKKPengurangan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Pengurangan || Disdukcapil Majalengka',
      'pendaftaran_kk_pengurangan' => $this->kkpenguranganModel
    ];
    return view('pencarian_views/cekKKPengurangan', $data);
  }

  public function cariKKPengurangan()
  {
    $data = [
      'title' => 'Hasil Status KK Pengurangan || Disdukcapil Majalengka',
      'pendaftaran_kk_pengurangan' => $this->kkpenguranganModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_pengurangan = $this->kkpenguranganModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_kk_pengurangan)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKKPengurangan', ['pendaftaran_kk_pengurangan' => $pendaftaran_kk_pengurangan], $data);
  }









  public function cekKKPerubahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Perubahan || Disdukcapil Majalengka',
      'pendaftaran_kk_perubahan' => $this->kkperubahanModel
    ];
    return view('pencarian_views/cekKKPerubahan', $data);
  }

  public function cariKKPerubahan()
  {
    $data = [
      'title' => 'Hasil Status KK Perubahan || Disdukcapil Majalengka',
      'pendaftaran_kk_perubahan' => $this->kkperubahanModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_perubahan = $this->kkperubahanModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_kk_perubahan)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKKPerubahan', ['pendaftaran_kk_perubahan' => $pendaftaran_kk_perubahan], $data);
  }





  public function cekKKPerceraian()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Perceraian || Disdukcapil Majalengka',
      'pendaftaran_kk_perceraian' => $this->kkperceraianModel
    ];
    return view('pencarian_views/cekKKPerceraian', $data);
  }

  public function cariKKPerceraian()
  {
    $data = [
      'title' => 'Hasil Status KK Perceraian || Disdukcapil Majalengka',
      'pendaftaran_kk_perceraian' => $this->kkperceraianModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kia = $this->kiaModel->search($keyword)->get()->getResultArray();

    return view('pencarian_views/hasilKKPerceraian', ['pendaftaran_kia' => $pendaftaran_kia], $data);
  }









  public function cekKIA()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KIA || Disdukcapil Majalengka',
      'pendaftaran_kia' => $this->kiaModel
    ];
    return view('pencarian_views/cekKIA', $data);
  }

  public function cariKIA()
  {
    $data = [
      'title' => 'Hasil Status KIA || Disdukcapil Majalengka',
      'pendaftaran_kia' => $this->kiaModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kia = $this->kiaModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_kia)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKIA', ['pendaftaran_kia' => $pendaftaran_kia], $data);
  }










  public function cekSuratPerpindahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Surat Perpindahan || Disdukcapil Majalengka',
      'pendaftaran_suratperpindahan' => $this->suratperpindahanModel
    ];
    return view('pencarian_views/cekSuratPerpindahan', $data);
  }

  public function cariSuratPerpindahan()
  {
    $data = [
      'title' => 'Hasil Status Surat Perpindahan || Disdukcapil Majalengka',
      'pendaftaran_suratperpindahan' => $this->suratperpindahanModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_suratperpindahan = $this->suratperpindahanModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_suratperpindahan)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilSuratPerpindahan', ['pendaftaran_suratperpindahan' => $pendaftaran_suratperpindahan], $data);
  }









  public function cekSuratPerpindahanLuar()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK || Disdukcapil Majalengka',
      'pendaftaran_suratperpindahanluar' => $this->suratperpindahanluarModel
    ];
    return view('pencarian_views/cekSuratPerpindahanLuar', $data);
  }

  public function cariSuratPerpindahanLuar()
  {
    $data = [
      'title' => 'Hasil Status Surat Perpindahan Luar || Disdukcapil Majalengka',
      'pendaftaran_suratperpindahanluar' => $this->suratperpindahanluarModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_suratperpindahanluar = $this->suratperpindahanluarModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_suratperpindahanluar)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilSuratPerpindahanLuar', ['pendaftaran_kk' => $pendaftaran_suratperpindahanluar], $data);
  }









  public function cekAktaKelahiran()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Akta Kelahiran || Disdukcapil Majalengka',
      'pendaftaran_aktakelahiran' => $this->aktakelahiranModel
    ];
    return view('pencarian_views/cekAktaKelahiran', $data);
  }

  public function cariAktaKelahiran()
  {
    $data = [
      'title' => 'Hasil Status Akta Kelahiran || Disdukcapil Majalengka',
      'pendaftaran_aktakelahiran' => $this->aktakelahiranModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_aktakelahiran = $this->aktakelahiranModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_aktakelahiran)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilAktaKelahiran', ['pendaftaran_aktakelahiran' => $pendaftaran_aktakelahiran], $data);
  }









  public function cekAktaKematian()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Akta Kematian || Disdukcapil Majalengka',
      'pendaftaran_aktakematian' => $this->aktakematianModel
    ];
    return view('pencarian_views/cekAktaKematian', $data);
  }

  public function cariAktaKematian()
  {
    $data = [
      'title' => 'Hasil Status Akta Kematian || Disdukcapil Majalengka',
      'pendaftaran_aktakematian' => $this->aktakematianModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_aktakematian = $this->aktakematianModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_aktakematian)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilAktaKematian', ['pendaftaran_aktakematian' => $pendaftaran_aktakematian], $data);
  }









  public function cekKeabsahanAkla()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Keabsahan Akla || Disdukcapil Majalengka',
      'pendaftaran_keabsahanakla' => $this->keabsahanaklaModel
    ];
    return view('pencarian_views/cekKeabsahanAkla', $data);
  }

  public function cariKeabsahanAkla()
  {
    $data = [
      'title' => 'Hasil Status Keabsahan Akta Kelahiran || Disdukcapil Majalengka',
      'pendaftaran_keabsahanakla' => $this->keabsahanaklaModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_keabsahanakla = $this->keabsahanaklaModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_keabsahanakla)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKeabsahanAkla', ['pendaftaran_keabsahanakla' => $pendaftaran_keabsahanakla], $data);
  }









  public function cekPelayananData()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status Pelayanan Data || Disdukcapil Majalengka',
      'pendaftaran_pelayanandata' => $this->pelayanandataModel
    ];
    return view('pencarian_views/cekPelayananData', $data);
  }

  public function cariPelayananData()
  {
    $data = [
      'title' => 'Hasil Status Pelayanan Data || Disdukcapil Majalengka',
      'pendaftaran_pelayanandata' => $this->pelayanandataModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_pelayanandata = $this->pelayanandataModel->search($keyword)->get()->getResultArray();

    if (empty($pendaftaran_pelayanandata)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilPelayananData', ['pendaftaran_pelayanandata' => $pendaftaran_pelayanandata], $data);
  }









  public function cekPerbaikanData()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status PerbaikanData || Disdukcapil Majalengka',
      'perbaikan_data' => $this->perbaikandataModel
    ];
    return view('pencarian_views/cekPerbaikanData', $data);
  }

  public function cariPerbaikanData()
  {
    $data = [
      'title' => 'Hasil Status Perbaikan Data || Disdukcapil Majalengka',
      'perbaikan_data' => $this->perbaikandataModel
    ];

    $keyword = $this->request->getVar('keyword');
    $perbaikan_data = $this->perbaikandataModel->search($keyword)->get()->getResultArray();

    if (empty($perbaikan_data)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilPerbaikanData', ['perbaikan_data' => $perbaikan_data], $data);
  }









  public function cekPengaduanUpdate()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status PengaduanUpdate || Disdukcapil Majalengka',
      'pengaduan_update' => $this->pengaduanupdateModel
    ];
    return view('pencarian_views/cekPengaduanUpdate', $data);
  }

  public function cariPengaduanUpdate()
  {
    $data = [
      'title' => 'Hasil Status Pengaduan Update || Disdukcapil Majalengka',
      'pengaduan_update' => $this->pengaduanupdateModel
    ];

    $keyword = $this->request->getVar('keyword');
    $pengaduan_update = $this->pengaduanupdateModel->search($keyword)->get()->getResultArray();

    if (empty($pengaduan_update)) {
      return redirect()->back()->with('error', 'No results found for the provided NIK');
    }

    return view('pencarian_views/hasilKK', ['pengaduan_update' => $pengaduan_update], $data);
  }
}
