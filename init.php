<?php defined('SYSPATH') OR die('No direct script access.');

if ( ! Route::cache())
{
	Route::set('breadcrumbs', 'breadcrumbs')
		->defaults(array(
			'directory' => '',
			'controller' => 'Breadcrumbs',
			'action'     => 'index',
		));
}