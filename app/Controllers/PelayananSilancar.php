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

class PelayananSilancar extends BaseController
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

  protected $perbaikannikModel;

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

    $this->aktakelahiranModel = new Pendaftaran_aktakelahiran_Model();
    $this->aktakematianModel = new Pendaftaran_aktakematian_Model();
    $this->keabsahanaklaModel = new Pendaftaran_keabsahanakla_Model();

    $this->pelayanandataModel = new Pendaftaran_pelayanandata_Model();

    $this->perbaikandataModel = new Perbaikan_data_Model();
    $this->pengaduanupdateModel = new Pengaduan_update_Model();
  }

  public function index()
  {
    $data = [
      'title' => 'Pelayanan Online || Disdukcapil Majalengka'
    ];
    return view('pelayanan_views/index', $data);
  }









  // Pendaftaran Kartu Keluarga
  public function pendaftaranKK()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KK || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKK', $data);
  }

  public function saveKK()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kk.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kk.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kk.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kk.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'formulirdesa' => [
        'rules' => 'uploaded[formulirdesa]|max_size[formulirdesa,2048]|mime_in[formulirdesa,application/pdf]|ext_in[formulirdesa,pdf]',
        'errors' => [
          'uploaded' => 'Formulir Desa Harus Diisi !!',
          'max_size' => 'File Formulir Desa terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Formulir Desa Harus PDF !!',
          'ext_in' => 'Format Formulir Desa Harus PDF !!'
        ],
      ],
      'kartukeluargasuami' => [
        'rules' => 'uploaded[kartukeluargasuami]|max_size[kartukeluargasuami,2048]|mime_in[kartukeluargasuami,application/pdf]|ext_in[kartukeluargasuami,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Suami Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Harus PDF !!',
          'ext_in' => ''
        ],
      ],
      'kartukeluargaistri' => [
        'rules' => 'uploaded[kartukeluargaistri]|max_size[kartukeluargaistri,2048]|mime_in[kartukeluargaistri,application/pdf]|ext_in[kartukeluargaistri,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Istri Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Harus PDF !!',
          'ext_in' => ''
        ],
      ],
      'suratnikah' => [
        'rules' => 'uploaded[suratnikah]|max_size[suratnikah,2048]|mime_in[suratnikah,application/pdf]|ext_in[suratnikah,pdf]',
        'errors' => [
          'uploaded' => 'Surat Nikah Harus Diisi !!',
          'max_size' => 'File Surat Nikah terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Nikah Harus PDF !!',
          'ext_in' => 'Format Surat Nikah Harus PDF !!'
        ],
      ],
      'suratpindah' => [
        'rules' => 'uploaded[suratpindah]|max_size[suratpindah,2048]|mime_in[suratpindah,application/pdf]|ext_in[suratpindah,pdf]',
        'errors' => [
          'uploaded' => 'Surat Pindah Harus Diisi !!',
          'max_size' => 'File Surat Pindah terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Pindah Harus PDF !!',
          'ext_in' => 'Format Surat Pindah Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KK = $fileFotoKTP->getRandomName();
      $fileFotoKTP->move('pelayanan/kk', $namaFotoKTP_KK);
    }

    $berkasFormulirDesa_KK = $this->request->getFile('formulirdesa');
    $namaFormulirDesa_KK = $berkasFormulirDesa_KK->getName();
    $berkasFormulirDesa_KK->move('pelayanan/kk', $namaFormulirDesa_KK);

    $berkasKKSuami_KK = $this->request->getFile('kartukeluargasuami');
    $namaKKSuami_KK = $berkasKKSuami_KK->getName();
    $berkasKKSuami_KK->move('pelayanan/kk', $namaKKSuami_KK);

    $berkasKKIstri_KK = $this->request->getFile('kartukeluargaistri');
    $namaKKIstri_KK = $berkasKKIstri_KK->getName();
    $berkasKKIstri_KK->move('pelayanan/kk', $namaKKIstri_KK);

    $berkasSuratNikah_KK = $this->request->getFile('suratnikah');
    $namaSuratNikah_KK = $berkasSuratNikah_KK->getName();
    $berkasSuratNikah_KK->move('pelayanan/kk', $namaSuratNikah_KK);

    $berkasSuratPindah_KK = $this->request->getFile('suratpindah');
    $namaSuratPindah_KK = $berkasSuratPindah_KK->getName();
    $berkasSuratPindah_KK->move('pelayanan/kk', $namaSuratPindah_KK);

    $this->kkModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KK,
      'formulirdesa' => $namaFormulirDesa_KK,
      'kartukeluargasuami' => $namaKKSuami_KK,
      'kartukeluargaistri' => $namaKKIstri_KK,
      'suratnikah' => $namaSuratNikah_KK,
      'suratpindah' => $namaSuratPindah_KK
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Keluarga Baru Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKK');
  }









  // Pendaftaran Kartu Keluarga Pemisahan
  public function pendaftaranKKPemisahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KK Pemisahan Anggota Keluarga || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKKPemisahan', $data);
  }

  public function saveKKPemisahan()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kk_pemisahan.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kk_pemisahan.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kk_pemisahan.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kk_pemisahan.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluargalama' => [
        'rules' => 'uploaded[kartukeluargalama]|max_size[kartukeluargalama,2048]|mime_in[kartukeluargalama,application/pdf]|ext_in[kartukeluargalama,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Kartu Keluarga Lama Harus Diisi !!',
          'max_size' => 'Berkas Kartu Keluarga Lama terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Lama Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Lama Harus PDF !!'
        ],
      ],
      'filepemisahan' => [
        'rules' => 'uploaded[filepemisahan]|max_size[filepemisahan,2048]|mime_in[filepemisahan,application/pdf]|ext_in[filepemisahan,pdf]',
        'errors' => [
          'uploaded' => 'Berkas File Pemisahan Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Pemisahan Harus PDF !!',
          'ext_in' => 'Format File Pemisahan Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KKPemisahan = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/kkpemisahan', $namaFotoKTP_KKPemisahan);
    }

    $berkasKartuKeluargaLama_KKPemisahan = $this->request->getFile('kartukeluargalama');
    $namaKartuKeluargaLama_KKPemisahan = $berkasKartuKeluargaLama_KKPemisahan->getName();
    $berkasKartuKeluargaLama_KKPemisahan->move('pelayanan/kkpemisahan', $namaKartuKeluargaLama_KKPemisahan);

    $berkasFilePemisahan_KKPemisahan = $this->request->getFile('filepemisahan');
    $namaFilePemisahan = $berkasFilePemisahan_KKPemisahan->getName();
    $berkasFilePemisahan_KKPemisahan->move('pelayanan/kkpemisahan', $namaFilePemisahan);

    $this->kkpemisahanModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KKPemisahan,
      'kartukeluargalama' => $namaKartuKeluargaLama_KKPemisahan,
      'filepemisahan' => $namaFilePemisahan
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Keluarga Pemisahan Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKKPemisahan');
  }









  // Pendaftaran Kartu Keluarga Penambahan
  public function pendaftaranKKPenambahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KK Penambahan Anggota Keluarga || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKKPenambahan', $data);
  }

  public function saveKKPenambahan()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kk_penambahan.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kk_penambahan.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kk_penambahan.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kk_penambahan.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluargalama' => [
        'rules' => 'uploaded[kartukeluargalama]|max_size[kartukeluargalama,2048]|mime_in[kartukeluargalama,application/pdf]|ext_in[kartukeluargalama,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Kartu Keluarga Lama Harus Diisi !!',
          'max_size' => 'Berkas Kartu Keluarga Lama terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Lama Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Lama Harus PDF !!'
        ],
      ],
      'suratnikah' => [
        'rules' => 'uploaded[suratnikah]|max_size[suratnikah,2048]|mime_in[suratnikah,application/pdf]|ext_in[suratnikah,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Surat Nikah Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Nikah Harus PDF !!',
          'ext_in' => 'Format Surat Nikah Harus PDF !!'
        ],
      ],
      'suratketeranganlahir' => [
        'rules' => 'uploaded[suratketeranganlahir]|max_size[suratketeranganlahir,2048]|mime_in[suratketeranganlahir,application/pdf]|ext_in[suratketeranganlahir,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Surat Keterangan Lahir Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Keterangan Lahir Harus PDF !!',
          'ext_in' => 'Format Surat Keterangan Lahir Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KKPenambahan = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/kkpenambahan', $namaFotoKTP_KKPenambahan);
    }

    $berkasKartuKeluargaLama_KKPenambahan = $this->request->getFile('kartukeluargalama');
    $namaKartuKeluargaLama_KKPenambahan = $berkasKartuKeluargaLama_KKPenambahan->getName();
    $berkasKartuKeluargaLama_KKPenambahan->move('pelayanan/kkpenambahan', $namaKartuKeluargaLama_KKPenambahan);

    $berkasSuratNikah_KKPenambahan = $this->request->getFile('suratnikah');
    $namaSuratNikah_KKPenambahan = $berkasSuratNikah_KKPenambahan->getName();
    $berkasSuratNikah_KKPenambahan->move('pelayanan/kkpenambahan', $namaSuratNikah_KKPenambahan);

    $berkasSuratKeteranganLahir_KKPenambahan = $this->request->getFile('suratketeranganlahir');
    $namaSuratKeteranganLahir_KKPenambahan = $berkasSuratKeteranganLahir_KKPenambahan->getName();
    $berkasSuratKeteranganLahir_KKPenambahan->move('pelayanan/kkpenambahan', $namaSuratKeteranganLahir_KKPenambahan);

    $this->kkpenambahanModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KKPenambahan,
      'kartukeluargalama' => $namaKartuKeluargaLama_KKPenambahan,
      'suratnikah' => $namaSuratNikah_KKPenambahan,
      'suratketeranganlahir' => $namaSuratKeteranganLahir_KKPenambahan
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Keluarga Penambahan Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKKPenambahan');
  }










  // Pendaftaran Kartu Keluarga Pengurangan
  public function pendaftaranKKPengurangan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KK Pengurangan Anggota Keluarga || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKKPengurangan', $data);
  }

  public function saveKKPengurangan()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kk_pengurangan.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kk_pengurangan.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kk_pengurangan.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kk_pengurangan.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluargalama' => [
        'rules' => 'uploaded[kartukeluargalama]|max_size[kartukeluargalama,2048]|mime_in[kartukeluargalama,application/pdf]|ext_in[kartukeluargalama,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Kartu Keluarga Lama Harus Diisi !!',
          'max_size' => 'Berkas Kartu Keluarga Lama terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Lama Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Lama Harus PDF !!'
        ],
      ],
      'filepengurangan' => [
        'rules' => 'uploaded[filepengurangan]|max_size[filepengurangan,2048]|mime_in[filepengurangan,application/pdf]|ext_in[filepengurangan,pdf]',
        'errors' => [
          'uploaded' => 'Berkas File Pengurangan Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Pengurangan Harus PDF !!',
          'ext_in' => 'Format File Pengurangan Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KKPengurangan = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/kkpengurangan', $namaFotoKTP_KKPengurangan);
    }

    $berkasKartuKeluargaLama_KKPengurangan = $this->request->getFile('kartukeluargalama');
    $namaKartuKeluargaLama_KKPengurangan = $berkasKartuKeluargaLama_KKPengurangan->getName();
    $berkasKartuKeluargaLama_KKPengurangan->move('pelayanan/kkpengurangan', $namaKartuKeluargaLama_KKPengurangan);

    $berkasFilePengurangan_KKPengurangan = $this->request->getFile('filepengurangan');
    $namaFilePengurangan_KKPengurangan = $berkasFilePengurangan_KKPengurangan->getName();
    $berkasFilePengurangan_KKPengurangan->move('pelayanan/kkpengurangan', $namaFilePengurangan_KKPengurangan);

    $this->kkpenguranganModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KKPengurangan,
      'kartukeluargalama' => $namaKartuKeluargaLama_KKPengurangan,
      'filepengurangan' => $namaFilePengurangan_KKPengurangan
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Keluarga Pengurangan Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKKPengurangan');
  }










  // Pendaftaran Kartu Keluarga Perubahan
  public function pendaftaranKKPerubahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KK Perubahan Anggota Keluarga || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKKPerubahan', $data);
  }

  public function saveKKPerubahan()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kk_perubahan.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kk_perubahan.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kk_perubahan.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kk_perubahan.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluargalama' => [
        'rules' => 'uploaded[kartukeluargalama]|max_size[kartukeluargalama,2048]|mime_in[kartukeluargalama,application/pdf]|ext_in[kartukeluargalama,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Kartu Keluarga Lama Harus Diisi !!',
          'max_size' => 'Berkas Kartu Keluarga Lama terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Lama Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Lama Harus PDF !!'
        ],
      ],
      'suratnikah' => [
        'rules' => 'uploaded[suratnikah]|max_size[suratnikah,2048]|mime_in[suratnikah,application/pdf]|ext_in[suratnikah,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Surat Nikah Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Nikah Harus PDF !!',
          'ext_in' => 'Format Surat Nikah Harus PDF !!'
        ],
      ],
      'fileperubahan' => [
        'rules' => 'uploaded[fileperubahan]|max_size[fileperubahan,2048]|mime_in[fileperubahan,application/pdf]|ext_in[fileperubahan,pdf]',
        'errors' => [
          'uploaded' => 'Berkas File Perubahan Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Perubahan Harus PDF !!',
          'ext_in' => 'Format File Perubahan Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KKPerubahan = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/kkperubahan', $namaFotoKTP_KKPerubahan);
    }

    $berkasKartuKeluargaLama_KKPerubahan = $this->request->getFile('kartukeluargalama');
    $namaKartuKeluargaLama_KKPerubahan = $berkasKartuKeluargaLama_KKPerubahan->getName();
    $berkasKartuKeluargaLama_KKPerubahan->move('pelayanan/kkperubahan', $namaKartuKeluargaLama_KKPerubahan);

    $berkasSuratNikah_KKPerubahan = $this->request->getFile('suratnikah');
    $namaSuratNikah_KKPerubahan = $berkasSuratNikah_KKPerubahan->getName();
    $berkasSuratNikah_KKPerubahan->move('pelayanan/kkperubahan', $namaSuratNikah_KKPerubahan);

    $berkasFilePerubahan_KKPerubahan = $this->request->getFile('fileperubahan');
    $namaFilePerubahan_KKPerubahan = $berkasFilePerubahan_KKPerubahan->getName();
    $berkasFilePerubahan_KKPerubahan->move('pelayanan/kkperubahan', $namaFilePerubahan_KKPerubahan);

    $this->kkperubahanModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KKPerubahan,
      'kartukeluargalama' => $namaKartuKeluargaLama_KKPerubahan,
      'suratnikah' => $namaSuratNikah_KKPerubahan,
      'fileperubahan' => $namaFilePerubahan_KKPerubahan
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Keluarga Pengurangan Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKKPerubahan');
  }











  // Pendaftaran Kartu Identitas Anak
  public function pendaftaranKIA()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KIA || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKIA', $data);
  }

  public function saveKIA()
  {

    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kia.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kia.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kia.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kia.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'aktakelahiran' => [
        'rules' => 'uploaded[aktakelahiran]|max_size[aktakelahiran,2048]|mime_in[aktakelahiran,application/pdf]|ext_in[aktakelahiran,pdf]',
        'errors' => [
          'uploaded' => 'Akta Kelahiran Harus Diisi !!',
          'max_size' => 'File Akta Kelahiran terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Harus PDF !!',
          'ext_in' => ''
        ],
      ],
      'kartukeluarga' => [
        'rules' => 'uploaded[kartukeluarga]|max_size[kartukeluarga,2048]|mime_in[kartukeluarga,application/pdf]|ext_in[kartukeluarga,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Harus Diisi !!',
          'max_size' => 'File Kartu Keluarga terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Harus PDF !!',
          'ext_in' => ''
        ],
      ],
      'pasfoto' => [
        'rules' => 'max_size[pasfoto,2048]|is_image[pasfoto]|mime_in[pasfoto,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KIA = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/kia', $namaFotoKTP_KIA);
    }

    $berkasAktaKelahiran_KIA = $this->request->getFile('aktakelahiran');
    $namaAktaKelahiran_KIA = $berkasAktaKelahiran_KIA->getName();
    $berkasAktaKelahiran_KIA->move('pelayanan/kia', $namaAktaKelahiran_KIA);

    $berkasKartuKeluarga_KIA = $this->request->getFile('kartukeluarga');
    $namaKartuKeluarga_KIA = $berkasKartuKeluarga_KIA->getName();
    $berkasKartuKeluarga_KIA->move('pelayanan/kia', $namaKartuKeluarga_KIA);

    // Cara Memanggil Gambar
    $filePasFoto = $this->request->getFile('pasfoto');
    if ($filePasFoto->getError() == 4) {
      $namaPasFoto_KIA = 'user.PNG';
    } else {
      // Generate nama foto anak random
      $namaPasFoto_KIA = $filePasFoto->getName();
      // Memindahkan File Gambar ke Folder Pelayanan / KIA
      $filePasFoto->move('pelayanan/kia', $namaPasFoto_KIA);
    }

    $this->kiaModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KIA,
      'aktakelahiran' => $namaAktaKelahiran_KIA,
      'kartukeluarga' => $namaKartuKeluarga_KIA,
      'pasfoto' => $namaPasFoto_KIA
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Identitas Anak Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKIA');
  }







  // Pendaftaran Kartu Keluarga Perceraian
  public function pendaftaranKKPerceraian()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran KK Perceraian || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKKPerceraian', $data);
  }

  public function saveKKPerceraian()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_kk_perceraian.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_kk_perceraian.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_kk_perceraian.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_kk_perceraian.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluargalama' => [
        'rules' => 'uploaded[kartukeluargalama]|max_size[kartukeluargalama,2048]|mime_in[kartukeluargalama,application/pdf]|ext_in[kartukeluargalama,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Lama Harus Diisi !!',
          'max_size' => 'File Kartu Keluarga Lama terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Lama Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Lama Harus PDF !!'
        ],
      ],
      'aktaperceraian' => [
        'rules' => 'uploaded[aktaperceraian]|max_size[aktaperceraian,2048]|mime_in[aktaperceraian,application/pdf]|ext_in[aktaperceraian,pdf]',
        'errors' => [
          'uploaded' => 'Akta Perceraian Harus Diisi !!',
          'max_size' => 'File Akta Perceraian terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Akta Perceraian Harus PDF !!',
          'ext_in' => 'Format Akta Perceraian Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KKPerceraian = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/kkperceraian', $namaFotoKTP_KKPerceraian);
    }

    $berkasKartuKeluargaLama_KKPerceraian = $this->request->getFile('kartukeluargalama');
    $namaKartuKeluargaLama_KKPerceraian = $berkasKartuKeluargaLama_KKPerceraian->getName();
    $berkasKartuKeluargaLama_KKPerceraian->move('pelayanan/kkperceraian', $namaKartuKeluargaLama_KKPerceraian);

    $berkasAktaPerceraian_KKPerceraian = $this->request->getFile('aktaperceraian');
    $namaAktaPerceraian_KKPerceraian = $berkasAktaPerceraian_KKPerceraian->getName();
    $berkasAktaPerceraian_KKPerceraian->move('pelayanan/kkperceraian', $namaAktaPerceraian_KKPerceraian);

    $this->kkperceraianModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KKPerceraian,
      'kartukeluargalama' => $namaKartuKeluargaLama_KKPerceraian,
      'aktaperceraian' => $namaAktaPerceraian_KKPerceraian
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Kartu Keluarga Perceraian Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKKPerceraian');
  }






















  // Pendaftaran Surat Perpindahan dari Majalengka ke Luar
  public function pendaftaranSuratPerpindahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Surat Perpindahan dari Majalengka Menuju Luar|| Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranSuratPerpindahan', $data);
  }

  public function saveSuratPindah()
  {

    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_suratperpindahan.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_suratperpindahan.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_suratperpindahan.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_suratperpindahan.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluarga' => [
        'rules' => 'uploaded[kartukeluarga]|max_size[kartukeluarga,2048]|mime_in[kartukeluarga,application/pdf]|ext_in[kartukeluarga,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Harus PDF !!'
        ],
      ],
      'kartutandapenduduk' => [
        'rules' => 'uploaded[kartutandapenduduk]|max_size[kartutandapenduduk,2048]|mime_in[kartutandapenduduk,application/pdf]|ext_in[kartutandapenduduk,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Tanda Penduduk Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format File Harus PDF !!',
          'ext_in' => 'Format File Harus PDF !!'
        ],
      ],

    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_SuratPindah = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/perpindahan', $namaFotoKTP_SuratPindah);
    }

    $berkasKartuKeluarga_Perpindahan = $this->request->getFile('kartukeluarga');
    $namaKartuKeluarga_Perpindahan = $berkasKartuKeluarga_Perpindahan->getName();
    $berkasKartuKeluarga_Perpindahan->move('pelayanan/perpindahan', $namaKartuKeluarga_Perpindahan);

    $berkasKartuTandaPenduduk_Perpindahan = $this->request->getFile('kartutandapenduduk');
    $namaKartuTandaPenduduk_Perpindahan = $berkasKartuTandaPenduduk_Perpindahan->getName();
    $berkasKartuTandaPenduduk_Perpindahan->move('pelayanan/perpindahan', $namaKartuTandaPenduduk_Perpindahan);

    $this->suratperpindahanModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_SuratPindah,
      'kartukeluarga' => $namaKartuKeluarga_Perpindahan,
      'kartutandapenduduk' => $namaKartuTandaPenduduk_Perpindahan,
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Surat Perpindahan Majalengka menuju Luar Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranSuratPerpindahan/');
  }








  // Pendaftaran Surat Perpindahan dari Luar ke Majalengka
  public function pendaftaranSuratPerpindahanLuar()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Surat Perpindahan dari Luar ke Majalengka || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranSuratPerpindahanLuar', $data);
  }

  public function saveSuratPindahLuar()
  {

    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_suratperpindahanluar.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_suratperpindahanluar.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_suratperpindahanluar.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_suratperpindahanluar.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'skpwni' => [
        'rules' => 'uploaded[skpwni]|max_size[skpwni,2048]|mime_in[skpwni,application/pdf]|ext_in[skpwni,pdf]',
        'errors' => [
          'uploaded' => 'File SKPWNI Harus Diisi !!',
          'max_size' => 'File SKPWNI terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format SKPWNI Harus PDF !!',
          'ext_in' => 'Format SKPWNI Harus PDF !!'
        ],
      ],
      'kartutandapenduduk' => [
        'rules' => 'uploaded[kartutandapenduduk]|max_size[kartutandapenduduk,2048]|mime_in[kartutandapenduduk,application/pdf]|ext_in[kartutandapenduduk,pdf]',
        'errors' => [
          'uploaded' => 'File KTP Harus Diisi !!',
          'max_size' => 'File KTP terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format KTP Harus PDF !!',
          'ext_in' => 'Format KTP Harus PDF !!'
        ],
      ],

    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_Perpindahan = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/perpindahan_luar', $namaFotoKTP_Perpindahan);
    }

    $berkasSKPWNI_Perpindahan = $this->request->getFile('skpwni');
    $namaSKWPNI_Perpindahan = $berkasSKPWNI_Perpindahan->getName();
    $berkasSKPWNI_Perpindahan->move('pelayanan/perpindahan_luar', $namaSKWPNI_Perpindahan);

    $berkasKartuTandaPenduduk_Perpindahan = $this->request->getFile('kartutandapenduduk');
    $namaKartuTandaPenduduk_Perpindahan = $berkasKartuTandaPenduduk_Perpindahan->getName();
    $berkasKartuTandaPenduduk_Perpindahan->move('pelayanan/perpindahan_luar', $namaKartuTandaPenduduk_Perpindahan);

    $this->suratperpindahanluarModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_Perpindahan,
      'skpwni' => $namaSKWPNI_Perpindahan,
      'kartutandapenduduk' => $namaKartuTandaPenduduk_Perpindahan
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Surat Perpindahan Luar menuju Majalengka Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranSuratPerpindahanLuar/');
  }








  // Pendaftaran Akta Kelahiran
  public function pendaftaranAktaKelahiran()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Akta Kelahiran || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranAktaKelahiran', $data);
  }

  public function saveAktaKelahiran()
  {

    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_aktakelahiran.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_aktakelahiran.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_aktakelahiran.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_aktakelahiran.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'formulirf201akta' => [
        'rules' => 'uploaded[formulirf201akta]|max_size[formulirf201akta,2048]|mime_in[formulirf201akta,application/pdf]|ext_in[formulirf201akta,pdf]',
        'errors' => [
          'uploaded' => 'Formulir F201 Akta Kelahiran Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format F201 Akta Kelahiran Harus PDF !!',
          'ext_in' => 'Format F201 Akta Kelahiran Harus PDF !!'
        ],
      ],
      'suratketeranganlahir' => [
        'rules' => 'uploaded[suratketeranganlahir]|max_size[suratketeranganlahir,2048]|mime_in[suratketeranganlahir,application/pdf]|ext_in[suratketeranganlahir,pdf]',
        'errors' => [
          'uploaded' => 'Surat Keterangan Lahir Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Keterangan Lahir Harus PDF !!',
          'ext_in' => ''
        ],
      ],
      'kartukeluarga' => [
        'rules' => 'uploaded[kartukeluarga]|max_size[kartukeluarga,2048]|mime_in[kartukeluarga,application/pdf]|ext_in[kartukeluarga,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Harus PDF !!',
          'ext_in' => ''
        ],
      ],
      'bukunikah' => [
        'rules' => 'uploaded[bukunikah]|max_size[bukunikah,2048]|mime_in[bukunikah,application/pdf]|ext_in[bukunikah,pdf]',
        'errors' => [
          'uploaded' => 'Buku Nikah Harus Diisi !!',
          'max_size' => 'File Buku Nikah terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Buku Nikah Harus PDF !!',
          'ext_in' => 'Format Buku Nikah Harus PDF !!'
        ],
      ],
      'ktpayah' => [
        'rules' => 'uploaded[ktpayah]|max_size[ktpayah,2048]|mime_in[ktpayah,application/pdf]|ext_in[ktpayah,pdf]',
        'errors' => [
          'uploaded' => 'KTP Ayah Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format KTP Ayah Harus PDF !!',
          'ext_in' => 'Format KTP Ayah Harus PDF !!'
        ],
      ],
      'ktpibu' => [
        'rules' => 'uploaded[ktpibu]|max_size[ktpibu,2048]|mime_in[ktpibu,application/pdf]|ext_in[ktpibu,pdf]',
        'errors' => [
          'uploaded' => 'KTP Ibu Harus Diisi !!',
          'max_size' => 'File anda terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format KTP Ibu Harus PDF !!',
          'ext_in' => 'Format KTP Ibu Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_Akla = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/aktakelahiran', $namaFotoKTP_Akla);
    }

    $berkasFormulirF201_Akla = $this->request->getFile('formulirf201akta');
    $namaFormulirF201_Akla = $berkasFormulirF201_Akla->getName();
    $berkasFormulirF201_Akla->move('pelayanan/aktakelahiran', $namaFormulirF201_Akla);

    $berkasSuratKeteranganLahir_Akla = $this->request->getFile('suratketeranganlahir');
    $namaSuratKeteranganLahir_Akla = $berkasSuratKeteranganLahir_Akla->getName();
    $berkasSuratKeteranganLahir_Akla->move('pelayanan/aktakelahiran', $namaSuratKeteranganLahir_Akla);

    $berkasKartuKeluarga_Akla = $this->request->getFile('kartukeluarga');
    $namaKartuKeluarga_Akla = $berkasKartuKeluarga_Akla->getName('');
    $berkasKartuKeluarga_Akla->move('pelayanan/aktakelahiran', $namaKartuKeluarga_Akla);

    $berkasBukuNikah_Akla = $this->request->getFile('bukunikah');
    $namaBukuNikah_Akla = $berkasBukuNikah_Akla->getName('');
    $berkasBukuNikah_Akla->move('pelayanan/aktakelahiran', $namaBukuNikah_Akla);

    $berkasKTPAyah_Akla = $this->request->getFile('ktpayah');
    $namaKTPAyah_Akla = $berkasKTPAyah_Akla->getName();
    $berkasKTPAyah_Akla->move('pelayanan/aktakelahiran', $namaKTPAyah_Akla);

    $berkasKTPIbu_Akla = $this->request->getFile('ktpibu');
    $namaKTPIbu_Akla = $berkasKTPIbu_Akla->getName();
    $berkasKTPIbu_Akla->move('pelayanan/aktakelahiran', $namaKTPIbu_Akla);

    $this->aktakelahiranModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_Akla,
      'formulirf201akta' => $namaFormulirF201_Akla,
      'kartukeluarga' => $namaKartuKeluarga_Akla,
      'bukunikah' => $namaBukuNikah_Akla,
      'suratketeranganlahir' => $namaSuratKeteranganLahir_Akla,
      'ktpayah' => $namaKTPAyah_Akla,
      'ktpibu' => $namaKTPIbu_Akla
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Akta Kelahiran Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranAktaKelahiran/');
  }


















  // Pendaftaran Akta Kematian
  public function pendaftaranAktaKematian()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Akta Kematian || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranAktaKematian', $data);
  }

  public function saveAktakematian()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_aktakematian.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_aktakematian.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_aktakematian.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_aktakematian.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'kartukeluarga' => [
        'rules' => 'uploaded[kartukeluarga]|max_size[kartukeluarga,2048]|mime_in[kartukeluarga,application/pdf]|ext_in[kartukeluarga,pdf]',
        'errors' => [
          'uploaded' => 'Kartu Keluarga Harus Diisi !!',
          'max_size' => 'File kartu Keluarga terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Keluarga Harus PDF !!',
          'ext_in' => 'Format Kartu Keluarga Harus PDF !!'
        ],
      ],
      'suratkematian' => [
        'rules' => 'uploaded[suratkematian]|max_size[suratkematian,2048]|mime_in[suratkematian,application/pdf]|ext_in[suratkematian,pdf]',
        'errors' => [
          'uploaded' => 'Surat Kematian Harus Diisi !!',
          'max_size' => 'File Surat Kematian terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Surat Kematian Harus PDF !!',
          'ext_in' => 'Format Surat Kematian Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_Akket = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/aktakematian', $namaFotoKTP_Akket);
    }

    $berkasKK_Akket = $this->request->getFile('kartukeluarga');
    $namaKK_Akket = $berkasKK_Akket->getName();
    $berkasKK_Akket->move('pelayanan/aktakematian', $namaKK_Akket);

    $berkasSuratKematian_Akket = $this->request->getFile('suratkematian');
    $namaSuratKematian_Akket = $berkasSuratKematian_Akket->getName();
    $berkasSuratKematian_Akket->move('pelayanan/aktakematian', $namaSuratKematian_Akket);

    $this->aktakematianModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_Akket,
      'kartukeluarga' => $namaKK_Akket,
      'suratkematian' => $namaSuratKematian_Akket
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Akta Kematian Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranAktaKematian');
  }
















  // Pendaftaran Keabsahan Akta Kelahiran
  public function pendaftaranKeabsahanAkla()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Keabsahan Akta Kelahiran || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranKeabsahanAkla', $data);
  }

  public function saveKeabsahanAkla()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pendaftaran_keabsahanakla.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_keabsahanakla.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_keabsahanakla.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_keabsahanakla.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'aktakelahiran' => [
        'rules' => 'uploaded[aktakelahiran]|max_size[aktakelahiran,2048]|mime_in[aktakelahiran,application/pdf]|ext_in[aktakelahiran,pdf]',
        'errors' => [
          'uploaded' => 'Formulir Akta Kelahiran Harus Diisi !!',
          'max_size' => 'File Akta Kelahiran terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Akta Kelahirans Harus PDF !!',
          'ext_in' => 'Format Akta Kelahirans Harus PDF !!'
        ],
      ],
      'kartutandapenduduk' => [
        'rules' => 'uploaded[kartutandapenduduk]|max_size[kartutandapenduduk,2048]|mime_in[kartutandapenduduk,application/pdf]|ext_in[kartutandapenduduk,pdf]',
        'errors' => [
          'uploaded' => 'Formulir Kartu Tanda Penduduk Harus Diisi !!',
          'max_size' => 'File Kartu Tanda Penduduk terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Kartu Tanda Penduduks Harus PDF !!',
          'ext_in' => 'Format Kartu Tanda Penduduks Harus PDF !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_KeabsahanAkla = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/keabsahanaktakelahiran ', $namaFotoKTP_KeabsahanAkla);
    }

    $berkasAktaKelahiran_Akla = $this->request->getFile('aktakelahiran');
    $namaAktaKelahiran_KeabsahanAkla = $berkasAktaKelahiran_Akla->getName();
    $berkasAktaKelahiran_Akla->move('pelayanan/keabsahanaktakelahiran', $namaAktaKelahiran_KeabsahanAkla);

    $berkasKartuTandaPenduduk_Akla = $this->request->getFile('kartutandapenduduk');
    $namaKartuTandaPenduduk_KeabsahanAkla = $berkasKartuTandaPenduduk_Akla->getName();
    $berkasKartuTandaPenduduk_Akla->move('pelayanan/keabsahanaktakelahiran', $namaKartuTandaPenduduk_KeabsahanAkla);

    $this->keabsahanaklaModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_KeabsahanAkla,
      'aktakelahiran' => $namaAktaKelahiran_KeabsahanAkla,
      'kartutandapenduduk' => $namaKartuTandaPenduduk_KeabsahanAkla,
    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Keabsahan Akta Kelahiran Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranKeabsahanAkla/');
  }
















  // Pendaftaran Pelayanan Pemanfaatan Data
  public function pendaftaranPelayananData()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Pelayanan Pemanfaatan Data dan Inovasi || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranPelayananData', $data);
  }

  public function savePelayananData()
  {
    $rule = [

      'nik' => [
        'rules' => 'required[pendaftaran_pelayanandata.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pendaftaran_pelayanandata.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pendaftaran_pelayanandata.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pendaftaran_pelayanandata.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'berkaspelayanan' => [
        'rules' => 'uploaded[berkaspelayanan.0]|max_size[berkaspelayanan,2048]|mime_in[berkaspelayanan,application/pdf]|ext_in[berkaspelayanan,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Pelayanan Harus Diisi & Minimal 1 File !!',
          'max_size' => 'File Berkas Pelayanan terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Berkas Pelayanan Harus PDF !!',
          'ext_in' => 'Format Berkas Pelayanan Harus PDF !!'
        ],
      ],
    ];

    if (!$this->validate($rule)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_PelayananData = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/pelayanan_data', $namaFotoKTP_PelayananData);
    }

    $berkaspelayanan = $this->request->getFileMultiple('berkaspelayanan');
    $jmlberkas = count($berkaspelayanan);

    if ($jmlberkas > 10) {
      session()->setFlashdata('error', '<span class="text-danger">Maksimal anda hanya boleh mengupload 10 file</span>');
      return redirect()->to('/PelayananSilancar/pendaftaranPelayananData/');
    }

    foreach ($berkaspelayanan as $i => $berkas) {
      if ($berkas->isValid() && !$berkas->hasMoved()) {
        $files[$i] = $berkas->getName();
        $berkas->move('pelayanan/pelayanan_data', $files[$i]);
      }
    }

    $berkasPelayanan2 = (array_key_exists(1, $files) ? $files[1] : null);
    $berkasPelayanan3 = (array_key_exists(2, $files) ? $files[2] : null);
    $berkasPelayanan4 = (array_key_exists(3, $files) ? $files[3] : null);
    $berkasPelayanan5 = (array_key_exists(4, $files) ? $files[4] : null);
    $berkasPelayanan6 = (array_key_exists(5, $files) ? $files[5] : null);
    $berkasPelayanan7 = (array_key_exists(6, $files) ? $files[6] : null);
    $berkasPelayanan8 = (array_key_exists(7, $files) ? $files[7] : null);
    $berkasPelayanan9 = (array_key_exists(8, $files) ? $files[8] : null);
    $berkasPelayanan10 = (array_key_exists(9, $files) ? $files[9] : null);

    $this->pelayanandataModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_PelayananData,
      'berkaspelayanan1' => $files[0],
      'berkaspelayanan2' => $berkasPelayanan2,
      'berkaspelayanan3' => $berkasPelayanan3,
      'berkaspelayanan4' => $berkasPelayanan4,
      'berkaspelayanan5' => $berkasPelayanan5,
      'berkaspelayanan6' => $berkasPelayanan6,
      'berkaspelayanan7' => $berkasPelayanan7,
      'berkaspelayanan8' => $berkasPelayanan8,
      'berkaspelayanan9' => $berkasPelayanan9,
      'berkaspelayanan10' => $berkasPelayanan10,
    ]);

    session()->setFlashdata('pesan', 'Selamat pendaftaran permohnan Pelayanan Pemanfaatan Data Anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranPelayananData/');
  }

















  // Pendaftaran Perbaikan Data
  public function pendaftaranPerbaikanData()
  {
    helper(['form']);
    $data = [
      'title' => 'Pendaftaran Perbaikan Data || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranPerbaikanData', $data);
  }

  public function savePerbaikanData()
  {
    $rule = [
      'nik' => [
        'rules' => 'required[perbaikan_data.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[perbaikan_data.namapemohon]',
        'errors' => [
          'required' => 'Nama Pemohon Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[perbaikan_data.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pemohon Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[perbaikan_data.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pemohon Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'judulperbaikan' => [
        'rules' => 'required[perbaikan_data.judulperbaikan]',
        'errors' => [
          'required' => 'Judul Perbaikan Harus Diisi !!'
        ],
      ],
      'penjelasanperbaikan' => [
        'rules' => 'required[perbaikan_data.penjelasanperbaikan]',
        'errors' => [
          'required' => 'Penjelasan Perbaikan Harus Diisi !!'
        ],
      ],
      'berkasperbaikan' => [
        'rules' => 'uploaded[berkasperbaikan.0]|max_size[berkasperbaikan,2048]|mime_in[berkasperbaikan,application/pdf]|ext_in[berkasperbaikan,pdf]',
        'errors' => [
          'uploaded' => 'Berkas Perbaikan Harus Diisi & Minimal 1 File !!',
          'max_size' => 'File Berkas Perbaikan terlalu besar, Kompress terlebih dahulu !!',
          'mime_in' => 'Format Berkas Perbaikan Harus PDF !!',
          'ext_in' => 'Format Berkas Perbaikan Harus PDF !!'
        ],
      ],
    ];

    if (!$this->validate($rule)) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_PerbaikanData = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/perbaikan_data', $namaFotoKTP_PerbaikanData);
    }

    $berkasperbaikan = $this->request->getFileMultiple('berkasperbaikan');
    $jmlberkas = count($berkasperbaikan);

    if ($jmlberkas > 5) {
      session()->setFlashdata('error', '<span class="text-danger">Maksimal anda hanya boleh mengupload 5 File</span>');
      return redirect()->to('/PelayananSilancar/pendaftaranPerbaikanData/');
    }

    foreach ($berkasperbaikan as $i =>  $berkas) {
      if ($berkas->isValid() && !$berkas->hasMoved()) {
        $files[$i] = $berkas->getRandomName();
        $berkas->move('pelayanan/perbaikan_data', $files[$i]);
      }
    }

    $berkasperbaikan_dua = (array_key_exists(1, $files) ? $files[1] : null);
    $berkasperbaikan_tiga = (array_key_exists(2, $files) ? $files[2] : null);
    $berkasperbaikan_empat = (array_key_exists(3, $files) ? $files[3] : null);
    $berkasperbaikan_lima = (array_key_exists(4, $files) ? $files[4] : null);

    $this->perbaikandataModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_PerbaikanData,
      'judulperbaikan' => $this->request->getVar('judulperbaikan'),
      'berkasperbaikan_satu' => $files[0],
      'berkasperbaikan_dua' => $berkasperbaikan_dua,
      'berkasperbaikan_tiga' => $berkasperbaikan_tiga,
      'berkasperbaikan_empat' => $berkasperbaikan_empat,
      'berkasperbaikan_lima' => $berkasperbaikan_lima,
      'penjelasanperbaikan' => $this->request->getVar('penjelasanperbaikan')
    ]);

    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Perbaikan Data anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranPerbaikanData/');
  }




















  // Pendaftaran Pengaduan Update
  public function pendaftaranPengaduanUpdate()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengaduan Update || Disdukcapil Majalengka',
      'validation' => \Config\Services::validation()
    ];
    return view('pelayanan_views/pendaftaranPengaduanUpdate', $data);
  }

  public function savePengaduanUpdate()
  {
    $validate = $this->validate([

      'nik' => [
        'rules' => 'required[pengaduan_update.nik]',
        'errors' => [
          'required' => 'NIK Pemohon Harus Diisi !!'
        ],
      ],
      'namapemohon' => [
        'rules' => 'required[pengaduan_update.namapemohon]',
        'errors' => [
          'required' => 'Nama Pelapor Harus Diisi !!'
        ],
      ],
      'emailpemohon' => [
        'rules' => 'required[pengaduan_update.emailpemohon]|valid_email',
        'errors' => [
          'required' => 'Email Pelapor Harus Diisi !!',
          'valid_email' => 'Mohon cek kembali email anda, gunakan @ agar valid !!'
        ],
      ],
      'nomorpemohon' => [
        'rules' => 'required|regex_match[/^\+628\d{9,}$/]',
        'errors' => [
          'required' => 'Nomor Pemohon Harus Diisi !!',
          'regex_match' => 'Nomor Pemohon harus dimulai dengan +628 dan terdiri dari 12 hingga 15 digit angka setelahnya.',
        ],
      ],
      'alamatpemohon' => [
        'rules' => 'required[pengaduan_update.alamatpemohon]',
        'errors' => [
          'required' => 'Alamat Pelapor Harus Diisi !!'
        ],
      ],
      'fotoktp' => [
        'rules' => 'uploaded[fotoktp]|max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto KTP Wajib diisi !!',
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Mohon File yang di inputkan berformat JPG, JPEG atau PNG'
        ],
      ],
      'pengaduanupdate' => [
        'rules' => 'required[pengaduan_update.pengaduanupdate]',
        'errors' => [
          'required' => 'Pengaduan Harus Diisi !!'
        ],
      ],
      'kartutandapenduduk' => [
        'rules' => 'uploaded[kartutandapenduduk]|mime_in[kartutandapenduduk,image/jpg,image/jpeg,image/png,application/pdf]',
        'errors' => [
          'uploaded' => 'Surat Kematian Harus di isi !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ],
      ],
      'kartukeluarga' => [
        'rules' => 'uploaded[kartukeluarga]|mime_in[kartukeluarga,image/jpg,image/jpeg,image/png,application/pdf]',
        'errors' => [
          'uploaded' => 'Surat Kematian Harus di isi !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoKTP = $this->request->getFile('fotoktp');
    if ($fileFotoKTP->getError() == 4) {
    } else {
      $namaFotoKTP_Pengup = $fileFotoKTP->getName();
      $fileFotoKTP->move('pelayanan/pengaduan_update', $namaFotoKTP_Pengup);
    }

    $berkasKTP_PengUp = $this->request->getFile('kartutandapenduduk');
    $namaKTP_PengUp = $berkasKTP_PengUp->getName();
    $berkasKTP_PengUp->move('pelayanan/pengaduan_update', $namaKTP_PengUp);

    $berkasKK_Pengup = $this->request->getFile('kartukeluarga');
    $namaKK_PengUp = $berkasKK_Pengup->getName();
    $berkasKK_Pengup->move('pelayanan/pengaduan_update', $namaKK_PengUp);

    $this->pengaduanupdateModel->save([
      'nik' => $this->request->getVar('nik'),
      'namapemohon' => $this->request->getVar('namapemohon'),
      'emailpemohon' => $this->request->getVar('emailpemohon'),
      'nomorpemohon' => $this->request->getVar('nomorpemohon'),
      'alamatpemohon' => $this->request->getVar('alamatpemohon'),
      'fotoktp' => $namaFotoKTP_Pengup,
      'pengaduanupdate' => $this->request->getVar('pengaduanupdate'),
      'kartutandapenduduk' => $namaKTP_PengUp,
      'kartukeluarga' => $namaKK_PengUp

    ]);
    session()->setFlashdata('pesan', 'Selamat pendaftaran permohonan Pengaduan Update anda telah berhasil !!');
    return redirect()->to('/PelayananSilancar/pendaftaranPengaduanupdate/');
  }
















  // Halaman Error Page
  public function errorPage()
  {
    $data = [
      'title' => 'Pelayanan Online Si Lancar || Disdukcapil Majalengka',
    ];
    return view('pelayanan_views/errorPage', $data);
  }
}
