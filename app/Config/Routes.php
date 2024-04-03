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

// Benar
// $routes->get('/Admin', 'Admin::index', ['filter' => 'role:admin']);
// $routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);

$routes->get('/Admin', 'Admin::index');
$routes->get('/admin/index', 'Admin::index');

$routes->post('pelayanan_views/pendaftaranKK', 'PelayananSilancar::pendaftaranKK');

$routes->get('admin/data_admin/(:segment)', 'CreateAdmin::create_akun_admin/$1');
$routes->get('/admin/edit_akun_admin/(:segment)', 'Admin::create_akun_admin/$1');
$routes->delete('admin/detail_akun_admin/(:num)', 'Admin::deleteAkunAdmin/$1');
$routes->get('detailadmin/data_admin/(:any)', 'DetailAdmin::detail_akun_admin/$1');

$routes->get('admin/berita_admin/(:segment)', 'CreateAdmin::create_berita_admin/$1', ['filter' => 'role:admin']);
$routes->get('/detailadmin/edit_berita_admin/(:segment)', 'EditUpdateAdmin::editBerita/$1', ['filter' => 'role:admin']);
$routes->delete('detailadmin/detail_berita_admin/(:num)', 'DeleteAdmin::deleteBerita/$1', ['filter' => 'role:admin']);
$routes->get('detailadmin/berita_admin/(:any)', 'DetailAdmin::detail_berita_admin/$1', ['filter' => 'role:admin']);

$routes->get('admin/inovasi_admin/(:segment)', 'CreateAdmin::create_inovasi_admin/$1', ['filter' => 'role:admin']);
$routes->get('/detailadmin/edit_inovasi_admin/(:segment)', 'EditUpdateAdmin::editInovasi/$1', ['filter' => 'role:admin']);
$routes->delete('detailadmin/detail_inovasi_admin/(:num)', 'DeleteAdmin::deleteInovasi/$1', ['filter' => 'role:admin']);
$routes->get('detailadmin/inovasi_admin/(:any)', 'DetailAdmin::detail_inovasi_admin/$1', ['filter' => 'role:admin']);

$routes->delete('admin/dataKK/(:any)', 'DeleteAdmin::deletePermanentKK/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataKK', 'DeleteAdmin::deletePermanentKK', ['filter' => 'role:admin']);
$routes->delete('admin/dataKIA/(:any)', 'DeleteAdmin::deletePermanentKIA/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataKIA', 'DeleteAdmin::deletePermanentKIA', ['filter' => 'role:admin']);
$routes->delete('admin/dataKKPerceraian/(:any)', 'DeleteAdmin::deletePermanentKKPerceraian/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataKKPerceraian', 'DeleteAdmin::deletePermanentKKPerceraian', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPerpindahan/(:any)', 'DeleteAdmin::deletePermanentSuratPerpindahan/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPerpindahan', 'DeleteAdmin::deletePermanentSuratPerpindahan', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPerpindahanLuar/(:any)', 'DeleteAdmin::deletePermanentSuratPerpindahanLuar/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPerpindahanLuar', 'DeleteAdmin::deletePermanentSuratPerpindahanLuar', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratAktaKelahiran/(:any)', 'DeleteAdmin::deletePermanentSuratAktaKelahiran/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratAktaKelahiran', 'DeleteAdmin::deletePermanentSuratAktaKelahiran', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratAktaKematian/(:any)', 'DeleteAdmin::deletePermanentSuratAktaKematian/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratAktaKematian', 'DeleteAdmin::deletePermanentSuratAktaKematian', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratKeabsahanAkla/(:any)', 'DeleteAdmin::deletePermanentSuratKeabsahanAkla/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratKeabsahanAkla', 'DeleteAdmin::deletePermanentSuratKeabsahanAkla', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPelayananData/(:any)', 'DeleteAdmin::deletePermanentSuratPelayananData/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPelayananData', 'DeleteAdmin::deletePermanentSuratPelayananData', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPerbaikanData/(:any)', 'DeleteAdmin::deletePermanentSuratPerbaikanData/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPerbaikanData', 'DeleteAdmin::deletePermanentSuratPerbaikanData', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPengaduanUpdate/(:any)', 'DeleteAdmin::deletePermanentSuratPengaduanUpdate/$1', ['filter' => 'role:admin']);
$routes->delete('admin/dataSuratPengaduanUpdate', 'DeleteAdmin::deletePermanentSuratPengaduanUpdate', ['filter' => 'role:admin']);

$routes->get('admin/dataKK', 'ExportExcel::exportKK', ['filter' => 'role:admin']);
$routes->get('admin/dataKIA', 'ExportExcel::exportKIA', ['filter' => 'role:admin']);
$routes->get('admin/dataKKPerceraian', 'ExportExcel::exportKKPerceraian', ['filter' => 'role:admin']);
$routes->get('admin/dataSuratPerpindahan', 'ExportExcel::exportSuratPerpindahan', ['filter' => 'role:admin']);
$routes->get('admin/dataSuratPerpindahanLuar', 'ExportExcel::exportSuratPerpindahanLuar', ['filter' => 'role:admin']);
$routes->get('admin/dataAktaKelahiran', 'ExportExcel::exportAktaKelahiran', ['filter' => 'role:admin']);
$routes->get('admin/dataAktaKematian', 'ExportExcel::exportAktaKematian', ['filter' => 'role:admin']);
$routes->get('admin/dataKeabsahanAkla', 'ExportExcel::exportKeabsahanAkla', ['filter' => 'role:admin']);
$routes->get('admin/dataPelayananData', 'ExportExcel::exportPelayananData', ['filter' => 'role:admin']);
$routes->get('admin/dataPerbaikanData', 'ExportExcel::exportPerbaikanData', ['filter' => 'role:admin']);
$routes->get('admin/dataPengaduanUpdate', 'ExportExcel::exportPengaduanUpdate', ['filter' => 'role:admin']);


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
