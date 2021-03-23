<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
/*
$app->get($uri, $callback);
$app->post($uri, $callback);
$app->put($uri, $callback);
$app->patch($uri, $callback);
$app->delete($uri, $callback);
$app->options($uri, $callback);
*/

Route::get('/',['as' => 'home', 'uses' => 'MainController@home' ]);
Route::get('/home',['as' => 'homebis', 'uses' => 'MainController@home' ]);


Route::get('/api/lists',['as' => 'lists', 'uses' => 'ListController@lists' ]);
Route::get('/api/lists/{id}',['as' => 'getlist', 'uses' => 'ListController@getList' ]);
Route::post('/api/lists/add',['as' => 'addlist', 'uses' => 'ListController@addList' ]);
Route::post('/api/lists/update',['as' => 'updatelist', 'uses' => 'ListController@updateList' ]);
Route::post('/api/lists/delete',['as' => 'deletelist', 'uses' => 'ListController@deleteList' ]);
Route::post('/api/lists/delete/withcards',['as' => 'deletelistWithcards', 'uses' => 'ListController@deletelistWithcards' ]);
Route::get('/api/lists/{id}/cards',['as' => 'getlistcards', 'uses' => 'ListController@getListCards' ]);

Route::get('/api/cards',['as' => 'cards', 'uses' => 'CardController@cards' ]);
Route::get('/api/cards/{id}',['as' => 'getcard', 'uses' => 'CardController@getCard' ]);
Route::post('/api/cards/add',['as' => 'addcard', 'uses' => 'CardController@addCard' ]);
Route::post('/api/cards/update',['as' => 'updatecard', 'uses' => 'CardController@updateCard' ]);
Route::post('/api/cards/delete',['as' => 'deletecard', 'uses' => 'CardController@deleteCard' ]);
Route::get('/api/cards/{id}/labels',['as' => 'getcardlabels', 'uses' => 'CardController@getCardLabels' ]);
/*
Route::get('/api/labels',['as' => 'labels', 'uses' => 'ApiController@labels' ]);
Route::get('/api/cards/labels',['as' => 'getallcardslabels', 'uses' => 'ApiController@getAllCardsLabels' ]);
Route::get('/api/labels/{id}',['as' => 'getlabel', 'uses' => 'ApiController@getLabel' ]);
Route::post('/api/cards/{id}/labels/add',['as' => 'addlabel', 'uses' => 'ApiController@addLabel' ]);
Route::post('/api/labels/update',['as' => 'updatelabel', 'uses' => 'ApiController@updateLabel' ]);
Route::post('/api/labels/delete',['as' => 'deletelabel', 'uses' => 'ApiController@deleteLabel' ]);
*/