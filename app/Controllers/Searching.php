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
      'title' => 'Pengecekan Status || Disdukcapil Majalengka'
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
      'title' => 'Hasil Status KK || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKK', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk = $this->kkModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kk) {
      $data['pendaftaran_kk'] = $pendaftaran_kk;
      return view('pencarian_views/hasilKK', $data);
    } else {
      $data['error_message'] = 'Data Kartu Keluarga Baru tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
  }













  public function cekKKPemisahan()
  {
    helper(['form']);
    $data = [
      'title' => 'Pengecekan Status KK Pemisahan || Disdukcapil Majalengka',
      'pendaftaran_kk_pemisahan' => $this->kkpemisahanModel,
      'validation' => \Config\Services::validation()
    ];
    return view('pencarian_views/cekKKPemisahan', $data);
  }

  public function cariKKPemisahan()
  {
    $data = [
      'title' => 'Hasil Status KK Pemisahan || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKKPemisahan', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_pemisahan = $this->kkpemisahanModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kk_pemisahan) {
      $data['pendaftaran_kk_pemisahan'] = $pendaftaran_kk_pemisahan;
      return view('pencarian_views/hasilKKPemisahan', $data);
    } else {
      $data['error_message'] = 'Data Kartu Keluarga Pemisahan tidak ditemukan';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status KK Penambahan || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKKPenambahan', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_penambahan = $this->kkpenambahanModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kk_penambahan) {
      $data['pendaftaran_kk_penambahan'] = $pendaftaran_kk_penambahan;
      return view('pencarian_views/hasilKKPenambahan', $data);
    } else {
      $data['error_message'] = 'Data Kartu Keluarga Penambahan tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status KK Pengurangan || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKKPengurangan', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_pengurangan = $this->kkpenguranganModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kk_pengurangan) {
      $data['pendaftaran_kk_pengurangan'] = $pendaftaran_kk_pengurangan;
      return view('pencarian_views/hasilKKPengurangan', $data);
    } else {
      $data['error_message'] = 'Data Kartu Keluarga Pengurangan tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status KK Perubahan || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKKPerubahan', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_perubahan = $this->kkperubahanModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kk_perubahan) {
      $data['pendaftaran_kk_perubahan'] = $pendaftaran_kk_perubahan;
      return view('pencarian_views/hasilKKPerubahan', $data);
    } else {
      $data['error_message'] = 'Data Kartu Keluarga Perubahan tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status KK Perceraian || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKKPerceraian', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kk_perceraian = $this->kkperceraianModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kk_perceraian) {
      $data['pendaftaran_kk_perceraian'] = $pendaftaran_kk_perceraian;
      return view('pencarian_views/hasilKKPerceraian', $data);
    } else {
      $data['error_message'] = 'Data Kartu Keluarga Perceraian tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status KIA || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKIA', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_kia = $this->kiaModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_kia) {
      $data['pendaftaran_kia'] = $pendaftaran_kia;
      return view('pencarian_views/hasilKIA', $data);
    } else {
      $data['error_message'] = 'Data Kartu Identitas Anak tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Surat Perpindahan || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekSuratPerpindahan', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_suratperpindahan = $this->suratperpindahanModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_suratperpindahan) {
      $data['pendaftaran_suratperpindahan'] = $pendaftaran_suratperpindahan;
      return view('pencarian_views/hasilSuratPerpindahan', $data);
    } else {
      $data['error_message'] = 'Data Surat Perpindahan tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Surat Perpindahan Luar || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekSuratPerpindahanLuar', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_suratperpindahanluar = $this->suratperpindahanluarModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_suratperpindahanluar) {
      $data['pendaftaran_suratperpindahanluar'] = $pendaftaran_suratperpindahanluar;
      return view('pencarian_views/hasilSuratPerpindahanLuar', $data);
    } else {
      $data['error_message'] = 'Data Surat Perpindahan Luar tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Akta Kelahiran || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekAktaKelahiran', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_aktakelahiran = $this->aktakelahiranModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_aktakelahiran) {
      $data['pendaftaran_aktakelahiran'] = $pendaftaran_aktakelahiran;
      return view('pencarian_views/hasilAktaKelahiran', $data);
    } else {
      $data['error_message'] = 'Data Akta Kelahiran tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Akta Kematian || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekAktaKematian', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_aktakematian = $this->aktakematianModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_aktakematian) {
      $data['pendaftaran_aktakematian'] = $pendaftaran_aktakematian;
      return view('pencarian_views/hasilAktaKematian', $data);
    } else {
      $data['error_message'] = 'Data Akta Kematian tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Keabsahan Akla || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekKeabsahanAkla', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_keabsahanakla = $this->keabsahanaklaModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_keabsahanakla) {
      $data['pendaftaran_keabsahanakla'] = $pendaftaran_keabsahanakla;
      return view('pencarian_views/hasilKeabsahanAkla', $data);
    } else {
      $data['error_message'] = 'Data Keabsahan Akta Kelahiran tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Pelayanan Data || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekPelayananData', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_pelayanandata = $this->pelayanandataModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_pelayanandata) {
      $data['pendaftaran_pelayanandata'] = $pendaftaran_pelayanandata;
      return view('pencarian_views/hasilPelayananData', $data);
    } else {
      $data['error_message'] = 'Data Pelayanan Data tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Perbaikan Data || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekPerbaikanData', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $perbaikan_data = $this->perbaikandataModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($perbaikan_data) {
      $data['perbaikan_data'] = $perbaikan_data;
      return view('pencarian_views/hasilPerbaikanData', $data);
    } else {
      $data['error_message'] = 'Data Perbaikan Data tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
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
      'title' => 'Hasil Status Pengaduan Update || Disdukcapil Majalengka'
    ];

    $validationRules = [
      'keyword' => [
        'rules' => 'required|exact_length[16]',
        'errors' => [
          'required' => 'NIK harus diisi !!',
          'exact_length' => 'NIK harus terdiri dari 16 angka !!'
        ],
      ]
    ];

    $validationMessages = [
      'keyword' => [
        'required' => 'NIK harus diisi !!',
        'exact_length' => 'NIK harus terdiri dari 16 angka !!'
      ]
    ];

    $this->validate($validationRules, $validationMessages);

    if ($this->validator->hasError('keyword')) {
      $data['validation'] = $this->validator;
      return view('pencarian_views/cekPengaduanUpdate', $data);
    }

    $keyword = $this->request->getVar('keyword');
    $pendaftaran_pengaduanupdate = $this->pengaduanupdateModel->search($keyword)->onlyDeleted()->get()->getResultArray();

    if ($pendaftaran_pengaduanupdate) {
      $data['pengaduan_update'] = $pendaftaran_pengaduanupdate;
      return view('pencarian_views/hasilPengaduanUpdate', $data);
    } else {
      $data['error_message'] = 'Data Pengaduan Update tidak ditemukan.';
      return view('pencarian_views/cekError', $data);
    }
  }
}
