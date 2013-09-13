<?php defined('SYSPATH') OR die('No direct script access.') ?>

<?php echo Request::factory('breadcrumbs')->query(array(
	'template' => isset($template) ? $template : NULL,
	'items'    => isset($items) ? $items : NULL,
))->execute()->body() ?>