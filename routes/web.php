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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::get('/', 'Beranda@index')->name('beranda');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');

        Route::post('/register-penghuni', 'Auth@store')->name('register-penghuni');
    });

    Route::group(['prefix' => 'biro', 'middleware' => ['auth'], 'as' => 'biro.'], function () {
        Route::get('/dashboard-biro', 'Dashboard@dashboard_biro')->name('dashboard-biro');

        Route::get('/data-pengguna', 'DataPenggunaController@index')->name('data-pengguna');
        Route::get('/data-pengguna-get', 'DataPenggunaController@get')->name('data-pengguna-get');
        Route::post('/data-pengguna-store', 'DataPenggunaController@store')->name('data-pengguna-store');
        Route::get('/data-pengguna-show/{params}', 'DataPenggunaController@show')->name('data-pengguna-show');
        Route::post('/data-pengguna-update/{params}', 'DataPenggunaController@update')->name('data-pengguna-update');
        Route::delete('/data-pengguna-delete/{params}', 'DataPenggunaController@delete')->name('data-pengguna-delete');

        Route::get('/data-penghuni', 'DataPenghuniController@index')->name('data-penghuni');
        Route::get('/data-penghuni-get', 'DataPenghuniController@get')->name('data-penghuni-get');
        Route::post('/data-penghuni-store', 'DataPenghuniController@store')->name('data-penghuni-store');
        Route::get('/data-penghuni-show/{params}', 'DataPenghuniController@show')->name('data-penghuni-show');
        Route::post('/data-penghuni-update/{params}', 'DataPenghuniController@update')->name('data-penghuni-update');
        Route::delete('/data-penghuni-delete/{params}', 'DataPenghuniController@delete')->name('data-penghuni-delete');
        Route::post('/data-penghuni-konfirmasi/{params}', 'DataPenghuniController@konfirmasi')->name('data-penghuni-konfirmasi');
        Route::get('/data-penghuni-detail/{params}', 'DataPenghuniController@detail')->name('data-penghuni-detail');

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

            Route::get('/arsip-dokumen', 'ArsipDokumenController@index')->name('arsip-dokumen');
            Route::get('/arsip-dokumen-get', 'ArsipDokumenController@get')->name('arsip-dokumen-get');
            Route::post('/arsip-dokumen-store', 'ArsipDokumenController@store')->name('arsip-dokumen-store');
            Route::get('/arsip-dokumen-show/{params}', 'ArsipDokumenController@show')->name('arsip-dokumen-show');
            Route::post('/arsip-dokumen-update/{params}', 'ArsipDokumenController@update')->name('arsip-dokumen-update');
            Route::delete('/arsip-dokumen-delete/{params}', 'ArsipDokumenController@delete')->name('arsip-dokumen-delete');
        });

        Route::get('/jadwal-agenda', 'JadwalAgendaController@index')->name('jadwal-agenda');
        Route::get('/jadwal-agenda-get', 'JadwalAgendaController@get')->name('jadwal-agenda-get');
        Route::post('/jadwal-agenda-store', 'JadwalAgendaController@store')->name('jadwal-agenda-store');
        Route::get('/jadwal-agenda-show/{params}', 'JadwalAgendaController@show')->name('jadwal-agenda-show');
        Route::post('/jadwal-agenda-update/{params}', 'JadwalAgendaController@update')->name('jadwal-agenda-update');
        Route::delete('/jadwal-agenda-delete/{params}', 'JadwalAgendaController@delete')->name('jadwal-agenda-delete');

        Route::get('/keluhan', 'KeluhanController@index')->name('keluhan');
        Route::get('/keluhan-get', 'KeluhanController@get')->name('keluhan-get');
        Route::post('/keluhan-store', 'KeluhanController@store')->name('keluhan-store');
        Route::get('/keluhan-show/{params}', 'KeluhanController@show')->name('keluhan-show');
        Route::post('/keluhan-update/{params}', 'KeluhanController@update')->name('keluhan-update');
        Route::delete('/keluhan-delete/{params}', 'KeluhanController@delete')->name('keluhan-delete');
    });

    Route::group(['prefix' => 'keuangan', 'middleware' => ['auth'], 'as' => 'keuangan.'], function () {
        Route::get('/dashboard-keuangan', 'Dashboard@dashboard_keuangan')->name('dashboard-keuangan');
    });

    Route::group(['prefix' => 'inventaris', 'middleware' => ['auth'], 'as' => 'inventaris.'], function () {
        Route::get('/dashboard-inventaris', 'Dashboard@dashboard_inventaris')->name('dashboard-inventaris');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
