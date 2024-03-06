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

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcel extends BaseController
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












  public function exportKK()
  {
    $pendaftaranKK = new Pendaftaran_kk_Model();
    $dataPendaftaranKK = $pendaftaranKK->onlyDeleted()->findAll();

    $spreadsheetPendaftaranKK = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranKK->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Formulir Desa');
    $sheet->setCellValue('F1', 'Kartu Keluarga Suami');
    $sheet->setCellValue('G1', 'Kartu Keluarga Istri');
    $sheet->setCellValue('H1', 'Surat Nikah');
    $sheet->setCellValue('I1', 'Surat Pindah');
    $sheet->setCellValue('J1', 'Status');
    $sheet->setCellValue('K1', 'Di buat Tanggal');
    $sheet->setCellValue('L1', 'Di update Tanggal');
    $sheet->setCellValue('M1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranKK as $KK) {
      $spreadsheetPendaftaranKK->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $KK['namapemohon'])
        ->setCellValue('B' . $column, $KK['emailpemohon'])
        ->setCellValue('C' . $column, $KK['nomorpemohon'])
        ->setCellValue('D' . $column, $KK['alamatpemohon'])
        ->setCellValue('E' . $column, $KK['formulirdesa'])
        ->setCellValue('F' . $column, $KK['kartukeluargasuami'])
        ->setCellValue('G' . $column, $KK['kartukeluargaistri'])
        ->setCellValue('H' . $column, $KK['suratnikah'])
        ->setCellValue('I' . $column, $KK['suratpindah'])
        ->setCellValue('J' . $column, $KK['status'])
        ->setCellValue('K' . $column, $KK['created_at'])
        ->setCellValue('L' . $column, $KK['updated_at'])
        ->setCellValue('M' . $column, $KK['deleted_at']);;
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranKK->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);
    $worksheet->getColumnDimension('K')->setAutoSize(true);
    $worksheet->getColumnDimension('L')->setAutoSize(true);
    $worksheet->getColumnDimension('M')->setAutoSize(true);

    $worksheet->getStyle('A1:M1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:M1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('0000FF');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:M' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:M1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerKK = new Xlsx($spreadsheetPendaftaranKK);
    $fileNameKK = 'Data Selesai Pendaftaran Permohonan Kartu Keluarga Baru';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameKK . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerKK->save('php://output');
  }











  public function exportKIA()
  { {
      $pendaftaranKIA = new Pendaftaran_kia_Model();
      $dataPendaftaranKIA = $pendaftaranKIA->onlyDeleted()->findAll();

      $spreadsheetPendaftaranKIA = new Spreadsheet();
      $sheet = $spreadsheetPendaftaranKIA->getActiveSheet();
      $sheet->setCellValue('A1', 'Nama Pemohon');
      $sheet->setCellValue('B1', 'Email Pemohon');
      $sheet->setCellValue('C1', 'Nomor Pemohon');
      $sheet->setCellValue('D1', 'Alamat Pemohon');
      $sheet->setCellValue('E1', 'Berkas Akta Kelahiran ');
      $sheet->setCellValue('F1', 'Berkas Kartu Keluarga');
      $sheet->setCellValue('G1', 'Berkas Pas Foto');
      $sheet->setCellValue('H1', 'Status');
      $sheet->setCellValue('I1', 'Di buat Tanggal');
      $sheet->setCellValue('J1', 'Di update Tanggal');
      $sheet->setCellValue('K1', 'Di proses Tanggal');

      $column = 2;
      foreach ($dataPendaftaranKIA as $KIA) {
        $spreadsheetPendaftaranKIA->setActiveSheetIndex(0)
          ->setCellValue('A' . $column, $KIA['namapemohon'])
          ->setCellValue('B' . $column, $KIA['emailpemohon'])
          ->setCellValue('C' . $column, $KIA['nomorpemohon'])
          ->setCellValue('D' . $column, $KIA['alamatpemohon'])
          ->setCellValue('E' . $column, $KIA['aktakelahiran'])
          ->setCellValue('F' . $column, $KIA['kartukeluarga'])
          ->setCellValue('G' . $column, $KIA['pasfoto'])
          ->setCellValue('H' . $column, $KIA['status'])
          ->setCellValue('I' . $column, $KIA['created_at'])
          ->setCellValue('J' . $column, $KIA['updated_at'])
          ->setCellValue('K' . $column, $KIA['deleted_at']);
        $column++;
      }

      $worksheet = $spreadsheetPendaftaranKIA->getActiveSheet();
      $worksheet->getColumnDimension('A')->setAutoSize(true);
      $worksheet->getColumnDimension('B')->setAutoSize(true);
      $worksheet->getColumnDimension('C')->setAutoSize(true);
      $worksheet->getColumnDimension('D')->setAutoSize(true);
      $worksheet->getColumnDimension('E')->setAutoSize(true);
      $worksheet->getColumnDimension('F')->setAutoSize(true);
      $worksheet->getColumnDimension('G')->setAutoSize(true);
      $worksheet->getColumnDimension('H')->setAutoSize(true);
      $worksheet->getColumnDimension('I')->setAutoSize(true);
      $worksheet->getColumnDimension('J')->setAutoSize(true);
      $worksheet->getColumnDimension('K')->setAutoSize(true);


      $worksheet->getStyle('A1:K1')->getFont()->setBold(true);
      $worksheet->getStyle('A1:K1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setRGB('FF0000');
      $styleArray = [
        'borders' => [
          'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000']
          ]
        ]
      ];
      $worksheet->getStyle('A1:K' . ($column - 1))->applyFromArray($styleArray);
      $worksheet->getStyle('A1:K1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


      // Menuliskan dalam format
      $writerKIA = new Xlsx($spreadsheetPendaftaranKIA);
      $fileNameKIA = 'Data Selesai Pendaftaran Permohonan Kartu Identitas Anak';

      // Redirect hasil generate Xlsx ke web
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename=' . $fileNameKIA . '.xlsx');
      header('Cache-Control: max-age=0');

      $writerKIA->save('php://output');
    }
  }










  public function exportKKPerceraian()
  {
    $pendaftaranKKPerceraian = new Pendaftaran_kkperceraian_Model();
    $dataPendaftaranKKPerceraian = $pendaftaranKKPerceraian->onlyDeleted()->findAll();

    $spreadsheetPendaftaranKKPerceraian = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranKKPerceraian->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Kartu Keluarga Lama');
    $sheet->setCellValue('F1', 'Akta Perceraian');
    $sheet->setCellValue('G1', 'Status');
    $sheet->setCellValue('H1', 'Di buat Tanggal');
    $sheet->setCellValue('I1', 'Di update Tanggal');
    $sheet->setCellValue('J1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranKKPerceraian as $KKPer) {
      $spreadsheetPendaftaranKKPerceraian->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $KKPer['namapemohon'])
        ->setCellValue('B' . $column, $KKPer['emailpemohon'])
        ->setCellValue('C' . $column, $KKPer['nomorpemohon'])
        ->setCellValue('D' . $column, $KKPer['alamatpemohon'])
        ->setCellValue('E' . $column, $KKPer['kartukeluargalama'])
        ->setCellValue('F' . $column, $KKPer['aktaperceraian'])
        ->setCellValue('G' . $column, $KKPer['status'])
        ->setCellValue('H' . $column, $KKPer['created_at'])
        ->setCellValue('I' . $column, $KKPer['updated_at'])
        ->setCellValue('J' . $column, $KKPer['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranKKPerceraian->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);

    $worksheet->getStyle('A1:J1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:J1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('0000FF');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:J' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:J1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerKKPerceraian = new Xlsx($spreadsheetPendaftaranKKPerceraian);
    $fileNameKKPerceraian = 'Data Selesai Pendaftaran Permohonan Kartu Keluarga Perceraian';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameKKPerceraian . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerKKPerceraian->save('php://output');
  }









  public function exportSuratPerpindahan()
  {
    $pendaftaranSuratPerpindahan = new Pendaftaran_suratperpindahan_Model();
    $dataPendaftaranSuratPerpindahan = $pendaftaranSuratPerpindahan->onlyDeleted()->findAll();

    $spreadsheetPendaftaranSuratPerpindahan = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranSuratPerpindahan->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Form Perpindahan');
    $sheet->setCellValue('F1', 'Kartu Keluarga');
    $sheet->setCellValue('G1', 'Buku Nikah');
    $sheet->setCellValue('H1', 'KTP Suami');
    $sheet->setCellValue('I1', 'KTP Istri');
    $sheet->setCellValue('J1', 'Status');
    $sheet->setCellValue('K1', 'Di buat Tanggal');
    $sheet->setCellValue('L1', 'Di update Tanggal');
    $sheet->setCellValue('M1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranSuratPerpindahan as $SurPin) {
      $spreadsheetPendaftaranSuratPerpindahan->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $SurPin['namapemohon'])
        ->setCellValue('B' . $column, $SurPin['emailpemohon'])
        ->setCellValue('C' . $column, $SurPin['nomorpemohon'])
        ->setCellValue('D' . $column, $SurPin['alamatpemohon'])
        ->setCellValue('E' . $column, $SurPin['formperpindahan'])
        ->setCellValue('F' . $column, $SurPin['kartukeluarga'])
        ->setCellValue('G' . $column, $SurPin['bukunikah'])
        ->setCellValue('H' . $column, $SurPin['ktpsuami'])
        ->setCellValue('I' . $column, $SurPin['ktpistri'])
        ->setCellValue('J' . $column, $SurPin['status'])
        ->setCellValue('K' . $column, $SurPin['created_at'])
        ->setCellValue('L' . $column, $SurPin['updated_at'])
        ->setCellValue('M' . $column, $SurPin['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranSuratPerpindahan->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);
    $worksheet->getColumnDimension('K')->setAutoSize(true);
    $worksheet->getColumnDimension('L')->setAutoSize(true);
    $worksheet->getColumnDimension('M')->setAutoSize(true);

    $worksheet->getStyle('A1:M1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:M1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('000080');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:M' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:M1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerSuratPerpindahan = new Xlsx($spreadsheetPendaftaranSuratPerpindahan);
    $fileNameSuratPerpindahan = 'Data Selesai Pendaftaran Permohonan Surat Perpindahan Majalengka Menuju Luar';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameSuratPerpindahan . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerSuratPerpindahan->save('php://output');
  }









  public function exportSuratPerpindahanLuar()
  {
    $pendaftaranSuratPerpindahanLuar = new Pendaftaran_suratperpindahanluar_Model();
    $dataPendaftaranSuratPerpindahanLuar = $pendaftaranSuratPerpindahanLuar->onlyDeleted()->findAll();

    $spreadsheetPendaftaranSuratPerpindahanLuar = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranSuratPerpindahanLuar->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas SKPWNI');
    $sheet->setCellValue('F1', 'Berkas KTP');

    $column = 2;
    foreach ($dataPendaftaranSuratPerpindahanLuar as $SurPinLuar) {
      $spreadsheetPendaftaranSuratPerpindahanLuar->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $SurPinLuar['namapemohon'])
        ->setCellValue('B' . $column, $SurPinLuar['emailpemohon'])
        ->setCellValue('C' . $column, $SurPinLuar['nomorpemohon'])
        ->setCellValue('D' . $column, $SurPinLuar['alamatpemohon'])
        ->setCellValue('E' . $column, $SurPinLuar['skpwni'])
        ->setCellValue('F' . $column, $SurPinLuar['kartutandapenduduk']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranSuratPerpindahanLuar->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);

    $worksheet->getStyle('A1:F1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:F1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('000080');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:F' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:F1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

    // Menuliskan dalam format
    $writerSuratPerpindahanLuar = new Xlsx($spreadsheetPendaftaranSuratPerpindahanLuar);
    $fileNameSuratPerpindahanLuar = 'Data Selesai Pendaftaran Permohonan Surat Perpindahan Luar Menuju Majalengka';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameSuratPerpindahanLuar . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerSuratPerpindahanLuar->save('php://output');
  }











  public function exportAktaKelahiran()
  {
    $pendaftaranAktaKelahiran = new Pendaftaran_aktakelahiran_Model();
    $dataPendaftaranAktaKelahiran = $pendaftaranAktaKelahiran->onlyDeleted()->findAll();

    $spreadsheetPendaftaranAktaKelahiran = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranAktaKelahiran->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas Formulir F201 Akta Kelahiran');
    $sheet->setCellValue('F1', 'Berkas Surat Keterangan Lahir');
    $sheet->setCellValue('G1', 'Berkas Kartu Keluarga');
    $sheet->setCellValue('H1', 'Berkas KTP Ayah');
    $sheet->setCellValue('I1', 'Berkas KTP Ibu');
    $sheet->setCellValue('J1', 'Status');
    $sheet->setCellValue('K1', 'Di buat Tanggal');
    $sheet->setCellValue('L1', 'Di update Tanggal');
    $sheet->setCellValue('M1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranAktaKelahiran as $akla) {
      $spreadsheetPendaftaranAktaKelahiran->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $akla['namapemohon'])
        ->setCellValue('B' . $column, $akla['emailpemohon'])
        ->setCellValue('C' . $column, $akla['nomorpemohon'])
        ->setCellValue('D' . $column, $akla['alamatpemohon'])
        ->setCellValue('E' . $column, $akla['formulirf201akta'])
        ->setCellValue('F' . $column, $akla['suratketeranganlahir'])
        ->setCellValue('G' . $column, $akla['kartukeluarga'])
        ->setCellValue('H' . $column, $akla['ktpayah'])
        ->setCellValue('I' . $column, $akla['ktpibu'])
        ->setCellValue('J' . $column, $akla['status'])
        ->setCellValue('K' . $column, $akla['created_at'])
        ->setCellValue('L' . $column, $akla['updated_at'])
        ->setCellValue('M' . $column, $akla['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranAktaKelahiran->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);
    $worksheet->getColumnDimension('K')->setAutoSize(true);
    $worksheet->getColumnDimension('L')->setAutoSize(true);
    $worksheet->getColumnDimension('M')->setAutoSize(true);

    $worksheet->getStyle('A1:M1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:M1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('329BE1');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:M' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:M1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerAktaKelahiran = new Xlsx($spreadsheetPendaftaranAktaKelahiran);
    $fileNameAktaKelahiran = 'Data Selesai Pendaftaran Permohonan Akta Kelahiran';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameAktaKelahiran . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerAktaKelahiran->save('php://output');
  }











  public function exportAktaKematian()
  {
    $pendaftaranAktaKematian = new Pendaftaran_aktakematian_Model();
    $dataPendaftaranAktaKematian = $pendaftaranAktaKematian->onlyDeleted()->findAll();

    $spreadsheetPendaftaranAktaKematian = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranAktaKematian->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas Kartu Keluarga');
    $sheet->setCellValue('F1', 'Berkas Surat Kematian');
    $sheet->setCellValue('G1', 'Status');
    $sheet->setCellValue('H1', 'Di buat Tanggal');
    $sheet->setCellValue('I1', 'Di update Tanggal');
    $sheet->setCellValue('J1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranAktaKematian as $akket) {
      $spreadsheetPendaftaranAktaKematian->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $akket['namapemohon'])
        ->setCellValue('B' . $column, $akket['emailpemohon'])
        ->setCellValue('C' . $column, $akket['nomorpemohon'])
        ->setCellValue('D' . $column, $akket['alamatpemohon'])
        ->setCellValue('E' . $column, $akket['kartukeluarga'])
        ->setCellValue('F' . $column, $akket['suratkematian'])
        ->setCellValue('G' . $column, $akket['status'])
        ->setCellValue('H' . $column, $akket['created_at'])
        ->setCellValue('I' . $column, $akket['updated_at'])
        ->setCellValue('J' . $column, $akket['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranAktaKematian->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);

    $worksheet->getStyle('A1:J1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:J1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('950530');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:J' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:J1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerAktaKematian = new Xlsx($spreadsheetPendaftaranAktaKematian);
    $fileNameAktaKematian = 'Data Selesai Pendaftaran Permohonan Akta Kematian';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameAktaKematian . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerAktaKematian->save('php://output');
  }











  public function exportKeabsahanAkla()
  {
    $pendaftaranKeabsahanAkla = new Pendaftaran_keabsahanakla_Model();
    $dataPendaftaranKeabsahanAkla = $pendaftaranKeabsahanAkla->onlyDeleted()->findAll();

    $spreadsheetPendaftaranKeabsahanAkla = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranKeabsahanAkla->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas Akta Kelahiran');
    $sheet->setCellValue('F1', 'Berkas Kartu Tanda Penduduk');
    $sheet->setCellValue('G1', 'Status');
    $sheet->setCellValue('H1', 'Di buat Tanggal');
    $sheet->setCellValue('I1', 'Di update Tanggal');
    $sheet->setCellValue('J1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranKeabsahanAkla as $akla) {
      $spreadsheetPendaftaranKeabsahanAkla->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $akla['namapemohon'])
        ->setCellValue('B' . $column, $akla['emailpemohon'])
        ->setCellValue('C' . $column, $akla['nomorpemohon'])
        ->setCellValue('D' . $column, $akla['alamatpemohon'])
        ->setCellValue('E' . $column, $akla['aktakelahiran'])
        ->setCellValue('F' . $column, $akla['kartutandapenduduk'])
        ->setCellValue('G' . $column, $akla['status'])
        ->setCellValue('H' . $column, $akla['created_at'])
        ->setCellValue('I' . $column, $akla['updated_at'])
        ->setCellValue('J' . $column, $akla['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranKeabsahanAkla->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);

    $worksheet->getStyle('A1:J1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:J1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('49C7DC');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:J' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:J1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerKeabsahanAktaKelahiran = new Xlsx($spreadsheetPendaftaranKeabsahanAkla);
    $fileNameKeabsahanAktaKelahiran = 'Data Selesai Pendaftaran Permohonan Keabsahan Akta Kelahiran';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNameKeabsahanAktaKelahiran . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerKeabsahanAktaKelahiran->save('php://output');
  }











  public function exportPelayananData()
  {
    $pendaftaranPelayananData = new Pendaftaran_pelayanandata_Model();
    $dataPendaftaranPelayananData = $pendaftaranPelayananData->onlyDeleted()->findAll();

    $spreadsheetPendaftaranPelayananData = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranPelayananData->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas Pelayanan 1');
    $sheet->setCellValue('G1', 'Berkas Pelayanan 2');
    $sheet->setCellValue('H1', 'Berkas Pelayanan 3');
    $sheet->setCellValue('I1', 'Berkas Pelayanan 4');
    $sheet->setCellValue('J1', 'Berkas Pelayanan 5');
    $sheet->setCellValue('K1', 'Berkas Pelayanan 6');
    $sheet->setCellValue('L1', 'Berkas Pelayanan 7');
    $sheet->setCellValue('M1', 'Berkas Pelayanan 8');
    $sheet->setCellValue('N1', 'Berkas Pelayanan 9');
    $sheet->setCellValue('O1', 'Berkas Pelayanan 10');
    $sheet->setCellValue('P1', 'Status');
    $sheet->setCellValue('Q1', 'Di buat Tanggal');
    $sheet->setCellValue('R1', 'Di update Tanggal');
    $sheet->setCellValue('S1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranPelayananData as $akla) {
      $spreadsheetPendaftaranPelayananData->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $akla['namapemohon'])
        ->setCellValue('B' . $column, $akla['emailpemohon'])
        ->setCellValue('C' . $column, $akla['nomorpemohon'])
        ->setCellValue('D' . $column, $akla['alamatpemohon'])
        ->setCellValue('E' . $column, $akla['berkaspelayanan1'])
        ->setCellValue('G' . $column, $akla['berkaspelayanan2'])
        ->setCellValue('H' . $column, $akla['berkaspelayanan3'])
        ->setCellValue('I' . $column, $akla['berkaspelayanan4'])
        ->setCellValue('J' . $column, $akla['berkaspelayanan5'])
        ->setCellValue('K' . $column, $akla['berkaspelayanan6'])
        ->setCellValue('L' . $column, $akla['berkaspelayanan7'])
        ->setCellValue('M' . $column, $akla['berkaspelayanan8'])
        ->setCellValue('N' . $column, $akla['berkaspelayanan9'])
        ->setCellValue('O' . $column, $akla['berkaspelayanan10'])
        ->setCellValue('P' . $column, $akla['status'])
        ->setCellValue('Q' . $column, $akla['created_at'])
        ->setCellValue('R' . $column, $akla['updated_at'])
        ->setCellValue('S' . $column, $akla['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranPelayananData->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);
    $worksheet->getColumnDimension('K')->setAutoSize(true);
    $worksheet->getColumnDimension('L')->setAutoSize(true);
    $worksheet->getColumnDimension('M')->setAutoSize(true);
    $worksheet->getColumnDimension('N')->setAutoSize(true);
    $worksheet->getColumnDimension('O')->setAutoSize(true);
    $worksheet->getColumnDimension('P')->setAutoSize(true);
    $worksheet->getColumnDimension('Q')->setAutoSize(true);
    $worksheet->getColumnDimension('R')->setAutoSize(true);
    $worksheet->getColumnDimension('S')->setAutoSize(true);

    $worksheet->getStyle('A1:J1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:J1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('000000');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:J' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:J1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerPelayananData = new Xlsx($spreadsheetPendaftaranPelayananData);
    $fileNamePelayananData = 'Data Selesai Pendaftaran Permohonan Pelayanan dan Pemanfaatan Data Inovasi antar Lembaga';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNamePelayananData . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerPelayananData->save('php://output');
  }











  public function exportPerbaikanData()
  {
    $pendaftaranPerbaikanData = new Perbaikan_data_Model();
    $dataPendaftaranPerbaikanData = $pendaftaranPerbaikanData->onlyDeleted()->findAll();

    $spreadsheetPendaftaranPerbaikanData = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranPerbaikanData->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas Perbaikan 1');
    $sheet->setCellValue('G1', 'Berkas Perbaikan 2');
    $sheet->setCellValue('H1', 'Berkas Perbaikan 3');
    $sheet->setCellValue('I1', 'Berkas Perbaikan 4');
    $sheet->setCellValue('J1', 'Berkas Perbaikan 5');
    $sheet->setCellValue('K1', 'Penjelasan Perbaikan');
    $sheet->setCellValue('L1', 'Status');
    $sheet->setCellValue('M1', 'Di buat Tanggal');
    $sheet->setCellValue('N1', 'Di update Tanggal');
    $sheet->setCellValue('O1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranPerbaikanData as $perdat) {
      $spreadsheetPendaftaranPerbaikanData->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $perdat['namapemohon'])
        ->setCellValue('B' . $column, $perdat['emailpemohon'])
        ->setCellValue('C' . $column, $perdat['nomorpemohon'])
        ->setCellValue('D' . $column, $perdat['alamatpemohon'])
        ->setCellValue('E' . $column, $perdat['berkasperbaikan_satu'])
        ->setCellValue('G' . $column, $perdat['berkasperbaikan_dua'])
        ->setCellValue('H' . $column, $perdat['berkasperbaikan_tiga'])
        ->setCellValue('I' . $column, $perdat['berkasperbaikan_empat'])
        ->setCellValue('J' . $column, $perdat['berkasperbaikan_lima'])
        ->setCellValue('K' . $column, $perdat['penjelasanperbaikan'])
        ->setCellValue('L' . $column, $perdat['status'])
        ->setCellValue('M' . $column, $perdat['created_at'])
        ->setCellValue('N' . $column, $perdat['updated_at'])
        ->setCellValue('O' . $column, $perdat['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranPerbaikanData->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);
    $worksheet->getColumnDimension('K')->setAutoSize(true);
    $worksheet->getColumnDimension('L')->setAutoSize(true);
    $worksheet->getColumnDimension('M')->setAutoSize(true);
    $worksheet->getColumnDimension('N')->setAutoSize(true);
    $worksheet->getColumnDimension('O')->setAutoSize(true);

    $worksheet->getStyle('A1:J1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:J1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('98FB98');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:J' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:J1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerPerbaikanData = new Xlsx($spreadsheetPendaftaranPerbaikanData);
    $fileNamePerbaikanData = 'Data Selesai Pendaftaran Permohonan Perbaikan Data';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNamePerbaikanData . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerPerbaikanData->save('php://output');
  }











  public function exportPengaduanUpdate()
  {
    $pendaftaranPengaduanUpdate = new Pengaduan_update_Model();
    $dataPendaftaranPengaduanUpdate = $pendaftaranPengaduanUpdate->onlyDeleted()->findAll();

    $spreadsheetPendaftaranPengaduanUpdate = new Spreadsheet();
    $sheet = $spreadsheetPendaftaranPengaduanUpdate->getActiveSheet();
    $sheet->setCellValue('A1', 'Nama Pemohon');
    $sheet->setCellValue('B1', 'Email Pemohon');
    $sheet->setCellValue('C1', 'Nomor Pemohon');
    $sheet->setCellValue('D1', 'Alamat Pemohon');
    $sheet->setCellValue('E1', 'Berkas Kartu Tanda Penduduk');
    $sheet->setCellValue('F1', 'Berkas Kartu Keluarga');
    $sheet->setCellValue('G1', 'Penjelasan Pengaduan Update');
    $sheet->setCellValue('H1', 'Status');
    $sheet->setCellValue('I1', 'Di buat Tanggal');
    $sheet->setCellValue('J1', 'Di update Tanggal');
    $sheet->setCellValue('K1', 'Di proses Tanggal');

    $column = 2;
    foreach ($dataPendaftaranPengaduanUpdate as $pengdat) {
      $spreadsheetPendaftaranPengaduanUpdate->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $pengdat['namapemohon'])
        ->setCellValue('B' . $column, $pengdat['emailpemohon'])
        ->setCellValue('C' . $column, $pengdat['nomorpemohon'])
        ->setCellValue('D' . $column, $pengdat['alamatpemohon'])
        ->setCellValue('E' . $column, $pengdat['kartutandapenduduk'])
        ->setCellValue('F' . $column, $pengdat['kartukeluarga'])
        ->setCellValue('G' . $column, $pengdat['pengaduanupdate'])
        ->setCellValue('H' . $column, $pengdat['status'])
        ->setCellValue('I' . $column, $pengdat['created_at'])
        ->setCellValue('J' . $column, $pengdat['updated_at'])
        ->setCellValue('K' . $column, $pengdat['deleted_at']);
      $column++;
    }

    $worksheet = $spreadsheetPendaftaranPengaduanUpdate->getActiveSheet();
    $worksheet->getColumnDimension('A')->setAutoSize(true);
    $worksheet->getColumnDimension('B')->setAutoSize(true);
    $worksheet->getColumnDimension('C')->setAutoSize(true);
    $worksheet->getColumnDimension('D')->setAutoSize(true);
    $worksheet->getColumnDimension('E')->setAutoSize(true);
    $worksheet->getColumnDimension('F')->setAutoSize(true);
    $worksheet->getColumnDimension('G')->setAutoSize(true);
    $worksheet->getColumnDimension('H')->setAutoSize(true);
    $worksheet->getColumnDimension('I')->setAutoSize(true);
    $worksheet->getColumnDimension('J')->setAutoSize(true);
    $worksheet->getColumnDimension('K')->setAutoSize(true);

    $worksheet->getStyle('A1:K1')->getFont()->setBold(true);
    $worksheet->getStyle('A1:K1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setRGB('329BE1');
    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          'color' => ['argb' => 'FF000000']
        ]
      ]
    ];
    $worksheet->getStyle('A1:K' . ($column - 1))->applyFromArray($styleArray);
    $worksheet->getStyle('A1:K1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);


    // Menuliskan dalam format
    $writerPengaduanUpdate = new Xlsx($spreadsheetPendaftaranPengaduanUpdate);
    $fileNamePengaduanUpdate = 'Data Selesai Pendaftaran Permohonan Pengaduan Update';

    // Redirect hasil generate Xlsx ke web
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileNamePengaduanUpdate . '.xlsx');
    header('Cache-Control: max-age=0');

    $writerPengaduanUpdate->save('php://output');
  }
}
