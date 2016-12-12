<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PageController@welcome');

Route::get('/wishlists/{user}', 'GiftController@guestIndex')->name('gifts.guestIndex');
Route::get('/gifts/add', 'GiftController@create')->name('gifts.create');
Route::post('/gifts/add', 'GiftController@store')->name('gifts.store');
Route::get('/gifts/index', 'GiftController@index')->name('gifts.index');
Route::get('/gifts/edit/{gift}', 'GiftController@edit')->name('gifts.edit');
Route::post('/gifts/edit/{gift}', 'GiftController@update')->name('gifts.update');
Route::delete('/gifts/edit/{gift}', 'GiftController@destroy')->name('gifts.destroy');
Route::post('/wishlists/{user}/purchased/{gift}', 'GiftController@purchased')->name('gifts.purchased');

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database gifter');
        DB::statement('CREATE database gifter');

        return 'Dropped gifter; created gifter.';
    });

};

if(App::environment() == 'local') {
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user)
        dump($user->toArray());
    else
        dump('You are not logged in.');

    return;
});

Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');
