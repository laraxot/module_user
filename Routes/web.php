<?php

$namespace = '\Modules\User'; //$this->getNamespace();
/* se metto {lang} devo passare lang a tutti i routes delle view 
* $prefix = '{lang}';
*
*/
$guard 		= config('auth.defaults.guard');
$provider 	= config("auth.guards.{$guard}.provider");
$model 		= config("auth.providers.{$provider}.model");
if($model=='Modules\User\Models\User'){

	$prefix = App::getLocale();
	Route::group(
	    [
	        'prefix' => $prefix,
	        //'where' => ['lang' => '[a-zA-Z]{2}'], //lang 2 caratteri it, en, es ...
	        'middleware' => ['web'],
	        'namespace' => $namespace.'\Http\Controllers',
	    ],
	    function () {
	        Auth::routes(['verify' => true]);
	    }
	);

}