<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\File;

Route::get('/asset-list', function () {
    $list = [];

    $folders = ['assets', 'assets-landing']; // Tambahkan folder lain jika perlu

    foreach ($folders as $folder) {
        $path = public_path($folder);
        if (File::exists($path)) {
            $files = File::allFiles($path);
            foreach ($files as $file) {
                $relativePath = str_replace(public_path(), '', $file->getRealPath());
                $list[] = str_replace('\\', '/', $relativePath); // Windows path fix
            }
        }
    }

    return response()->json($list);
});


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::get('/', 'Beranda@index')->name('beranda');

    Route::get('/registrasi-penghuni', 'Auth@register')->name('registrasi-penghuni');
    Route::post('/register-penghuni-add', 'Auth@store')->name('register-penghuni-add');

    Route::get('/selayang-pandang', 'Tentang@selayang_pandang')->name('selayang-pandang');
    Route::get('/pengelola', 'Tentang@pengelola')->name('pengelola');
    Route::get('/program', 'Tentang@program')->name('program');
    Route::get('/fasilitas', 'Tentang@fasilitas')->name('fasilitas');

    Route::get('/agenda', 'JadwalAgendaController@agenda')->name('agenda');

    Route::get('/buku-tamu', 'DataTamuController@buku_tamu')->name('buku-tamu');
    Route::post('/data-tamu-add', 'DataTamuController@store')->name('data-tamu-add');

    Route::get('/peminjaman', 'DataPeminjamanController@peminjaman')->name('peminjaman');
    Route::post('/peminjaman-add', 'DataPeminjamanController@store')->name('peminjaman-add');

    Route::get('/keluhan', 'KeluhanController@keluhan')->name('keluhan');
    Route::post('/keluhan-add', 'KeluhanController@store')->name('keluhan-add');

    Route::get('/rekap', 'Laporan@rekap')->name('rekap');
    Route::get('/rekap-get/{params}', 'Laporan@get')->name('rekap-get');

    Route::get('/inventaris', 'DataInventarisController@inventaris')->name('inventaris');

    Route::get('/arsip', 'ArsipDokumenController@arsip')->name('arsip');

    Route::get('/kontak', 'Kontak@index')->name('kontak');

    Route::get('/profile', 'Profile@index')->name('profile');

    Route::get('/tagihan', 'RekapPembayaranController@tagihan_user')->name('tagihan');
    Route::post('/tagihan-add/{params}', 'RekapPembayaranController@store')->name('tagihan-add');

    Route::get('/absensi', 'AbsensiPiketController@absen')->name('absensi');
    Route::post('/upload-absen/{params}', 'AbsensiPiketController@upload_absen')->name('upload-absen');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');
    });

    Route::group(['prefix' => 'biro', 'middleware' => ['auth'], 'as' => 'biro.'], function () {
        Route::get('/dashboard-biro', 'Dashboard@dashboard_biro')->name('dashboard-biro');

        Route::get('/data-pengguna', 'DataPenggunaController@index')->name('data-pengguna');
        Route::get('/data-pengguna-get', 'DataPenggunaController@get')->name('data-pengguna-get');
        Route::post('/data-pengguna-store', 'DataPenggunaController@store')->name('data-pengguna-store');
        Route::get('/data-pengguna-show/{params}', 'DataPenggunaController@show')->name('data-pengguna-show');
        Route::post('/data-pengguna-update/{params}', 'DataPenggunaController@update')->name('data-pengguna-update');
        Route::delete('/data-pengguna-delete/{params}', 'DataPenggunaController@delete')->name('data-pengguna-delete');

        Route::prefix('warga_tamu')->group(function () {
            Route::get('/data-penghuni', 'DataPenghuniController@index')->name('data-penghuni');
            Route::get('/data-penghuni-get', 'DataPenghuniController@get')->name('data-penghuni-get');
            Route::post('/data-penghuni-store', 'DataPenghuniController@store')->name('data-penghuni-store');
            Route::get('/data-penghuni-show/{params}', 'DataPenghuniController@show')->name('data-penghuni-show');
            Route::post('/data-penghuni-update/{params}', 'DataPenghuniController@update')->name('data-penghuni-update');
            Route::delete('/data-penghuni-delete/{params}', 'DataPenghuniController@delete')->name('data-penghuni-delete');
            Route::post('/data-penghuni-konfirmasi/{params}', 'DataPenghuniController@konfirmasi')->name('data-penghuni-konfirmasi');
            Route::get('/data-penghuni-detail/{params}', 'DataPenghuniController@detail')->name('data-penghuni-detail');

            Route::get('/data-tamu', 'DataTamuController@index')->name('data-tamu');
            Route::get('/data-tamu-get', 'DataTamuController@get')->name('data-tamu-get');
            // Route::post('/data-tamu-store', 'DataTamuController@store')->name('data-tamu-store');
            Route::get('/data-tamu-show/{params}', 'DataTamuController@show')->name('data-tamu-show');
            Route::post('/data-tamu-update/{params}', 'DataTamuController@update')->name('data-tamu-update');
            Route::delete('/data-tamu-delete/{params}', 'DataTamuController@delete')->name('data-tamu-delete');
        });

        Route::prefix('keuangan')->group(function () {
            Route::get('/pemasukan', 'PemasukanController@index')->name('pemasukan');
            Route::get('/pemasukan-get', 'PemasukanController@get')->name('pemasukan-get');
            Route::post('/pemasukan-store', 'PemasukanController@store')->name('pemasukan-store');
            Route::get('/pemasukan-show/{params}', 'PemasukanController@show')->name('pemasukan-show');
            Route::post('/pemasukan-update/{params}', 'PemasukanController@update')->name('pemasukan-update');
            Route::delete('/pemasukan-delete/{params}', 'PemasukanController@delete')->name('pemasukan-delete');

            Route::get('/pengeluaran', 'PengeluaranController@index')->name('pengeluaran');
            Route::get('/pengeluaran-get', 'PengeluaranController@get')->name('pengeluaran-get');
            Route::post('/pengeluaran-store', 'PengeluaranController@store')->name('pengeluaran-store');
            Route::get('/pengeluaran-show/{params}', 'PengeluaranController@show')->name('pengeluaran-show');
            Route::post('/pengeluaran-update/{params}', 'PengeluaranController@update')->name('pengeluaran-update');
            Route::delete('/pengeluaran-delete/{params}', 'PengeluaranController@delete')->name('pengeluaran-delete');

            Route::get('/master-tagihan', 'MasterTagihanController@index')->name('master-tagihan');
            Route::get('/master-tagihan-get', 'MasterTagihanController@get')->name('master-tagihan-get');
            Route::post('/master-tagihan-store', 'MasterTagihanController@store')->name('master-tagihan-store');
            Route::get('/master-tagihan-show/{params}', 'MasterTagihanController@show')->name('master-tagihan-show');
            Route::post('/master-tagihan-update/{params}', 'MasterTagihanController@update')->name('master-tagihan-update');
            Route::delete('/master-tagihan-delete/{params}', 'MasterTagihanController@delete')->name('master-tagihan-delete');

            Route::get('/tagihan', 'TagihanController@index')->name('tagihan');
            Route::get('/tagihan-get', 'TagihanController@get')->name('tagihan-get');
            Route::post('/tagihan-store', 'TagihanController@store')->name('tagihan-store');
            Route::get('/tagihan-show/{params}', 'TagihanController@show')->name('tagihan-show');
            Route::post('/tagihan-update/{params}', 'TagihanController@update')->name('tagihan-update');
            Route::delete('/tagihan-delete/{params}', 'TagihanController@delete')->name('tagihan-delete');

            Route::get('/rekap-pembayaran', 'RekapPembayaranController@index')->name('rekap-pembayaran');
            Route::get('/buat-invoice', 'RekapPembayaranController@buat_invoice')->name('buat-invoice');
            Route::get('/rekap-pembayaran-get', 'RekapPembayaranController@get')->name('rekap-pembayaran-get');
            Route::get('/rekap-pembayaran-show/{params}', 'RekapPembayaranController@show')->name('rekap-pembayaran-show');
            Route::post('/rekap-pembayaran-update/{params}', 'RekapPembayaranController@update')->name('rekap-pembayaran-update');
            Route::delete('/rekap-pembayaran-delete/{params}', 'RekapPembayaranController@delete')->name('rekap-pembayaran-delete');

            Route::get('/laporan', 'Laporan@index')->name('laporan');
            Route::get('/laporan-get/{params}', 'Laporan@get')->name('laporan-get');
            Route::get('/laporan-export/{params}', 'Laporan@export_to_excel')->name('laporan-export');
        });

        Route::prefix('inventaris')->group(function () {
            Route::get('/data-inventaris', 'DataInventarisController@index')->name('data-inventaris');
            Route::get('/data-inventaris-get', 'DataInventarisController@get')->name('data-inventaris-get');
            Route::post('/data-inventaris-store', 'DataInventarisController@store')->name('data-inventaris-store');
            Route::get('/data-inventaris-show/{params}', 'DataInventarisController@show')->name('data-inventaris-show');
            Route::post('/data-inventaris-update/{params}', 'DataInventarisController@update')->name('data-inventaris-update');
            Route::delete('/data-inventaris-delete/{params}', 'DataInventarisController@delete')->name('data-inventaris-delete');

            Route::get('/data-peminjaman', 'DataPeminjamanController@index')->name('data-peminjaman');
            Route::get('/data-peminjaman-get', 'DataPeminjamanController@get')->name('data-peminjaman-get');
            // Route::post('/data-peminjaman-store', 'DataPeminjamanController@store')->name('data-peminjaman-store');
            Route::get('/data-peminjaman-show/{params}', 'DataPeminjamanController@show')->name('data-peminjaman-show');
            Route::post('/data-peminjaman-update/{params}', 'DataPeminjamanController@update')->name('data-peminjaman-update');
            Route::delete('/data-peminjaman-delete/{params}', 'DataPeminjamanController@delete')->name('data-peminjaman-delete');
        });

        Route::prefix('kegiatan')->group(function () {
            Route::get('/program', 'ProgramController@index')->name('program');
            Route::get('/program-get', 'ProgramController@get')->name('program-get');
            Route::post('/program-store', 'ProgramController@store')->name('program-store');
            Route::get('/program-show/{params}', 'ProgramController@show')->name('program-show');
            Route::post('/program-update/{params}', 'ProgramController@update')->name('program-update');
            Route::delete('/program-delete/{params}', 'ProgramController@delete')->name('program-delete');

            Route::get('/jadwal-agenda', 'JadwalAgendaController@index')->name('jadwal-agenda');
            Route::get('/jadwal-agenda-get', 'JadwalAgendaController@get')->name('jadwal-agenda-get');
            Route::post('/jadwal-agenda-store', 'JadwalAgendaController@store')->name('jadwal-agenda-store');
            Route::get('/jadwal-agenda-show/{params}', 'JadwalAgendaController@show')->name('jadwal-agenda-show');
            Route::post('/jadwal-agenda-update/{params}', 'JadwalAgendaController@update')->name('jadwal-agenda-update');
            Route::delete('/jadwal-agenda-delete/{params}', 'JadwalAgendaController@delete')->name('jadwal-agenda-delete');
        });

        Route::prefix('tentang')->group(function () {
            Route::get('/selayang-pandang', 'SelayangPandangController@index')->name('selayang-pandang');
            Route::get('/selayang-pandang-get', 'SelayangPandangController@get')->name('selayang-pandang-get');
            Route::post('/selayang-pandang-store', 'SelayangPandangController@store')->name('selayang-pandang-store');
            Route::get('/selayang-pandang-show/{params}', 'SelayangPandangController@show')->name('selayang-pandang-show');
            Route::post('/selayang-pandang-update/{params}', 'SelayangPandangController@update')->name('selayang-pandang-update');
            Route::delete('/selayang-pandang-delete/{params}', 'SelayangPandangController@delete')->name('selayang-pandang-delete');

            Route::get('/fasilitas', 'FasilitasController@index')->name('fasilitas');
            Route::get('/fasilitas-get', 'FasilitasController@get')->name('fasilitas-get');
            Route::post('/fasilitas-store', 'FasilitasController@store')->name('fasilitas-store');
            Route::get('/fasilitas-show/{params}', 'FasilitasController@show')->name('fasilitas-show');
            Route::post('/fasilitas-update/{params}', 'FasilitasController@update')->name('fasilitas-update');
            Route::delete('/fasilitas-delete/{params}', 'FasilitasController@delete')->name('fasilitas-delete');
        });

        Route::get('/keluhan', 'KeluhanController@index')->name('keluhan');
        Route::get('/keluhan-get', 'KeluhanController@get')->name('keluhan-get');
        Route::post('/keluhan-store', 'KeluhanController@store')->name('keluhan-store');
        Route::get('/keluhan-show/{params}', 'KeluhanController@show')->name('keluhan-show');
        Route::post('/keluhan-update/{params}', 'KeluhanController@update')->name('keluhan-update');
        Route::delete('/keluhan-delete/{params}', 'KeluhanController@delete')->name('keluhan-delete');

        Route::get('/arsip-dokumen', 'ArsipDokumenController@index')->name('arsip-dokumen');
        Route::get('/arsip-dokumen-get', 'ArsipDokumenController@get')->name('arsip-dokumen-get');
        Route::post('/arsip-dokumen-store', 'ArsipDokumenController@store')->name('arsip-dokumen-store');
        Route::get('/arsip-dokumen-show/{params}', 'ArsipDokumenController@show')->name('arsip-dokumen-show');
        Route::post('/arsip-dokumen-update/{params}', 'ArsipDokumenController@update')->name('arsip-dokumen-update');
        Route::delete('/arsip-dokumen-delete/{params}', 'ArsipDokumenController@delete')->name('arsip-dokumen-delete');

        Route::get('/absensi', 'AbsensiPiketController@index')->name('absensi');
        Route::get('/absensi-get', 'AbsensiPiketController@get')->name('absensi-get');
        Route::post('/absensi-store', 'AbsensiPiketController@store')->name('absensi-store');
        Route::get('/absensi-show/{params}', 'AbsensiPiketController@show')->name('absensi-show');
        Route::post('/absensi-update/{params}', 'AbsensiPiketController@update')->name('absensi-update');
        Route::delete('/absensi-delete/{params}', 'AbsensiPiketController@delete')->name('absensi-delete');
    });

    Route::group(['prefix' => 'keuangan', 'middleware' => ['auth'], 'as' => 'keuangan.'], function () {
        Route::get('/dashboard-keuangan', 'Dashboard@dashboard_keuangan')->name('dashboard-keuangan');

        Route::get('/pemasukan', 'PemasukanController@index_keuangan')->name('pemasukan');

        Route::get('/pengeluaran', 'PengeluaranController@index_keuangan')->name('pengeluaran');

        Route::get('/master-tagihan', 'MasterTagihanController@index_keuangan')->name('master-tagihan');

        Route::get('/tagihan', 'TagihanController@index_keuangan')->name('tagihan');

        Route::get('/rekap-pembayaran', 'RekapPembayaranController@index_keuangan')->name('rekap-pembayaran');

        Route::get('/keluhan', 'KeluhanController@index_keuangan')->name('keluhan');

        Route::get('/arsip-dokumen', 'ArsipDokumenController@index_keuangan')->name('arsip-dokumen');

        Route::get('/laporan', 'Laporan@index_keuangan')->name('laporan');
    });

    Route::group(['prefix' => 'inventaris', 'middleware' => ['auth'], 'as' => 'inventaris.'], function () {
        Route::get('/dashboard-inventaris', 'Dashboard@dashboard_inventaris')->name('dashboard-inventaris');

        Route::get('/data-inventaris', 'DataInventarisController@index_inventaris')->name('data-inventaris');

        Route::get('/data-peminjaman', 'DataPeminjamanController@index_inventaris')->name('data-peminjaman');

        Route::get('/keluhan', 'KeluhanController@index_inventaris')->name('keluhan');

        Route::get('/arsip-dokumen', 'ArsipDokumenController@index_inventaris')->name('arsip-dokumen');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
