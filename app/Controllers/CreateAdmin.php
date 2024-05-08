<?php

namespace App\Controllers;

use \Myth\Auth\Entities\User;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;

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

class CreateAdmin extends BaseController
{
  protected $auth;

  protected $config;

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

  public function __construct()
  {

    $this->config = config('Auth');
    $this->auth = service('authentication');

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









  // Form Halaman Tambah Berita
  public function create_berita_admin()
  {
    $data = [
      'title' => 'Form Tambah Berita || Admin Disdukcapil',
      'validation' => \Config\Services::validation()
    ];
    return view('createadmin/create_berita_admin', $data);
  }

  // Untuk Validasi Halaman Tambah berita
  // Digunakan untuk validasi form berita
  public function saveBerita()
  {
    // Validasi Input
    if (!$this->validate([

      // Foto berita
      'fotoberita' => [
        'rules' => 'max_size[fotoberita,1024]|is_image[fotoberita]|mime_in[fotoberita,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ],
      // Judul berita
      'judulberita' => [
        'rules' => 'required[berita.judulberita]',
        'errors' => [
          'required' => 'Judul Berita Harus Diisi !!'
        ]
      ],
      // Keterangan berita
      'keteranganberita' => [
        'rules' => 'required[berita.keteranganberita]',
        'errors' => [
          'required' => 'Keterangan Berita Harus Diisi !!'
        ]
      ]

    ])) {
      // $validation = \Config\Services::validation();
      return redirect()->to(base_url() . '/CreateAdmin/create_berita_admin/')->withInput();
    }

    // Cara Memanggil Gambar
    $fileFotoBerita = $this->request->getFile('fotoberita');
    if ($fileFotoBerita->getError() == 4) {
      $namaFotoBerita = 'beritadef.PNG';
    } else {
      // Generate nama foto berita random
      $namaFotoBerita = $fileFotoBerita->getRandomName();
      // Memindahkan File Gambar ke Folder img/Berita
      $fileFotoBerita->move('img/berita', $namaFotoBerita);
    }

    $this->beritaModel->save([
      'fotoberita' => $namaFotoBerita,
      'judulberita' => $this->request->getVar('judulberita'),
      'keteranganberita' => $this->request->getVar('keteranganberita')
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    return redirect()->to('/Admin/berita_admin');
  }










  // Form Halaman Tambah Inovasi 
  public function create_inovasi_admin()
  {
    $data = [
      'title' => 'Form Tambah Inovasi || Admin Disdukcapil',
      'validation' => \Config\Services::validation()
    ];
    return view('createAdmin/create_inovasi_admin', $data);
  }

  // Digunakan Untuk Form Halaman Tambah Inovasi
  public function saveInovasi()
  {
    if (!$this->validate([

      // Foto Inovasi
      'fotoinovasi' => [
        'rules' => 'max_size[fotoinovasi,1024]|is_image[fotoinovasi]|mime_in[fotoinovasi,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ],
      // Judul Inovasi
      'judulinovasi' => [
        'rules' => 'required[inovasi.judulinovasi]',
        'errors' => [
          'required' => 'Judul Inovasi Harus diisi !!'
        ]
      ],
      // Keterangan Inovasi
      'keteranganinovasi' => [
        'rules' => 'required[inovasi.keteranganinovasi]',
        'errors' => [
          'required' => 'Keterangan Inovasi Harus diisi !!'
        ]
      ]
    ])) {
      // $validation = \Config\Services::validation();
      return redirect()->to(base_url() . '/CreateAdmin/create_inovasi_admin/')->withInput();
    }
    // Cara Memanggil Gambar
    $fileFotoInovasi = $this->request->getFile('fotoinovasi');
    // Jika terdapat Foto Inovasi yang tidak di upload 
    if ($fileFotoInovasi->getError() == 4) {
      $namaFotoInovasi = 'inovasidef.PNG';
    } else {
      // Generate nama foto random inovasi
      $namaFotoInovasi = $fileFotoInovasi->getRandomName();
      // Memindahkan FIle Gambar ke Folder img/Inovasi
      $fileFotoInovasi->move('img/inovasi', $namaFotoInovasi);
    }

    $this->inovasiModel->save([
      'fotoinovasi' => $namaFotoInovasi,
      'judulinovasi' => $this->request->getVar('judulinovasi'),
      'keteranganinovasi' => $this->request->getVar('keteranganinovasi')
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    return redirect()->to('admin/inovasi_admin');
  }










  // Form Halaman Tambah Akun Admin
  public function create_akun_admin()
  {
    $data = [
      'title' => 'Form Tambah Akun Admin || Admin Disdukcapil',
      'config' => $this->config,
      'validation' => \Config\Services::validation()
    ];
    return view('createAdmin/create_akun_admin', $data);
  }

  // public function saveAkun()
  // {
  //   if (!$this->validate([

  //     // Nama
  //     'nama' => [
  //       'rules' => 'required[admin.nama]',
  //       'errors' => [
  //         'required' => 'Nama Harus Diisi !!'
  //       ]
  //     ],
  //     // Email
  //     'email' => [
  //       'rules' => 'required[admin.email]|valid_email|is_unique[admin.email]',
  //       'errors' => [
  //         'required' => 'Email Harus Diisi !!',
  //         'valid_email' => 'Mohon cek kembali format email yang digunakan !!'
  //       ]
  //     ],
  //     // Password
  //     'password' => [
  //       'rules' => 'required[admin.password]|min_length[10]|max_length[100]|alpha_numeric_punct',
  //       'errors' => [
  //         'required' => 'Password Harus Diisi !!',
  //         'min_length' => 'Password Karakter harus lebih dari 10 !!'
  //       ]
  //     ],
  //     // Level Akun
  //     'level' => [
  //       'rules' => 'required[admin.level]',
  //       'errors' => [
  //         'required' => 'Dipilih sesuai dengan Kebutuhan !!'
  //       ]
  //     ],
  //     // Foto Admin
  //     'foto_admin' => [
  //       'rules' => 'uploaded[admin.foto_admin]|is_image[foto_admin]|mime_in[foto_admin,image/jpg,image/jpeg,image/png]',
  //       'errors' => [
  //         'uploaded' => 'Foto Admin Harus Diisi !!',
  //         'is_image' => 'Yang anda pilih bukan Gambar !!',
  //         'mime_in' => 'Yang anda pilih bukan Gambar !!'
  //       ]
  //     ]

  //   ])) {
  //     return redirect()->to(base_url() . '/createAdmin/create_akun_admin/')->withInput();
  //   }

  //   $fotoAdmin = $this->request->getFile('foto_admin');
  //   if ($fotoAdmin->getError() == 4) {
  //     $namaFotoAdmin = 'img/akun.png';
  //   } else {
  //     $namaFotoAdmin = $fotoAdmin->getClientName();
  //     $fotoAdmin->move('img/imgAkunAdmin', $namaFotoAdmin);
  //   }

  //   $this->adminModel->save([
  //     'nama' => $this->request->getVar('nama'),
  //     'email' => $this->request->getVar('email'),
  //     'password' => $this->request->getVar('password'),
  //     'level' => $this->request->getVar('level'),
  //   ]);
  //   session()->setFlashdata('pesan', 'Selamat Anda Berhasil Melakukan Pendaftaran  !!');
  //   return redirect()->to('/admin/data_admin');
  // }

  // public function save()
  // {
  //   $users = model(AdminModel::class);

  //   $rules = [
  //     'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
  //     'email'    => 'required|valid_email|is_unique[users.email]',
  //   ];

  //   if (!$this->validate($rules)) {
  //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
  //   }

  //   $rules = [
  //     'password'     => 'required|strong_password',
  //     'pass_confirm' => 'required|matches[password]',
  //   ];

  //   if (!$this->validate($rules)) {
  //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
  //   }

  //   // Save the user
  //   $allowedPostFields = array_merge(['password']);
  //   $user = new User($this->request->getPost($allowedPostFields));

  //   $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

  //   // Ensure default group gets assigned if set
  //   if (!empty($this->config->defaultUserGroup)) {
  //     $users = $users->withGroup($this->config->defaultUserGroup);
  //   }

  //   if (!$users->save($user)) {
  //     return redirect()->back()->withInput()->with('errors', $users->errors());
  //   }

  //   if ($this->config->requireActivation !== null) {
  //     $activator = service('activator');
  //     $sent = $activator->send($user);

  //     if (!$sent) {
  //       return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
  //     }

  //     // Success!
  //     return redirect()->to(base_url('/users/index'));
  //   }

  //   // Success!
  //   return redirect()->to(base_url('/users/index'));
  // }









  public function create_persyaratansilancar_admin()
  {
    helper(['form']);
    $data = [
      'title' => 'Form Halaman Tambah Persyaratan Si Lancar || Admin Disdukcapil',
      'validation' => \Config\Services::validation()
    ];
    return view('createAdmin/create_persyaratansilancar_admin', $data);
  }

  public function savePersyaratanSilancar()
  {
    $validate = $this->validate([

      'judulpersyaratan' => [
        'rules' => 'required[persyaratansilancar.judulpersyaratan]',
        'errors' => [
          'required' => 'Judul Persyaratan Harus Di isi !!'
        ],
      ],
      'fotopersyaratan' => [
        'rules' => 'max_size[fotopersyaratan,2048]|is_image[fotopersyaratan]|mime_in[fotopersyaratan,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar terlalu besar !!',
          'is_image' => 'Yang anda pilih bukan gambar !!',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ],
      ],
      'keteranganpersyaratan' => [
        'rules' => 'required[persyaratansilancar.keteranganpersyaratan]',
        'errors' => [
          'required' => 'Keterangan Persyaratan Si Lancar Harus diisi !!'
        ],
      ],
    ]);

    if (!$validate) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Cara Memanggil Gambar
    $fileFotoPersyaratan = $this->request->getFile('fotopersyaratan');
    // Jika terdapat Foto Inovasi yang tidak di upload 
    if ($fileFotoPersyaratan->getError() == 4) {
      $namaFotoPersyaratan = 'inovasidef.PNG';
    } else {
      // Generate nama foto random inovasi
      $namaFotoPersyaratan = $fileFotoPersyaratan->getRandomName();
      // Memindahkan File Gambar ke Folder img/Inovasi
      $fileFotoPersyaratan->move('img/persyaratansilancar', $namaFotoPersyaratan);
    }

    $this->persyaratansilancarModel->save([
      'fotopersyaratan' => $namaFotoPersyaratan,
      'judulpersyaratan' => $this->request->getVar('judulpersyaratan'),
      'keteranganpersyaratan' => $this->request->getVar('keteranganpersyaratan')
    ]);

    session()->setFlashdata('pesan', 'Data Persyaratan Si Lancar Berhasil Ditambahkan');
    return redirect()->to('admin/persyaratansilancar_admin');
  }
}
