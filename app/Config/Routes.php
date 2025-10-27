<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Home::index', ['filter' => 'group:user']);

$routes->group('supervisor', ['filter' => 'group:supervisor'], static function ($routes) {
    $routes->get('/', 'Supervisor\Dashboard::index');
});

$routes->group('verifikator', ['filter' => 'group:verifikator'], static function ($routes) {
    $routes->get('/', 'Verifikator\Dashboard::index');
    
    $routes->group('usulan', static function ($routes) {
        $routes->get('/', 'Verifikator\Usulan::index');
        $routes->get('getdata', 'Verifikator\Usulan::getdata');
        $routes->get('detail/(:any)', 'Verifikator\Usulan::detail/$1');
        $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Usulan::validasidokumen/$1/$2/$3');
        $routes->post('decline/(:any)', 'Verifikator\Usulan::decline/$1');
        $routes->get('accept/(:any)', 'Verifikator\Usulan::accept/$1');
        $routes->get('proses/(:any)', 'Verifikator\Usulan::proses/$1');
    });
    
    $routes->group('penilaian', static function ($routes) {
        $routes->get('/', 'Verifikator\Penilaian::index');
        $routes->get('getdata', 'Verifikator\Penilaian::getdata');
        $routes->get('accept/(:any)', 'Verifikator\Penilaian::accept/$1');
        $routes->get('detail/(:any)', 'Verifikator\Penilaian::detail/$1');
        $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Penilaian::validasidokumen/$1/$2/$3');
        $routes->post('decline/(:any)', 'Verifikator\Penilaian::decline/$1');
        $routes->post('save/(:any)', 'Verifikator\Penilaian::savenilai/$1');
        $routes->get('done/(:any)', 'Verifikator\Penilaian::done/$1');
        $routes->get('proses/(:any)', 'Verifikator\Penilaian::proses/$1');
    });
});

$routes->group('supervisor', ['filter' => 'group:supervisor'], static function ($routes) {
    $routes->get('/', 'Supervisor\Dashboard::index');

    $routes->group('usulan', static function ($routes) {
        $routes->get('/', 'Supervisor\Usulan::index');
        $routes->get('getdata', 'Supervisor\Usulan::getdata');
        $routes->post('disposisi/(:any)', 'Supervisor\Usulan::disposisi/$1');
        $routes->get('detail/verifikasi/(:any)', 'Supervisor\Usulan::verifikasi/$1');
        $routes->get('detail/penilaian/review/(:any)', 'Supervisor\Usulan::penilaianreview/$1');
        $routes->get('detail/penilaian/(:any)', 'Supervisor\Usulan::penilaian/$1');
        $routes->get('detail/visitasi/(:any)', 'Supervisor\Usulan::visitasi/$1');
        $routes->get('detail/rkma/(:any)', 'Supervisor\Usulan::rkma/$1');
        $routes->get('detail/kma/(:any)', 'Supervisor\Usulan::kma/$1');
        $routes->get('detail/(:any)', 'Supervisor\Usulan::detail/$1');
        $routes->get('penilaianasesor/(:any)', 'Supervisor\Usulan::penilaianasesor/$1');
        $routes->post('asesor/add', 'Supervisor\Usulan::addasesor');
        $routes->post('rkmadetail', 'Supervisor\Usulan::rkmadetail');
    });

    $routes->group('users', static function ($routes) {
        $routes->get('/', 'Supervisor\Users::index');
        $routes->get('add', 'Supervisor\Users::add');
        $routes->post('create', 'Supervisor\Users::create');
        $routes->get('edit/(:num)', 'Supervisor\Users::edit/$1');
        $routes->post('update/(:num)', 'Supervisor\Users::update/$1');
        $routes->get('delete/(:num)', 'Supervisor\Users::delete/$1');
        $routes->get('activate/(:num)', 'Supervisor\Users::activate/$1');
        $routes->get('deactivate/(:num)', 'Supervisor\Users::deactivate/$1');
    });

    $routes->group('lembaga', static function ($routes) {
        $routes->get('/', 'Supervisor\Lembaga::index');
    });
});

$routes->group('layanan', ['filter' => 'group:user'], static function ($routes) {

    $routes->group('pendirianptkis', static function ($routes) {
        $routes->get('/', 'User\Pendirianptkis::index');
        $routes->post('create', 'User\Pendirianptkis::create');
        $routes->get('detail/(:any)', 'User\Pendirianptkis::detail/$1');
        $routes->get('prodi/(:any)', 'User\Pendirianptkis::prodi/$1');
        $routes->post('saveprodi', 'User\Pendirianptkis::saveprodi');
        $routes->post('updateform1', 'User\Pendirianptkis::updateform1');
        $routes->post('updateform2', 'User\Pendirianptkis::updateform2');
        $routes->post('submitusul', 'User\Pendirianptkis::submitusul');
    });

    $routes->group('alihbentukptkis', static function ($routes) {
        $routes->get('/', 'User\Alihbentukptkis::index');
        $routes->post('create', 'User\Alihbentukptkis::create');
        $routes->get('detail/(:any)', 'User\Alihbentukptkis::detail/$1');
        $routes->post('updateform1', 'User\Alihbentukptkis::updateform1');
        $routes->post('updateform2', 'User\Alihbentukptkis::updateform2');
        $routes->post('submitusul', 'User\Alihbentukptkis::submitusul');
    });

    $routes->group('alihkelolaptkis', static function ($routes) {
        $routes->get('/', 'User\Alihkelolaptkis::index');
        $routes->post('create', 'User\Alihkelolaptkis::create');
        $routes->get('detail/(:any)', 'User\Alihkelolaptkis::detail/$1');
        $routes->post('updateform1', 'User\Alihkelolaptkis::updateform1');
        $routes->post('updateform2', 'User\Alihkelolaptkis::updateform2');
        $routes->post('submitusul', 'User\Alihkelolaptkis::submitusul');
    });
    
    $routes->get('alihbentukptkis', 'Layanan\AlihBentukPTKIS::index');
    $routes->get('bantuanptkis', 'Layanan\BantuanPTKIS::index');
});

$routes->group('dokumen', ['filter' => 'group:user'], static function ($routes) {
    $routes->post('upload', 'User\Dokumen::upload');
});

$routes->group('ajax', ['filter' => 'group:admin,user,superadmin,verifikator,supervisor'], static function ($routes) {
    $routes->get('regencies/(:num)', 'Ajax::getkab/$1');
    $routes->get('districts/(:num)', 'Ajax::getKec/$1');
    $routes->get('villages/(:num)', 'Ajax::getKel/$1');
    $routes->get('log/(:any)', 'Ajax::getLog/$1');
    $routes->post('getlembaga', 'Ajax::getlembaga');
});

$routes->group('admin', ['filter' => 'group:admin,superadmin'], static function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');

    $routes->group('users', static function ($routes) {
        $routes->get('/', 'Admin\Users::index');
        $routes->get('add', 'Admin\Users::add');
        $routes->post('create', 'Admin\Users::create');
        $routes->get('edit/(:num)', 'Admin\Users::edit/$1');
        $routes->post('update/(:num)', 'Admin\Users::update/$1');
        $routes->get('delete/(:num)', 'Admin\Users::delete/$1');
        $routes->get('activate/(:num)', 'Admin\Users::activate/$1');
        $routes->get('deactivate/(:num)', 'Admin\Users::deactivate/$1');
    });

    $routes->group('settings', static function ($routes) {
        $routes->get('/', 'Admin\Settings::index');
        $routes->post('update', 'Admin\Settings::updateSettings');
    });
});

service('auth')->routes($routes);
