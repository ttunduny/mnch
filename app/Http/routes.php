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
Route::get('/phpversion',function(){


	 phpinfo();
});
Route::get('/admin/global', 'administration@globe');
Route::get('/admin/redmin', 'administration@localredis');
Route::get('/admin/memcached', 'administration@localmem');
Route::get('/admin/commandcenter', 'administration@commandcenter');
Route::post('/admin/docmd', 'administration@docmd');
Route::post('/admin/globcmd', 'administration@globcmd');
Route::get('/redmin','CacheController@redmin');
Route::get('/memcached','CacheController@memcached');
Route::get('/test','AnalyticsController@blah');
Route::get('/','AnalyticsController@ch');
Route::post('/map','AnalyticsController@mapRequest');
Route::post('/analytics/chajax','AnalyticsController@chajax');
Route::post('/analytics/mnhajax','AnalyticsController@mnhajax');
Route::get('/mnh','AnalyticsController@mnh');
Route::get ('Autosaved/{UserId}','AssessmentController@autosaved');
Route::get('/tester','AnalyticsController@tester');
Route::post('survey/{id}/{status}','surveys@update');
Route::get('/redis/{test}',function($test){


 
	$test = array('php artisan cache:clear','php artisan cache:clear');

	SSH::into('SiteGuban')->run($test, function($line)
{
	
   echo   ($line.PHP_EOL);

   
});





});
Route::post('survey/survey/{id}/{status}','surveys@update');

Route::get('status/{status}/{AssID}','AssessmentController@status');

Route::post('survey/autosave','surveys@autosave');

Route::post('survey/save','surveys@saveajax');




Route::get('home', 'HomeController@index');
Route::get('usermanagement','UserManagement@index');
Route::get('usermanagement/viewusers','UserManagement@index');
Route::get('usermanagement/monitor','UserManagement@show');
Route::get('usermanagement/addusers','UserManagement@create');
Route::get('usermanagement/addusers_multi','UserManagement@multi');
Route::post('usermanagement/addusers_multi/store','UserManagement@store_multi');
Route::post('usermanagement/status_change','UserManagement@status_change');
Route::post('usermanagement/reset','UserManagement@reset');
Route::get('usermanagement/export/{loc}/{type1}/{type2}/{type3}','UserManagement@export');
Route::post('usermanagement/multi_upload','UserManagement@upload');
Route::get('usermanagement/editusers/{id}','UserManagement@edit');
Route::post('usermanagement/update/{id}','UserManagement@update');
Route::post('usermanagement/update/pass/{id}/','UserManagement@updatepass');
Route::get('usermanagement/changepass','UserManagement@changepass');
Route::post('/usermanagement/ajax','UserManagement@ajax');
Route::get('usermanagement/test','UserManagement@test');
Route::get('usermanagement/mail','UserManagement@mail');


Route::post('usermanagement/store','UserManagement@store');

Route::controllers([
	'auth' => 'Auth\AuthController', 
	'password' => 'Auth\PasswordController',
]);

Route::get('assessments/cancel/{id}','AssessmentController@destroy');
Route::put('assessments/{id}','surveys@update');
Route::get('assessments/edit/{id}','surveys@edit');


Route::get('assessments/show/{id}','surveys@show');

Route::get('assessments/create/{id}/{sv}','surveys@create');

Route::get('assessment/{sv}','AssessmentController@index');
Route::get('assessments/{id}/{county}/{term}','AssessmentController@show');
Route::get('assessments/{id}/{date}/{term}/{county}','AssessmentController@create');
Route::post('assessments/{id}','AssessmentController@store');




