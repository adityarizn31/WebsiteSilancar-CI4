<?php

namespace App\Controllers;

use App\Models\VisiMisiModel;
use App\Models\PersyaratansilancarModel;


class TentangSiLancar extends BaseController
{
  protected $visimisiModel;
  protected $persyaratansilancarModel;

  public function __construct()
  {
    $this->visimisiModel = new VisiMisiModel();
    $this->persyaratansilancarModel = new PersyaratansilancarModel();
  }

  public function index()
  {
    $visimisi = $this->visimisiModel->findAll();
    $persyaratansilancar = $this->persyaratansilancarModel->findAll();

    $data = [
      'title' => 'Tentang Si Lancar || Disdukcapil Majalengka',
      'visimisi' => $visimisi,
      'persyaratansilancar' => $persyaratansilancar
    ];
    return view('tentangsilancar_views/index', $data);
  }
}
