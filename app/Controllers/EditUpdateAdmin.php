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
use App\Models\Pendaftaran_suratperpindahan_Model;
use App\Models\Pendaftaran_suratperpindahanluar_Model;

use App\Models\Pendaftaran_aktakelahiran_Model;
use App\Models\Pendaftaran_aktakematian_Model;
use App\Models\Pendaftaran_keabsahanakla_Model;

use App\Models\Pendaftaran_pelayanandata_Model;

use App\Models\Perbaikan_data_Model;
use App\Models\Pengaduan_update_Model;

class EditUpdateAdmin extends BaseController
{

  protected $adminModel;
  protected $beritaModel;
  protected $inovasiModel;
  protected $visimisiModel;
  protected $persyaratansilancarModel;

  // Halaman Pendaftaran Si Lancar

  protected $kkModel;
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









  // Halaman Inovasi
  // Menampilkan Form untuk mengedit data berita
  public function editInovasi($judulInovasi)
  {
    $data = [
      'title' => 'Form Edit Data Inovasi || Admin Disdukcapil',
      'validation' => \Config\Services::validation(),
      'inovasi' => $this->inovasiModel->getInovasi($judulInovasi)
    ];
    return view('editAdmin/edit_inovasi_admin', $data);
  }

  public function updateInovasi($id)
  {
    // Digunakan untuk operasi judul berita 
    $inovasiLama = $this->inovasiModel->getInovasi($this->request->getVar('judulinovasi'));
    if ($inovasiLama['judulinovasi'] == $this->request->getVar('judulinovasi')) {
      $rule_judul = 'required';
    } else {
      $rule_judul = 'required|is_unique[inovasi.judulinovasi]';
    }

    // Validasi Input
    if (!$this->validate([
      // Judul inovasi
      'judulinovasi' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => 'Judul Inovasi Harus diisi !! ',
          'is_unique' => 'Judul Inovasi Sudah terdaftar !!'
        ]
      ],
      // Foto inovasi
      'fotoinovasi' => [
        'rules' => 'max_size[fotoinovasi,1024]|is_image[fotoinovasi]|mime_in[fotoinovasi,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ],
      // Keterangan Berita
      'keteranganinovasi' => [
        'rules' => 'required[inovasi.keteranganinovasi]',
        'errors' => [
          'required' => 'Keterangan Inovasi Harus Diisi !!'
        ]
      ]
    ])) {
      return redirect()->to(base_url() . '/EditUpdateAdmin/editInovasi/' . $this->request->getVar('judulinovasi'))->withInput();
    }

    $fileFotoInovasi = $this->request->getFile('fotoinovasi');

    if ($fileFotoInovasi->getError() == 4) {
      $namaFotoInovasi = $this->request->getVar('fotolama');
    } else {
      // Generate nama File Random
      $namaFotoInovasi = $fileFotoInovasi->getRandomName();
      // Memindahkan File Random 
      $fileFotoInovasi->move('img/inovasi', $namaFotoInovasi);
      // Menghapus File lama 
      unlink('img/inovasi/' . $this->request->getVar('fotolama'));
    }

