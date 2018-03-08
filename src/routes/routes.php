<?php

Route::group(['prefix' => 'api/ketimpangan-regional', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@index',
        'create'    => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@create',
        'show'      => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@show',
        'store'     => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@store',
        'edit'      => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@edit',
        'update'    => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@update',
        'destroy'   => 'Bantenprov\KetimpanganRegional\Http\Controllers\KetimpanganRegionalController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('ketimpangan-regional.index');
    Route::get('/create',       $controllers->create)->name('ketimpangan-regional.create');
    Route::get('/{id}',         $controllers->show)->name('ketimpangan-regional.show');
    Route::post('/',            $controllers->store)->name('ketimpangan-regional.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('ketimpangan-regional.edit');
    Route::put('/{id}',         $controllers->update)->name('ketimpangan-regional.update');
    Route::delete('/{id}',      $controllers->destroy)->name('ketimpangan-regional.destroy');
});
