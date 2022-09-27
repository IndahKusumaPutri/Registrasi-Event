Route::resource('/regisevent','RegiseventController');
Route::get('/regisevent/create','RegiseventController@create');
Route::post('/regisevent/store','RegiseventController@store');
Route::post('/regisevent/edit/{id_regisevent}','RegiseventController@update');
Route::get('/cetakregisevent','RegiseventController@cetakRegisevent');
Route::get('/api/fetchnamepasien', 'RegiseventController@fetchName');
