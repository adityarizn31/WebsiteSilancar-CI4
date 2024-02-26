<?php

// Controller Halaman Beranda

namespace App\Controllers;

use App\Models\SampulSilancarModel;
use App\Models\BeritaModel;
use App\Models\InovasiModel;

class Beranda extends BaseController
{
  protected $sampulsilancarModel;
  protected $beritaModel;
  protected $inovasiModel;

  public function __construct()
  {
    $this->sampulsilancarModel = new SampulSilancarModel();
    $this->beritaModel = new BeritaModel();
    $this->inovasiModel = new InovasiModel();
  }

  public function index()
  {
    $sampulsilancar = $this->sampulsilancarModel->findAll();
    $berita = $this->beritaModel->findAll();
    $inovasi = $this->inovasiModel->findAll();

    $data = [
      'title' => 'Beranda || Disdukcapil Majalengka',
      'sampulsilancar' => $sampulsilancar,
      'berita' => $berita,
      'inovasi' => $inovasi
    ];
    return view('beranda_views/index', $data);
  }
}
