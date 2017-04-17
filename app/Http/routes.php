<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('map', 'App\Folder');

Route::get('mappen/{map}/add-set', [
    'as'   => 'mappen.addSet',
    'uses' => 'FolderController@addSet'
]);

Route::get('mappen/{map}/delete', [
    'as'   => 'mappen.delete',
    'uses' => 'FolderController@delete'
]);

Route::resource('mappen', 'FolderController', [
    'parameters' => ['mappen' => 'map'],
]);

Route::model('set', 'App\Set');

Route::get('sets/{set}/present/{order}/{part}', [
    'as'   => 'sets.present',
    'uses' => 'SetController@present'
]);

Route::get('sets/{set}/add-card', [
    'as'   => 'sets.addCard',
    'uses' => 'SetController@addCard'
]);

Route::get('sets/{set}/delete', [
    'as'   => 'sets.delete',
    'uses' => 'SetController@delete'
]);

Route::resource('sets', 'SetController', [
    'parameters' => ['sets' => 'set'],
]);

Route::model('card', 'App\Card');

Route::get('cards/{card}/delete', [
    'as'   => 'cards.delete',
    'uses' => 'CardController@delete'
]);

Route::resource('cards', 'CardController', [
    'parameters' => ['cards' => 'card'],
]);

Route::get('/', 'FolderController@index');
