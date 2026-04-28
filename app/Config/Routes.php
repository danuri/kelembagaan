<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Home::index', ['filter' => 'group:user']);

$routes->resource('api/usulan', ['controller' => 'Api\Usulan']);

$routes->group('supervisor', ['filter' => 'group:supervisor'], static function ($routes) {
    $routes->get('/', 'Supervisor\Dashboard::index');
});

$routes->group('export', ['filter' => 'group:verifikator'], static function ($routes) {
    $routes->get('reportalihbentukptkis/(:any)', 'Export::reportalihbentukptkis/$1');
});

$routes->group('verifikator', ['filter' => 'group:verifikator'], static function ($routes) {
    $routes->get('/', 'Verifikator\Dashboard::index');

    $routes->group('usulan', static function ($routes) {
        $routes->get('/', 'Verifikator\Usulan::index');
        $routes->get('getdata', 'Verifikator\Usulan::getdata');

        $routes->group('pendirianptkis', static function ($routes) {
            $routes->get('detail/(:any)', 'Verifikator\Usulan\Pendirianptkis::detail/$1');
            $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Usulan\Pendirianptkis::validasidokumen/$1/$2/$3');
            $routes->post('decline/(:any)', 'Verifikator\Usulan\Pendirianptkis::decline/$1');
            $routes->get('accept/(:any)', 'Verifikator\Usulan\Pendirianptkis::accept/$1');
            $routes->get('proses/(:any)', 'Verifikator\Usulan\Pendirianptkis::proses/$1');
        });

        $routes->group('alihbentukptkis', static function ($routes) {
            $routes->get('detail/(:any)', 'Verifikator\Usulan\Alihbentukptkis::detail/$1');
            $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Usulan\Alihbentukptkis::validasidokumen/$1/$2/$3');
            $routes->post('decline/(:any)', 'Verifikator\Usulan\Alihbentukptkis::decline/$1');
            $routes->post('updatecatatan/(:any)', 'Verifikator\Usulan\Alihbentukptkis::updatecatatan/$1');
            $routes->get('accept/(:any)', 'Verifikator\Usulan\Alihbentukptkis::accept/$1');
            $routes->get('proses/(:any)', 'Verifikator\Usulan\Alihbentukptkis::proses/$1');
            $routes->post('upnilai/(:any)', 'Verifikator\Usulan\Alihbentukptkis::upnilai/$1');
        });

        $routes->group('pembentukanfai', static function ($routes) {
            $routes->get('detail/(:any)', 'Verifikator\Usulan\Pembentukanfai::detail/$1');
            $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Usulan\Pembentukanfai::validasidokumen/$1/$2/$3');
            $routes->post('decline/(:any)', 'Verifikator\Usulan\Pembentukanfai::decline/$1');
            $routes->post('updatecatatan/(:any)', 'Verifikator\Usulan\Pembentukanfai::updatecatatan/$1');
            $routes->get('accept/(:any)', 'Verifikator\Usulan\Pembentukanfai::accept/$1');
            $routes->get('proses/(:any)', 'Verifikator\Usulan\Pembentukanfai::proses/$1');
        });

        $routes->group('alihkelolaptkis', static function ($routes) {
            $routes->get('detail/(:any)', 'Verifikator\Usulan\Alihkelolaptkis::detail/$1');
            $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Usulan\Alihkelolaptkis::validasidokumen/$1/$2/$3');
            $routes->post('decline/(:any)', 'Verifikator\Usulan\Alihkelolaptkis::decline/$1');
            $routes->post('updatecatatan/(:any)', 'Verifikator\Usulan\Alihkelolaptkis::updatecatatan/$1');
            $routes->get('accept/(:any)', 'Verifikator\Usulan\Alihkelolaptkis::accept/$1');
            $routes->get('proses/(:any)', 'Verifikator\Usulan\Alihkelolaptkis::proses/$1');
        });

        $routes->group('penggabunganptki', static function ($routes) {
            $routes->get('detail/(:any)', 'Verifikator\Usulan\Penggabunganptki::detail/$1');
            $routes->get('validasidokumen/(:any)/(:any)/(:any)', 'Verifikator\Usulan\Penggabunganptki::validasidokumen/$1/$2/$3');
            $routes->post('decline/(:any)', 'Verifikator\Usulan\Penggabunganptki::decline/$1');
            $routes->post('updatecatatan/(:any)', 'Verifikator\Usulan\Penggabunganptki::updatecatatan/$1');
            $routes->get('accept/(:any)', 'Verifikator\Usulan\Penggabunganptki::accept/$1');
            $routes->get('proses/(:any)', 'Verifikator\Usulan\Penggabunganptki::proses/$1');
        });
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
    $routes->get('profile', 'Supervisor\Dashboard::profile');
    $routes->post('changepassword', 'Supervisor\Dashboard::updatePassword');
    $routes->post('profile/update', 'Supervisor\Dashboard::updateProfile');

    $routes->group('settings', static function ($routes) {
        $routes->get('/', 'Supervisor\Settings::index');
        $routes->post('update', 'Supervisor\Settings::updateSettings');
    });

    $routes->group('arsip', static function ($routes) {
        $routes->get('/', 'Supervisor\Arsip::index');
        $routes->get('getdata', 'Supervisor\Arsip::getdata');
        $routes->post('detail', 'Supervisor\Arsip::detail');
    });

    $routes->group("master", function ($routes) {

        $routes->group("users", function ($routes) {
            $routes->get('', 'Supervisor\Users::index');
            $routes->get('getdata', 'Supervisor\Users::getdata');
            $routes->get('cari', 'Supervisor\Users::cari');
            $routes->get('detail/(:any)', 'Supervisor\Users::detail/$1');
            $routes->post('save', 'Supervisor\Users::save');
        });

        $routes->group("layanan", function ($routes) {
            $routes->get('', 'Supervisor\Layanan::index');
            $routes->post('save', 'Supervisor\Layanan::save');
            $routes->get('delete/(:num)', 'Supervisor\Layanan::delete/$1');
            $routes->get('dokumen/(:num)', 'Supervisor\Layanan::dokumen/$1');
            $routes->get('dokumen/delete/(:num)', 'Supervisor\Layanan::dokumendelete/$1');
            $routes->post('dokumen/save', 'Supervisor\Layanan::dokumensave');
            $routes->get('activate/(:num)', 'Supervisor\Layanan::activate/$1');
            $routes->get('deactivate/(:num)', 'Supervisor\Layanan::deactivate/$1');
        });

        $routes->group("info", function ($routes) {
            $routes->get('', 'Supervisor\Info::index');
            $routes->post('save', 'Supervisor\Info::save');
            $routes->get('delete/(:num)', 'Supervisor\Info::delete/$1');
            $routes->get('detail/(:any)', 'Supervisor\Info::detail/$1');
            $routes->get('preview/(:any)', 'Supervisor\Info::preview/$1');
        });

        $routes->group('settings', static function ($routes) {
            $routes->get('/', 'Supervisor\Settings::index');
            $routes->post('update', 'Supervisor\Settings::updateSettings');
        });

    });

    $routes->group('usulan', static function ($routes) {
        $routes->get('/', 'Supervisor\Usulan::index');
        $routes->get('download', 'Supervisor\Usulan::download');
        $routes->get('getdata', 'Supervisor\Usulan::getdata');
        $routes->post('disposisi/(:any)', 'Supervisor\Usulan::disposisi/$1');
        $routes->get('detail/verifikasi/(:any)', 'Supervisor\Usulan::verifikasi/$1');
        $routes->get('detail/penilaian/review/(:any)', 'Supervisor\Usulan::penilaianreview/$1');
        $routes->get('detail/penilaian/(:any)', 'Supervisor\Usulan::penilaian/$1');
        $routes->get('detail/visitasi/(:any)', 'Supervisor\Usulan::visitasi/$1');
        $routes->get('detail/rkma/(:any)', 'Supervisor\Usulan::rkma/$1');
        $routes->get('detail/kma/(:any)', 'Supervisor\Usulan::kma/$1');
        $routes->post('detail/kma/save/(:any)', 'Supervisor\Usulan::savekma/$1');
        $routes->get('detail/(:any)', 'Supervisor\Usulan::detail/$1');
        $routes->get('penilaianasesor/(:any)', 'Supervisor\Usulan::penilaianasesor/$1');
        $routes->post('asesor/add', 'Supervisor\Usulan::addasesor');
        $routes->post('rkmadetail', 'Supervisor\Usulan::rkmadetail');

        $routes->group('pendirianptkis', static function ($routes) {
            $routes->get('/', 'Supervisor\Usulan\Pendirianptkis::index');
            $routes->get('getdata', 'Supervisor\Usulan\Pendirianptkis::getdata');
            $routes->post('disposisi/(:any)', 'Supervisor\Usulan\Pendirianptkis::disposisi/$1');
            $routes->get('detail/verifikasi/(:any)', 'Supervisor\Usulan\Pendirianptkis::verifikasi/$1');
            $routes->get('detail/penilaian/review/(:any)', 'Supervisor\Usulan\Pendirianptkis::penilaianreview/$1');
            $routes->get('detail/penilaian/(:any)', 'Supervisor\Usulan\Pendirianptkis::penilaian/$1');
            $routes->get('detail/visitasi/(:any)', 'Supervisor\Usulan\Pendirianptkis::visitasi/$1');
            $routes->get('detail/rkma/(:any)', 'Supervisor\Usulan\Pendirianptkis::rkma/$1');
            $routes->get('draft/rkma/(:any)', 'Supervisor\Usulan\Pendirianptkis::draftrkma/$1');
            $routes->get('detail/kma/(:any)', 'Supervisor\Usulan\Pendirianptkis::kma/$1');
            $routes->get('detail/(:any)', 'Supervisor\Usulan\Pendirianptkis::detail/$1');
            $routes->get('penilaianasesor/(:any)', 'Supervisor\Usulan\Pendirianptkis::penilaianasesor/$1');
            $routes->get('asesor/delete/(:any)', 'Supervisor\Usulan\Pendirianptkis::deleteasesor/$1');
            $routes->post('asesor/add', 'Supervisor\Usulan\Pendirianptkis::addasesor');
            $routes->post('rkmadetail', 'Supervisor\Usulan\Pendirianptkis::rkmadetail');
            $routes->post('recheck/(:any)', 'Supervisor\Usulan\Pendirianptkis::recheck/$1');
            $routes->get('done/(:any)', 'Supervisor\Usulan\Pendirianptkis::done/$1');
        });

        $routes->group('alihbentukptkis', static function ($routes) {
            $routes->get('/', 'Supervisor\Usulan\AlihBentukPtkis::index');
            $routes->get('getdata', 'Supervisor\Usulan\AlihBentukPtkis::getdata');
            $routes->post('disposisi/(:any)', 'Supervisor\Usulan\AlihBentukPtkis::disposisi/$1');
            $routes->get('detail/(:any)', 'Supervisor\Usulan\AlihBentukPtkis::detail/$1');
            $routes->post('recheck/(:any)', 'Supervisor\Usulan\AlihBentukPtkis::recheck/$1');
            $routes->get('done/(:any)', 'Supervisor\Usulan\AlihBentukPtkis::done/$1');
        });

        $routes->group('pembentukanfai', static function ($routes) {
            $routes->get('/', 'Supervisor\Usulan\Pembentukanfai::index');
            $routes->get('getdata', 'Supervisor\Usulan\Pembentukanfai::getdata');
            $routes->post('disposisi/(:any)', 'Supervisor\Usulan\Pembentukanfai::disposisi/$1');
            $routes->get('detail/verifikasi/(:any)', 'Supervisor\Usulan\Pembentukanfai::verifikasi/$1');
            $routes->get('detail/(:any)', 'Supervisor\Usulan\Pembentukanfai::detail/$1');
            $routes->post('recheck/(:any)', 'Supervisor\Usulan\Pembentukanfai::recheck/$1');
            $routes->get('done/(:any)', 'Supervisor\Usulan\Pembentukanfai::done/$1');
        });

        $routes->group('alihkelolaptkis', static function ($routes) {
            $routes->get('/', 'Supervisor\Usulan\Alihkelolaptkis::index');
            $routes->get('getdata', 'Supervisor\Usulan\Alihkelolaptkis::getdata');
            $routes->post('disposisi/(:any)', 'Supervisor\Usulan\Alihkelolaptkis::disposisi/$1');
            $routes->get('detail/verifikasi/(:any)', 'Supervisor\Usulan\Alihkelolaptkis::verifikasi/$1');
            $routes->get('detail/(:any)', 'Supervisor\Usulan\Alihkelolaptkis::detail/$1');
            $routes->post('recheck/(:any)', 'Supervisor\Usulan\Alihkelolaptkis::recheck/$1');
            $routes->get('done/(:any)', 'Supervisor\Usulan\Alihkelolaptkis::done/$1');
        });

        $routes->group('penggabunganptki', static function ($routes) {
            $routes->get('/', 'Supervisor\Usulan\Penggabunganptki::index');
            $routes->get('getdata', 'Supervisor\Usulan\Penggabunganptki::getdata');
            $routes->post('disposisi/(:any)', 'Supervisor\Usulan\Penggabunganptki::disposisi/$1');
            $routes->get('detail/verifikasi/(:any)', 'Supervisor\Usulan\Penggabunganptki::verifikasi/$1');
            $routes->get('detail/(:any)', 'Supervisor\Usulan\Penggabunganptki::detail/$1');
            $routes->post('recheck/(:any)', 'Supervisor\Usulan\Penggabunganptki::recheck/$1');
            $routes->get('done/(:any)', 'Supervisor\Usulan\Penggabunganptki::done/$1');
        });
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

$routes->group('profile', ['filter' => 'group:user'], static function ($routes) {
    $routes->get('/', 'User\Profile::index');
    $routes->post('update', 'User\Profile::updateProfile');
    $routes->post('changepassword', 'User\Profile::updatePassword');
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

    $routes->group('pembentukanfai', static function ($routes) {
        $routes->get('/', 'User\Pembentukanfai::index');
        $routes->post('create', 'User\Pembentukanfai::create');
        $routes->get('detail/(:any)', 'User\Pembentukanfai::detail/$1');
        $routes->get('prodi/(:any)', 'User\Pembentukanfai::prodi/$1');
        $routes->post('saveprodi', 'User\Pembentukanfai::saveprodi');
        $routes->post('updateform1', 'User\Pembentukanfai::updateform1');
        $routes->post('updateform2', 'User\Pembentukanfai::updateform2');
        $routes->post('submitusul', 'User\Pembentukanfai::submitusul');
    });

    $routes->group('penggabunganptki', static function ($routes) {
        $routes->get('/', 'User\Penggabunganptki::index');
        $routes->post('create', 'User\Penggabunganptki::create');
        $routes->get('detail/(:any)', 'User\Penggabunganptki::detail/$1');
        $routes->post('updateform1', 'User\Penggabunganptki::updateform1');
        $routes->post('submitusul', 'User\Penggabunganptki::submitusul');
    });

    // $routes->get('alihbentukptkis', 'Layanan\AlihBentukPTKIS::index');
    // $routes->get('bantuanptkis', 'Layanan\BantuanPTKIS::index');
});

$routes->group('dokumen', ['filter' => 'group:user,verifikator,supervisor'], static function ($routes) {
    $routes->get('upload', 'User\Dokumen::index');
    $routes->post('upload', 'User\Dokumen::upload');
    $routes->post('uploadprodi', 'User\Dokumen::uploadprodi');
    $routes->get('embed/(:num)/(:any)', 'User\Dokumen::embed/$1/$2');
    $routes->get('verifikasi/(:num)/(:any)', 'User\Dokumen::verifikasi/$1/$2');
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
