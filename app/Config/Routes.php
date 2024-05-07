<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// adityarizkiawann@gmail.com  
// Sadilcantik05!

$routes->get('/', 'Beranda::index');

$routes->post('auth/login', 'Admin::login');
$routes->post('auth/register', 'Admin::register');

$routes->get('/', 'Home::index');
$routes->get('news/index', 'News::index', ['filter' => 'role:administrator, user']);
$routes->get('news/add', 'News::add', ['filter' => 'role:administrator']);


// Benar
$routes->get('/Admin', 'Admin::index', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:superadmin, adminsilancar']);

$routes->get('admin/berita_admin/(:segment)', 'CreateAdmin::create_berita_admin/$1', ['filter' => 'role:superadminsilancar']);
$routes->get('/detailadmin/edit_berita_admin/(:segment)', 'EditUpdateAdmin::editBerita/$1', ['filter' => 'role:superadminsilancar']);
$routes->delete('detailadmin/detail_berita_admin/(:num)', 'DeleteAdmin::deleteBerita/$1', ['filter' => 'role:superadminsilancar']);
$routes->get('detailadmin/berita_admin/(:any)', 'DetailAdmin::detail_berita_admin/$1', ['filter' => 'role:superadminsilancar']);

$routes->get('admin/visimisi_admin/(:segment)', 'EditUpdateAdmin::editVisiMisi/$1', ['filter' => 'role:superadminsilancar']);

$routes->get('createAdmin/create_persyaratansilancar_admin/(:segment)', 'CreateAdmin::create_persyaratansilancar_admin/$1', ['filter' => 'role:superadminsilancar']);
$routes->get('admin/persyaratansilancar_admin/(:segment)', 'EditUpdateAdmin::editPersyaratan/$1', ['filter' => 'role:superadminsilancar']);

$routes->get('admin/pendaftaran_kk_admin/(:segment)', 'Admin::pendaftaran_kk_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_kkpemisahan_admin/(:segment)', 'Admin::pendaftaran_kkpemisahan_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_kkpenambahan_admin/(:segment)', 'Admin::pendaftaran_kkpenambahan_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_kkpengurangan_admin/(:segment)', 'Admin::pendaftaran_kkpengurangan_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_kkperubahan_admin/(:segment)', 'Admin::pendaftaran_kkperubahan_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_kkperceraian_admin/(:segment)', 'Admin::pendaftaran_kkperceraian_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_kia_admin/(:segment)', 'Admin::pendaftaran_kia_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_suratperpindahan_admin/(:segment)', 'Admin::pendaftaran_suratperpindahan_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_suratperpindahanluar_admin/(:segment)', 'Admin::pendaftaran_suratperpindahanluar_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_aktakelahiran_admin/(:segment)', 'Admin::pendaftaran_aktakelahiran_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_aktakematian_admin/(:segment)', 'Admin::pendaftaran_aktakematian_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_keabsahanaktakelahiran_admin/(:segment)', 'Admin::pendaftaran_keabsahanaktakelahiran_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_pelayanandata_admin/(:segment)', 'Admin::pendaftaran_pelayanandata_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/perbaikan_data_admin/(:segment)', 'Admin::pendaftaran_perbaikan_data_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/pendaftaran_pengaduanupdate_admin/(:segment)', 'Admin::pendaftaran_pengaduanupdate_admin/$1', ['filter' => 'role:superadmin, adminsilancar']);

$routes->delete('admin/dataKK/(:any)', 'DeleteAdmin::deletePermanentKK/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataKK', 'DeleteAdmin::deletePermanentKK', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataKIA/(:any)', 'DeleteAdmin::deletePermanentKIA/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataKIA', 'DeleteAdmin::deletePermanentKIA', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataKKPerceraian/(:any)', 'DeleteAdmin::deletePermanentKKPerceraian/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataKKPerceraian', 'DeleteAdmin::deletePermanentKKPerceraian', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPerpindahan/(:any)', 'DeleteAdmin::deletePermanentSuratPerpindahan/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPerpindahan', 'DeleteAdmin::deletePermanentSuratPerpindahan', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPerpindahanLuar/(:any)', 'DeleteAdmin::deletePermanentSuratPerpindahanLuar/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPerpindahanLuar', 'DeleteAdmin::deletePermanentSuratPerpindahanLuar', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratAktaKelahiran/(:any)', 'DeleteAdmin::deletePermanentSuratAktaKelahiran/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratAktaKelahiran', 'DeleteAdmin::deletePermanentSuratAktaKelahiran', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratAktaKematian/(:any)', 'DeleteAdmin::deletePermanentSuratAktaKematian/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratAktaKematian', 'DeleteAdmin::deletePermanentSuratAktaKematian', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratKeabsahanAkla/(:any)', 'DeleteAdmin::deletePermanentSuratKeabsahanAkla/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratKeabsahanAkla', 'DeleteAdmin::deletePermanentSuratKeabsahanAkla', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPelayananData/(:any)', 'DeleteAdmin::deletePermanentSuratPelayananData/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPelayananData', 'DeleteAdmin::deletePermanentSuratPelayananData', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPerbaikanData/(:any)', 'DeleteAdmin::deletePermanentSuratPerbaikanData/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPerbaikanData', 'DeleteAdmin::deletePermanentSuratPerbaikanData', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPengaduanUpdate/(:any)', 'DeleteAdmin::deletePermanentSuratPengaduanUpdate/$1', ['filter' => 'role:superadmin, adminsilancar']);
$routes->delete('admin/dataSuratPengaduanUpdate', 'DeleteAdmin::deletePermanentSuratPengaduanUpdate', ['filter' => 'role:superadmin, adminsilancar']);

$routes->get('admin/dataKK', 'ExportExcel::exportKK', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataKIA', 'ExportExcel::exportKIA', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataKKPerceraian', 'ExportExcel::exportKKPerceraian', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataSuratPerpindahan', 'ExportExcel::exportSuratPerpindahan', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataSuratPerpindahanLuar', 'ExportExcel::exportSuratPerpindahanLuar', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataAktaKelahiran', 'ExportExcel::exportAktaKelahiran', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataAktaKematian', 'ExportExcel::exportAktaKematian', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataKeabsahanAkla', 'ExportExcel::exportKeabsahanAkla', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataPelayananData', 'ExportExcel::exportPelayananData', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataPerbaikanData', 'ExportExcel::exportPerbaikanData', ['filter' => 'role:superadmin, adminsilancar']);
$routes->get('admin/dataPengaduanUpdate', 'ExportExcel::exportPengaduanUpdate', ['filter' => 'role:superadmin, adminsilancar']);

// $routes->get('/Admin', 'Admin::index');
// $routes->get('/admin/index', 'Admin::index');

$routes->post('pelayanan_views/pendaftaranKK', 'PelayananSilancar::pendaftaranKK');

$routes->get('admin/data_admin/(:segment)', 'CreateAdmin::create_akun_admin/$1');
$routes->get('/admin/edit_akun_admin/(:segment)', 'Admin::create_akun_admin/$1');
$routes->delete('admin/detail_akun_admin/(:num)', 'Admin::deleteAkunAdmin/$1');
$routes->get('detailadmin/data_admin/(:any)', 'DetailAdmin::detail_akun_admin/$1');

$routes->get('admin/inovasi_admin/(:segment)', 'CreateAdmin::create_inovasi_admin/$1', ['filter' => 'role:admin']);
$routes->get('/detailadmin/edit_inovasi_admin/(:segment)', 'EditUpdateAdmin::editInovasi/$1', ['filter' => 'role:admin']);
$routes->delete('detailadmin/detail_inovasi_admin/(:num)', 'DeleteAdmin::deleteInovasi/$1', ['filter' => 'role:admin']);
$routes->get('detailadmin/inovasi_admin/(:any)', 'DetailAdmin::detail_inovasi_admin/$1', ['filter' => 'role:admin']);






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