    $this->inovasiModel->save(
      [
        'id' => $id,
        'fotoinovasi' => $namaFotoInovasi,
        'judulinovasi' => $this->request->getVar('judulinovasi'),
        'keteranganinovasi' => $this->request->getVar('keteranganinovasi')
      ]
    );
    session()->setFlashdata('pesan', 'Data Inovasi berhasil diubah !!');
    return redirect()->to('admin/inovasi_admin');
  }









  // Halaman Berita
  // Menampilkan Form untuk mengedit data berita
  public function editBerita($judulBerita)
  {
    $data = [
      'title' => 'Form Edit Data Berita || Admin Disdukcapil',
      'validation' => \Config\Services::validation(),
      'berita' => $this->beritaModel->getBerita($judulBerita)
    ];
    return view('editAdmin/edit_berita_admin', $data);
  }

  public function updateBerita($id)
  {
    // Digunakan untuk operasi judul berita 
    $beritaLama = $this->beritaModel->getBerita($this->request->getVar('judulberita'));
    if ($beritaLama['judulberita'] == $this->request->getVar('judulberita')) {
      $rule_judul = 'required';
    } else {
      $rule_judul = 'required|is_unique[berita.judulberita]';
    }

    // Validasi Input
    if (!$this->validate([
      // Judul berita
      'judulberita' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => 'Judul Berita Harus diisi !! ',
          'is_unique' => 'Judul Berita Sudah terdaftar !!'
        ]
      ],
      // Foto berita
      'fotoberita' => [
        'rules' => 'max_size[fotoberita,2048]|is_image[fotoberita]|mime_in[fotoberita,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ],
      // Keterangan Berita
      'keteranganberita' => [
        'rules' => 'required[berita.keteranganberita]',
        'errors' => [
          'required' => 'Keterangan Berita Harus Diisi !!'
        ]
      ]
    ])) {
      return redirect()->to(base_url() . '/EditUpdateAdmin/editBerita/' . $this->request->getVar('judulberita'))->withInput();
    }

    $fileFotoBerita = $this->request->getFile('fotoberita');

    if ($fileFotoBerita->getError() == 4) {
      $namaFotoBerita = $this->request->getVar('fotolama');
    } else {
      // Generate nama File Random
      $namaFotoBerita = $fileFotoBerita->getRandomName();
      // Memindahkan File Random 
      $fileFotoBerita->move('img/berita', $namaFotoBerita);
      // Menghapus File lama 
      unlink('img/berita/' . $this->request->getVar('fotolama'));
    }

    $this->beritaModel->save(
      [
        'id' => $id,
        'fotoberita' => $namaFotoBerita,
        'judulberita' => $this->request->getVar('judulberita'),
        'keteranganberita' => $this->request->getVar('keteranganberita')
      ]
    );
    session()->setFlashdata('pesan', 'Data Berita berhasil diubah !!');
    return redirect()->to('admin/berita_admin');
  }










  // Halaman Visi Misi 
  public function editVisiMisi($visimisi)
  {
    helper(['form']);
    $data = [
      'title' => 'Form Edit Visi Misi || Admin Disdukcapil',
      'validation' => \Config\Services::validation(),
      'visimisi' => $this->visimisiModel->getVisiMisi($visimisi)
    ];
    return view('editAdmin/edit_visimisi_admin', $data);
  }

  public function updateVisiMisi($id)
  {
    $validate = $this->validate([
      'fotovisimisi' => [
        'rules' => 'max_size[fotovisimisi,2048]|is_image[fotovisimisi]|mime_in[fotovisimisi,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoVisiMisi = $this->request->getFile('fotovisimisi');

    if ($fileFotoVisiMisi->getError() == 4) {
      $namaFotoVisiMisi = $this->request->getVar('fotolama');
    } else {
      // Generate nama File Random
      $namaFotoVisiMisi = $fileFotoVisiMisi->getRandomName();
      // Memindahkan File Random
      $fileFotoVisiMisi->move('img/visimisi', $namaFotoVisiMisi);
      // Menghapus File Lama
      unlink('img/visimisi/' . $this->request->getVar('fotolama'));
    }

    $this->visimisiModel->save(
      [
        'id' => $id,
        'fotovisimisi' => $namaFotoVisiMisi
      ]
    );
    session()->setFlashdata('pesan', 'Visi Misi Berhasil Diubah !!');
    return redirect()->to('admin/visimisi_admin');
  }










  // Halaman Persyaratan
  public function editPersyaratan($judulPersyaratan)
  {
    helper(['form']);
    $data = [
      'title' => 'Form Edit Persyaratan Si Lancar || Admin Disdukcapil',
      'validation' => \Config\Services::validation(),
      'persyaratansilancar' => $this->persyaratansilancarModel->getPersyaratan($judulPersyaratan)
    ];
    return view('editAdmin/edit_persyaratansilancar_admin', $data);
  }

  public function updatePersyaratan($id)
  {

    $persyaratanlama = $this->persyaratansilancarModel->getPersyaratan($this->request->getVar('judulpersyaratan'));
    if ($persyaratanlama['judulpersyaratan'] == $this->request->getVar('judulpersyaratan')) {
      $rule_judul = 'required';
    } else {
      $rule_judul = 'required|is_unique[persyaratansilancar.judulpersyaratan]';
    }

    $validate = $this->validate([

      // Judul Persyaratan
      'judulpersyaratan' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => 'Judul Persyaratan harus diisi !!',
          'is_unique' => 'Judul Persyaratan Sudah terdaftar !!'
        ],
      ],
      // Foto Persyaratan
      'fotopersyaratan' => [
        'rules' => 'max_size[fotopersyaratan,2048]|is_image[fotopersyaratan]|mime_in[fotopersyaratan,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'File Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan Gambar !!',
          'mime_in' => 'Gunakan Format JPG, JPEG dan PNG'
        ],
      ],
      // Keterangan Persyaratan
      'keteranganpersyaratan' => [
        'rules' => 'required[persyaratansilancar.keteranganpersyaratan]',
        'errors' => [
          'required' => 'Keterangan Persyaratan Harus Diisi !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $fileFotoPersyaratan = $this->request->getFile('fotopersyaratan');

    if ($fileFotoPersyaratan->getError() == 4) {
      $namaFotoPersyaratan = $this->request->getVar('fotolama');
    } else {
      // Generate nama File Random
      $namaFotoPersyaratan = $fileFotoPersyaratan->getRandomName();
      // Memindahkan File Random
      $fileFotoPersyaratan->move('img/persyaratansilancar', $namaFotoPersyaratan);
      // Menghapus File lama
      unlink('img/persyaratansilancar/' . $this->request->getVar('fotolama'));
    }

    $this->persyaratansilancarModel->save(
      [
        'id' => $id,
        'fotopersyaratan' => $namaFotoPersyaratan,
        'judulpersyaratan' => $this->request->getVar('judulpersyaratan'),
        'keteranganpersyaratan' => $this->request->getVar('keteranganpersyaratan')
      ]
    );
    session()->setFlashdata('pesan', 'Data Persyaratan berhasil diubah !!');
    return redirect()->to('admin/persyaratansilancar_admin');
  }










  // Halaman Edit Card Pelayanan KK
  public function editPelayananKK($judulPelayanan)
  {
    $data = [
      'title' => 'Form Edit Card Pelayanan Kartu Keluarga || Admin Disdukcapil',
      'validation' => \Config\Services::validation(),
      'pelayanan_kk' => $this->pelkkModel->getDataPelayananKK($judulPelayanan)
    ];
    return view('editAdmin/edit_pelayanankk_admin', $data);
  }

  public function updatePelayananKK($id)
  {
    if (!$this->validate([
      // Judul Pelayanan
      'judulpelayanan' => [
        'rules' => 'required[pelayanan_kk.judulpelayanan]',
        'errors' => [
          'required' => 'Judul Pelayanan Harus Diisi !!'
        ]
      ],
      // Foto Pelayanan
      'fotopelayanan' => [
        'rules' => 'max_size[fotopelayanan,2048]|is_image[fotopelayanan]|mime_in[fotopelayanan,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ])) {
      return redirect()->to(base_url() . '/EditUpdateAdmin/editPelayananKK/' . $this->request->getVar('judulpelayanan'))->withInput();
    }

    $fileFotoPelayanan = $this->request->getFile('fotopelayanan');

    if ($fileFotoPelayanan->getError() == 4) {
      $namaFotoPelayanan = $this->request->getVar('fotolama');
    } else {
      // Generate nama File Random
      $namaFotoPelayanan = $fileFotoPelayanan->getRandomName();
      // Memindahkan File Random
      $fileFotoPelayanan->move('img/pelayananKK', $namaFotoPelayanan);
      // Menghapus File lama
      unlink('img/pelayananKK/' . $this->request->getVar('fotolama'));
    }

    $this->pelkkModel->save(
      [
        'id' => $id,
        'fotopelayanan' => $namaFotoPelayanan,
        'judulpelayanan' => $this->request->getVar('judulpelayanan')
      ]
    );
    session()->setFlashdata('pesan', 'Data Pelayanan KK berhasil diubah !!');
    return redirect()->to('admin/pelayanan');
  }












  // Halaman Edit Card Pelayanan KTP











  // Halaman Edit Card Pelayanan KIA










  // Halaman Edit Card Pelayanan Akta Kelahiran










  // Halaman Edit Card Pelayanan Akta Kematian










  // Halaman Edit Card Pelayanan Perbaikan Data











  // Halaman Edit Card Pelayanan Pengaduan Update











  // Halaman Edit Card Pelayanan Perbaikan NIK
}
